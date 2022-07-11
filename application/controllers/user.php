<?php
Class User extends Controller
{
    public function index() {
        $this->view("404");
    }
    public function signup() {

        if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = $this->load_model("User");
			$user->signup($_POST);
		}

        $this->view("users/signup");
    }

    public function login() {
        $data['page-title'] = "Login";
        if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$user = $this->load_model("User");
			$user->login($_POST);
		}
        $this->view("users/login", $data);
    }

    public function logout() {
        $user = $this->load_model("User");
		$user->logout();
    }

}
