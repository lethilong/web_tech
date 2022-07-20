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

		$data['order_details'] = $ROWS;
		$_SESSION['POST_DATA']['details'] = $ROWS;
		$_SESSION['POST_DATA']['total'] = get_total($ROWS);
		
		$data['page_title'] = "Checkout Summary";

		$data['order_details'] = $ROWS;
		$this->view("checkout/checkout",$data);


    }

	public function ajax_checkout(){
		
		$data = file_get_contents("php://input");
		print($data);
		$data = json_decode($data);
		print(is_object($data));
		show($_SESSION['POST_DATA']);
		print($_SESSION['token']);
		$Order = $this->load_model('Order');
		$Order->save_order($_SESSION['token'], $_SESSION['POST_DATA']['details'],$data->delivery_name, $data->delivery_phone, $data->delivery_address,$_SESSION['POST_DATA']['total']);
		unset($_SESSION['POST_DATA']);
		unset($_SESSION['CART']);
		$arr["success"] = true;
		echo json_encode($arr);

	}
}