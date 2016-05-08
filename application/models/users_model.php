<?php

class Users_Model extends Framework\Model {
    
    public function add_user() {
        $data = array(
            'username' => ucwords(strtolower($this->input->post('username'))),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password'))
        );
        $this->database->insert('users', $data);
        $sql = 'SELECT max(user_id) AS user_id FROM users';
        $ids = $this->database->get($sql);
        if (!empty($ids)) {
            $sql = 'SELECT permission_id FROM permission WHERE name LIKE "student"';
            $permis_ids = $this->database->get($sql);
            if (!empty($permis_ids)) {
                $data = array(
                    'user_id' => $ids[0],
                    'permission_id' => $permis_ids[0]
                );
                $this->database->insert('user_permission', $data);
                return true;
            }
        }
    }
    
	public function check_user_exist() {
        $username = ucwords(strtolower($this->input->post('username')));
        $this->database->select(array('username'))->from('users');
        $this->database->where('username', '=', $username);
        return $this->database->count_all_results();
    }
    
    public function get_user() {
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $this->database->select(array('user_id', 'username', 'email'));
        $this->database->from('users')->limit(1);
        $this->database->where('username', '=', $username);
        $this->database->where('password', '=', $password);
        $result = $this->database->get();
        if ($result == null) {
            return null;
        } else {
            return $result[0];
        }
    }
    
    public function change_password() {
        $new_password = sha1($this->input->post('new_password'));
        $old_password = sha1($this->input->post('old_password'));
        
        $this->database->select(array('user_id'));
        $this->database->from('users')->limit(1);
        $this->database->where('user_id', '=', $this->session->get('user_id'));
        $this->database->where('password', '=', $old_password);
        if ($this->database->count_all_results() == 1) {
            $this->database->where('user_id', '=', $this->session->get('user_id'));
            $this->database->limit(1);
            $this->database->update('users', array('password' => $new_password));
            return true;
        } else {
            return false;
        }
    }
    
    public function delete_account() {
        $password = sha1($this->input->post('password'));
        $this->database->select(array('user_id'));
        $this->database->from('users')->limit(1);
        $this->database->where('user_id', '=', $this->session->get('user_id'));
        $this->database->where('password', '=', $password);
        if ($this->database->count_all_results() == 1) {
            $this->database->where('user_id', '=', $this->session->get('user_id'));
            $this->database->limit(1);
            $this->database->delete('users');
            return true;
        } else {
            return false;
        }
    }
    
    public function get_permission($user_id) {
        $sql = "SELECT permission.name FROM permission, user_permission WHERE permission.permission_id = user_permission.permission_id AND user_permission.user_id = " . $user_id;
        $permissions = $this->database->get($sql);
        if (!empty($permissions)) {
            return $permissions[0]['name'];
        } else {
            return '';
        }
    }
    
    public function get_id($username) {
        $sql = 'SELECT users.user_id FROM users WHERE users.username LIKE "%'.$username.'%"';
        echo $sql;
        $ids = $this->database->get($sql);
        if (!empty($ids)) {
            return $ids[0]['user_id'];
        }
        return '';
    }
}
