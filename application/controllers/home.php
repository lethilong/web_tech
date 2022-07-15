<?php
Class Home extends Controller {
    public function index()
    {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}
        $data['page_title'] = "Home";
        $this->view("home", $data);
    }
}