<?php
class Ajax_admin extends Controller {
    public function index() {
        $_SESSION['error'] = "";

		$data = file_get_contents("php://input");
		print($data);
		$data = json_decode($data);
		$arr['message'] = $data->name;
		echo json_encode($arr);
        if (is_object($data) && isset($data->data_type)) {

			// $DB = Database::getInstance();
			$user = $this->load_model('User');
            show($data);

			if ($data->data_type == 'add_admin'){
				//add new category
				// $check = $user->createAdmin($data);

				if ($_SESSION['error'] != "") {
					$arr['message'] = $_SESSION['error'];
					$_SESSION['error'] = "";
					$arr['message_type'] = "error";
					$arr['data'] = "";
					$arr['data_type'] = "add_new";

					echo json_encode($arr);
				} else {
					$arr['message'] = "Category added successfully!";
					$arr['message_type'] = "info";
					// $cats = $category->get_all();
					// $arr['data'] = $category->make_table($cats);
					$arr['data_type'] = "add_new";

					echo json_encode($arr);
				}
			}
        }
    }

}