<?php

class Lecture_Model extends Framework\Model {
    
    public function get_lecture($lecture_id) {
		$this->database->select(array('id', 'name'));
		$this->database->from('subjects');
		$this->database->where('id', '=', $lecture_id);
		return $this->database->get();
	}
	
	public function find_lecture($name) {
		$this->database->select(array('id', 'name'));
		$this->database->from('subjects');
		$this->database->where('name', '=', $name);
		return $this->database->get();
	}
}
