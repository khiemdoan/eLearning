<?php

class Messages_Model extends Framework\Model {
    
    public function insert($user_id, $message_id, $time, $content) {
        $data = array(
            'user_id' => $user_id,
            'message_id' => $message_id,
            'time' => $time,
            'content' => $content
        );
        return $this->database->insert('message_content', $data);
    }
    
    public function create($subject_id, $name) {
        $data = array('subject_id' => $subject_id, 'name' => $name);
        return $this->database->insert('messages', $data);
    }
    
    public function get($message_id = 0, $last_id = 0) {
		$sql = "SELECT username, message_id, message_content_id, time, content FROM users, message_content WHERE users.user_id = message_content.user_id AND message_id = ".$message_id." AND message_content_id > ".$last_id;
        return $this->database->get($sql);
    }

    public function get_list_messages() {
        $this->database->select(array('message_id', 'name'));
        $this->database->from('messages');
        return $this->database->get();
    }
	
	public function get_message_id($lecture_id, $user_id) {
		$sql = "SELECT messages.message_id FROM user_in_message, messages WHERE ".$user_id." = user_in_message.user_id AND user_in_message.message_id = messages.message_id AND messages.subject_id = ".$lecture_id;
		return $this->database->get($sql);
	}
	
	public function get_class_message($subject_id = 0, $last_id = 0) {
		$sql = "SELECT username, message_content_id, time, content FROM users, class_message WHERE users.user_id = class_message.user_id AND class_message.subject_id = ".$subject_id." AND message_content_id > ".$last_id;
		return $this->database->get($sql);
	}
	
	public function insert_class_message($user_id, $subject_id, $time, $content) {
        $data = array(
            'subject_id' => $subject_id,
			'user_id' => $user_id,
            'time' => $time,
            'content' => $content
        );
        return $this->database->insert('class_message', $data);
    }
    
    public function check_permission($user_id, $message_id) {
        $sql = 'SELECT id FROM user_in_message WHERE user_id = '.$user_id.' AND message_id = '.$message_id;
        $ids = $this->database->get($sql);
        if (!empty($ids)) {
            return true;
        }
        return false;
    }
    
    public function add_user($message_id, $user_id) {
        $data = array(
            'user_id' => $user_id,
            'message_id' => $message_id
        );
        return $this->database->insert('user_in_message', $data);
    }
    
    public function get_list_user($message_id) {
        $sql = 'SELECT users.username FROM users, user_in_message WHERE users.user_id = user_in_message.user_id AND user_in_message.message_id = '.$message_id;
        return $this->database->get($sql);
    }
	
	public function get_class_name_by_id($id) {
		$this->database->select(array('message_id', 'name'));
        $this->database->from('messages');
		$this->database->where('message_id', '=', $id);
        $a = $this->database->get();
		if (!empty($a)) {
			return $a[0]['name'];
		}
	}
}
