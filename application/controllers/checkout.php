<?php
Class Checkout extends Controller {
    
    public function index() {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(["customer", "admin"]);
        if (is_object($user_data)) {
            $data['user_data'] = $user_data;
        }

        //get data
		$DB = Database::newInstance();
		$ROWS = false;
		$prod_ids = array();
		
		if(isset($_SESSION['CART'])){

			$prod_ids = array_column($_SESSION['CART'], 'id');
			$ids_str = "'" . implode("','", $prod_ids) . "'";

			$ROWS = $DB->read("select * from products where id in ($ids_str)");
		}

        if(is_array($ROWS)){
			foreach ($ROWS as $key => $row) {
				# code...

				foreach ($_SESSION['CART'] as $item) {
					# code...
					if($row->id == $item['id']){
						$ROWS[$key]->cart_qty = $item['qty'];
						break;
					}
				}
				
			}
		}
 
		$data['sub_total'] = 0;
		if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
 				$mytotal = $row->price * $row->cart_qty;

				$data['sub_total'] += $mytotal;
			}
		}

		if(isset($_SESSION['POST_DATA'])){
			$data['orders'][] = $_SESSION['POST_DATA'];
		}
		
		$data['page_title'] = "Checkout Summary";

		if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_SESSION['POST_DATA'])){

 			$sessionid = session_id();
			$user_url = "";
			if(isset($_SESSION['user_url'])){
				$user_url = $_SESSION['user_url'];
			}

			$order = $this->load_model('Order');
			$_SESSION['POST_DATA']['total'] = get_total($ROWS);
			$_SESSION['POST_DATA']['description'] = get_order_id();

			$order->save_order($_SESSION['POST_DATA'],$ROWS,$user_url,$sessionid);
			$data['errors'] = $order->errors;
			
			//unset($_SESSION['POST_DATA']);
			unset($_SESSION['CART']);

			header("Location:".ROOT."checkout/pay");
			die;
		}

		$data['order_details'] = $ROWS;
		$this->view("checkout/checkout",$data);


    }
}