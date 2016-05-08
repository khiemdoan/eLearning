<?php

class Account extends Framework\Controller {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        if ($this->input->post('submit')) {
            $this->validator->set_error_delimiters('<div class="alert alert-danger">', '</div>');

            // các luật
            $this->validator->set_rule('username', 'Username', 'trim|required');
            $this->validator->set_rule('password', 'Password', 'required');

            if ($this->validator->run() === true) {
                // nhập form thành công
                $this->load_model('users_model');
                if ($this->models['users_model']->check_user_exist() == true) {
                    $user = $this->models['users_model']->get_user();
                    if ($user == null) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Mật khẩu chưa chính xác!</div>');
                    } else {
                        $this->session->set($user);
                        redirect(base_url());
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Tài khoản không tồn tại!</div>');
                }
            }
        }
        $data['title'] = 'Login';
        $this->load_view('template/header', $data);
        $this->load_view('account/login', $data);
        $this->load_view('template/footer', $data);
    }

    public function signup() {
        if ($this->input->post('submit')) {
            $this->validator->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->validator->set_rule('username', 'Username', 'trim|required');
            $this->validator->set_rule('email', 'Email', 'trim|required|email');
            $this->validator->set_rule('password', 'Password', 'required');
            $this->validator->set_rule('confirm_password', 'Confirm Password', 'required');

            

            if (($this->validator->run()) === true) {
                $password = $this->input->post('password');
                $confirm_password = $this->input->post('confirm_password');
                if ($password !== $confirm_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Hai mật khẩu không khớp nhau!</div>');
                } else {
                    $this->load_model('users_model');
                    if ($this->models['users_model']->add_user() === true) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Bạn đã đăng ký tài khoản thành công!</div>');
                        
                        redirect(base_url('account/login'));
                    }
                }
            }
        }
        $data['title'] = 'Sign Up';
        $this->load_view('template/header', $data);
        $this->load_view('account/signup', $data);
        $this->load_view('template/footer', $data);
    }

    public function logout() {
        $this->session->destroy();
        redirect(base_url());
    }

    public function change_password() {
        if ($this->input->post('submit')) {
            $this->validator->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->validator->set_rule('new_password', 'New Password', 'required');
            $this->validator->set_rule('confirm_password', 'Confirm Password', 'required');
            $this->validator->set_rule('old_password', 'New Password', 'required');
            if (($this->validator->run()) === true) {
                $new_password = $this->input->post('new_password');
                $confirm_password = $this->input->post('confirm_password');
                if ($new_password !== $confirm_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Hai mật khẩu mới không khớp nhau!</div>');
                } else {
                    $this->load_model('users_model');
                    if ($this->models['users_model']->change_password() === true) {
                        $this->session->delete_all();
                        $this->session->set_flashdata('message', '<div class="alert alert-success">Bạn đã đổi password thành công!</div>');
                        redirect(base_url('account/login'));
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger">Hãy nhập lại mật khẩu cũ!</div>');
                    }
                }
            }
        }
        $data['title'] = 'Setting';
        $this->load_view('template/header', $data);
        $this->load_view('account/change_password', $data);
        $this->load_view('template/footer', $data);
    }

    public function delete_account() {
        if ($this->input->post('submit')) {
            $this->validator->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->validator->set_rule('password', 'New Password', 'required');
            if (($this->validator->run()) === true) {
                $this->load_model('users_model');
                if ($this->models['users_model']->delete_account() === true) {
                    $this->session->destroy();
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger">Hãy nhập lại mật khẩu!</div>');
                }
            }
        }
        $data['title'] = 'Delete Account';
        $this->load_view('template/header', $data);
        $this->load_view('account/delete_account', $data);
        $this->load_view('template/footer', $data);
    }
}
