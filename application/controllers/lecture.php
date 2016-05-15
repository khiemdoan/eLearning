<?php 

class Lecture extends Framework\Controller {

    public function __construct() {
        parent::__construct();
		$this->load_model('lecture_model');
		$this->load_model('messages_model');
    }
	
    public function enter() {
		if (func_num_args() > 0) {
			$args = func_get_args();
			$lecture_id = $args[0];
			
			$user_id = $this->session->get('user_id');
			
			$lectures = $this->models['lecture_model']->get_lecture($lecture_id);
			
			if (empty($lectures)) {
				redirect(base_url());
			}
			$lecture = $lectures[0];
			
			$data['class_chat_id'] = $lecture_id;
			$data['group_chat_id'] = '"none"'; 
			
			if ($user_id != '') {
				$this->load_model('users_model');
				if ($this->models['users_model']->get_permission($user_id) != 'teacher') {
					echo '';
					$message_id = $this->models['messages_model']->get_message_id($lecture_id, $user_id);
					if (!empty($message_id)) {
						$data['group_chat_id'] = $message_id[0]['message_id'];
					}
				}
			}
			
			$data['title'] = $lecture['name'];
			$this->load_view('template/header', $data);
			$this->load_view('lecture/' . $lecture_id, $data);
			$this->load_view('lecture/chartarea', $data);
			$this->load_view('template/footer', $data);
		} else {
			redirect(base_url());
		}
    }	

}
