<?php
Class Admin extends Controller {
    public function index()
    {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(['admin']);
        $data['user_data'] = $user_data;
        $data['current_page'] = "dashboard";
        $data['page_title'] = 'Admin';
        $this->view('admin/index', $data);
    }

    public function users($type = "customer") {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(['admin']);
        if(is_object($user_data)) {
            $data['user_data'] = $user_data;
        }

        if($type == 'admin') {
            $users = $User->getAllAdmins();
        } else {
            $users = $User->getAllCustomers();
        }
        $users = $User->getAllCustomers();

        $data['users'] = $users;
        $data['current_page'] = "users";
        $data['page_title'] = "Customer";
        $this->view('admin/users', $data);
    }
}