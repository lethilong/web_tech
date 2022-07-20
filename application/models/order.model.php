<?php
Class OrderModel extends Controller {
    public $errors = array();

    public function get_all_orders() {
        $orders = false;
        $db = Database::newInstance();
        $query = "select * from orders order by id";
        $orders = $db->read($query);
        return $orders;
    }

    public function get_order_details($id){

		$details = false;
		$data['id'] = addslashes($id);
		$db = Database::newInstance();

		$query = "select * from order_details where orderid = :id order by id desc";
		$details = $db->read($query,$data);

		return $details;

	}

    public function get_orders_by_user($user_url){

		$orders = false;

		$db = Database::newInstance();
		$data['user_url'] = $user_url;

		$query = "select * from orders where user_url = :user_url order by id desc limit 100";
		$orders = $db->read($query,$data);

		return $orders;

	}
}