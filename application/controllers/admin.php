<?php
Class Admin extends Controller {
    public function index()
    {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(['admin']);
        $data['page-title'] = "Admin";
        $this->view("admin/index", $data);
    }
}