<?php 

class Home extends Framework\Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data['title'] = 'Home';
        $this->load_view('template/header', $data);
        $this->load_view('home', $data);
        $this->load_view('template/footer', $data);
    }
}
