<?php 

class Message extends Framework\Controller {

    public function __construct() {
        parent::__construct();
		$this->load_model('messages_model');
    }
	
	public function show() {
		$user_id = $this->session->get('user_id');
		if ($user_id == '') {
			redirect(base_url());
		}
		
		if (func_num_args() != 1) {
			redirect(base_url());
		}
		
		$args = func_get_args();
		$message_id = $args[0];
		
		if ($this->models['messages_model']->check_permission($user_id, $message_id) == false) {
			redirect(base_url());
		}
		
		$data['group_chat_id'] = $message_id;
		
		$this->load_view('template/header', $data);
        $this->load_view('message/group_message', $data);
        $this->load_view('template/footer', $data);
	}
	
    public function get() {
		if (func_num_args() == 2) {
			$args = func_get_args();
			$user_id = $this->session->get('user_id');
			$message_id = $args[0];
			$last_message_id = $args[1];
			if ($user_id != '') {
				$contents = $this->models['messages_model']->get($message_id, $last_message_id);
				echo json_encode($contents);
			}
		}
    }
	
	public function send() {
		$user_id = $this->session->get('user_id');
		$message_id = $this->input->post('message_id');
        if ($user_id != '') {
			$content = $this->input->post('content');
			$dt = new DateTime();
			$dt->setTimezone (new DateTimeZone('Asia/Ho_Chi_Minh'));
			$time = $dt->format('Y-m-d H:i:s');
			$this->models['messages_model']->insert($user_id, $message_id, $time, $content);
		}
    }
	
	public function create() {
		$user_id = $this->session->get('user_id');
		$name = $this->input->post('name');
		$subject = $this->input->post('subject');
		
		if ($user_id == '') {
			redirect(base_url());
		}
		
		$this->load_model('users_model');
		$permission = $this->models['users_model']->get_permission($user_id);
		if ($permission != 'teacher') {
			redirect(base_url());
		}
		
		if ($this->input->post('submit')) {
			if ($user_id != '') {
				$this->load_model('lecture_model');
				$lectures = $this->models['lecture_model']->find_lecture($subject);
				if (!empty($lectures)) {
					$lecture = $lectures[0];
					$this->models['messages_model']->create($lecture, $name);
				} else {
					 $this->session->set_flashdata('message', '<div class="alert alert-danger">Chưa có môn học này trong cơ sở dữ liệu!</div>');
				}
			}
		}
		
		$messages = $this->models['messages_model']->get_list_messages();
		$data['messages'] = $messages;
		
		$data['title'] = 'Create message group';
        $this->load_view('template/header', $data);
        $this->load_view('message/create_message', $data);
        $this->load_view('template/footer', $data);
    }
	
	public function add_user() {
		$user_id = $this->session->get('user_id');
		if ($user_id == '') {
			redirect(base_url());
		}
		
		$this->load_model('users_model');
		$permission = $this->models['users_model']->get_permission($user_id);
		if ($permission != 'teacher') {
			redirect(base_url());
		}
		
		if (func_num_args() == 1) {
			$args = func_get_args();
			$message_id = $args[0];			

			if ($this->input->post('submit')) {
				$user_name = $this->input->post('name');
				$id = $this->models['users_model']->get_id($user_name);
				if ($id != '') {
					$this->models['messages_model']->add_user($message_id, $id);
				}
			}
			
			$users = $this->models['messages_model']->get_list_user($message_id);
			$data['users'] = $users;
			$data['message_id'] = $message_id;
			
			$data['title'] = 'Add member';
			$this->load_view('template/header', $data);
			$this->load_view('message/add_user', $data);
			$this->load_view('template/footer', $data);
		}
	}
	
	public function get_class_message() {
		if (func_num_args() == 2) {
			$args = func_get_args();
			$subject_id = $args[0];
			$last_message_id = $args[1];
			$contents = $this->models['messages_model']->get_class_message($subject_id, $last_message_id);
			echo json_encode($contents);
		}
    }
	
	public function send_class_message() {
		$user_id = $this->session->get('user_id');
		$class_id = $this->input->post('class_id');
        if ($user_id != '') {
			$content = $this->input->post('content');
			$dt = new DateTime();
			$dt->setTimezone (new DateTimeZone('Asia/Ho_Chi_Minh'));
			$time = $dt->format('Y-m-d H:i:s');
			$this->models['messages_model']->insert_class_message($user_id, $class_id, $time, $content);
		}
    }

}
