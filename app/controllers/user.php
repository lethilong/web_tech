<?php
Class User extends Controller
{
    public function index() {
        $this->view("404");
    }
    public function Signup() {
        $data['page-title'] = "Signup";

        if($_SERVER['REQUEST_METHOD'] == "POST")
		{
 			show($_POST);
			$user = $this->load_model("User");
			$user->signup($_POST);
		}

        $this->view("signup", $data);
    }

    public function login() {
        $data['page-title'] = "Login";
        $this->view("login", $data);
    }
   
}