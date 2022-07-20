<?php
Class OrderModel extends Controller {
    public $error = "";

    public function get_all_orders() {
        $orders = false;
        $db = Database::newInstance();
        date_default_timezone_set("Asia/Ho_Chi_Minh");
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

    public function save_order($user_token, $details, $name, $phone, $address, $total) {
        $db = Database::newInstance();
        $data = [
			"user_token" =>$user_token,
			"delivery_name" =>$name,
			"delivery_phone" =>$phone,
			"delivery_address" =>$address,
			"total_price" => $total,
			"date" => date("Y-m-d H:i:s")
		];
        // $this->check_details($details);
        // if($this->error) return;
        //save details
		$orderId = 0;
		$query = "select id from orders order by id desc limit 1";
		$result = $db->read($query);

		if(is_array($result)){
			$orderId = $result[0]->id + 1;
		}

        $query = "insert into orders(user_token, delivery_name, delivery_phone, delivery_address, total_price, date) 
        values (:user_token, :delivery_name, :delivery_phone, :delivery_address, :total_price, :date)";

        $result = $db->write($query, $data);

        $data=false;

        foreach ($details as $detail) {

            $data = [
                "orderId" => $orderId,
                "qty" => $detail->cart_qty,
                "amount" => $detail->price,
                "total" => $detail->cart_qty * $detail->price,
                "productId" => $detail->id,
            ];

            $query = "insert into order_details (orderId,qty,amount,total,productId) values (:orderId,:qty,:amount,:total,:productId)";
            $result = $db->write($query,$data);
        }
        

    }

    // public function check_details($details) {
    //     $db = Database::newInstance();
    //     foreach( $details as $detail) {
    //         $arr['id']= $detail->productId;
    //         $query = "select quantity from products where id=:id limit 1";
    //         $result = $db->read($query, $arr);
    //         if (!is_array($result)) {
    //             $this->error = "Sản phẩm không tồn tại";
    //             return;
    //         };
    //         if ($result[0]->quantity < $detail->cart_qty) {
    //             $this->error = "Sản phẩm ".$detail->name. " hiện không còn đủ hàng";
    //             return;
    //         }

    //     }
    // }
}