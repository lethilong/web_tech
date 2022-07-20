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

    public function profile($token){
        $User = $this->load_model('User');
		$Order = $this->load_model('Order');
		$user_data = $User->checkLogin();

		
		$profile_data = $user_data;
		

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

        if(is_array($profile_data)){
			$orders = $Order->get_orders_by_user($profile_data->url_address);
		}else{
			$orders = false;
		}

		if(is_array($orders)){
			foreach ($orders as $key => $row) {
				# code...
				$details = $Order->get_order_details($row->id);
				$totals = array_column($details, "total");
				$grand_total = array_sum($totals);

				$orders[$key]->details = $details;
				$orders[$key]->grand_total = $grand_total;
			}
		}
        
		$data['profile_data'] = $profile_data;
		$data['page_title'] = "Profile";

		$this->view("users/profile",$data);
    }
}
