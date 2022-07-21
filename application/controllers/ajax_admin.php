<?php
class Ajax_admin extends Controller {
    public function index() {
        $_SESSION['error'] = "";

		$data = file_get_contents("php://input");
		$data = json_decode($data);
        if (is_object($data) && isset($data->data_type)) {

			// $DB = Database::getInstance();
			$user = $this->load_model('User');

			if ($data->data_type == 'add_admin'){
				//add new category
				$check = $user->addAdmin($data);

				if ($_SESSION['error'] != "") {
					$arr['message'] = $_SESSION['error'];
					$_SESSION['error'] = "";
					$arr['message_type'] = "error";
					$arr['data_type'] = "add_new";

					echo json_encode($arr);
				} else {
					$arr['message'] = "success!";
					$arr['message_type'] = "info";
					$arr['data_type'] = "add_new";

					echo json_encode($arr);
				}
			}
        }
    }

}