<?php
Class UserModel {
    private $error = "";

    public function signup($POST) {
        $db = Database::getInstance();

		$data = [
			"token" => "",
			"name" => trim($POST['name']),
			"email" => trim($POST['email']),
			"phone" => trim($POST['phone']),
			"address" => trim($POST['address']),
			"password" => trim($POST['password'])
		];
        $password2= trim($POST['password2']);

        if(empty($data['name']) || !preg_match("/^[a-zA-Z]+$/", $data['name'])) {
			$this->error .= "Họ và tên không hợp lệ <br>";
		}

        if(empty($data['email']) || !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])) {
			$this->error .= "Email không hợp lệ <br>";
		}

        if(empty($data['phone']) || !preg_match("/^0[0-9]{9,10}$/", $data['phone'])) {
			$this->error .= "Số điện thoại không hợp lệ <br>";
		}

        if(empty($data['address'])) {
            $this->error .= "Địa chỉ không hợp lệ <br>";
        }

        if($data['password'] !== $password2)
		{
			$this->error .= "Mật khẩu không khớp <br>";
		}

		if(strlen($data['password']) < 4)
		{
			$this->error .= "Mật khẩu phải bao gồm tối thiểu 4 kí tự <br>";
		}

        //check if email already exists
		$sql = "select email from users where email = :email limit 1";
		$arr['email'] = $data['email'];
		$check = $db->read($sql, $arr);

		if(is_array($check)) {
			$this->error .= "Email đã được sử dụng <br>";
		}

		
		$arr=false;
        //check if phone already exists
		$sql = "select * from users where phone = :phone limit 1";
		$arr['phone'] = $data['phone'];
		$check = $db->read($sql, $arr);
		if(is_array($check)) {
			$this->error .= "Số điện thoại đã được sử dụng <br>";
		}

        $data['token'] = $this->get_random_string_max(60);

		$arr = false;
		$sql = "select * from users where token = :token limit 1";
		$arr['token'] = $data['token'];
		$check = $db->read($sql, $arr);
		if(is_array($check)) {
			$data['token'] = $this->get_random_string_max(60);
		}

        if($this->error == ""){
			//save
			$data['password'] = hash('sha1',$data['password']);
			$sql = "insert into users (token, name, email, password, phone, address) values (:token, :name, :email, :password, :phone, :address)";

			$result = $db->write($sql, $data);

			if ($result) {
				header("Location: " . ROOT . "user/login");
			 	die;
			}
		}

        $_SESSION['error'] = $this->error;

    }

    public function login($POST) {

		$db = Database::getInstance();

		$data = [
			"email" => trim($_POST["email"]),
			"password" => trim($_POST["password"])
		];

		if(empty($data['email']) || !preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z]+.[a-zA-Z]+$/", $data['email'])) {
			$this->error .= "Email không hợp lệ <br>";
		}

		if($this->error == "") {
			$data['password'] = hash('sha1',$data['password']);

			$sql = "select * from users where email = :email && password = :password limit 1";
 			$result = $db->read($sql, $data);
			if(is_array($result)) {		
			$_SESSION['token'] = $result[0]->token;	
			header("Location: " . ROOT . "home");
			die;
			}

			$this->error .= "Email hoặc mật khẩu không đúng";
		}
		$_SESSION['error'] = $this->error;

		

    }

	public function logout() {
		if(isset($_SESSION['user_url']))
		{
			unset($_SESSION['user_url']);
		}

		header("Location: " . ROOT . "home");
		die;
		
	}

    public function getUser($url) {
        
    }

    private function get_random_string_max($length) {

		$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$text = "";

		$length = rand(10, $length);

		for($i=0;$i<$length;$i++) {

			$random = rand(0,61);
			
			$text .= $array[$random];

		}

		return $text;
	}

}