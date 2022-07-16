<?php 

Class Cart extends Controller
{

	public function index()
	{
		
		$User = $this->load_model('User');
		$image_class = $this->load_model('Image');
		$user_data = $User->checkLogin();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

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


		$data['page_title'] = "Cart";
		$data['sub_total'] = 0;

		if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
				$mytotal = $row->price * $row->cart_qty;

				$data['sub_total'] += $mytotal;
			}
		}

		if(is_array($ROWS)){
			rsort($ROWS);
		}
		
		$data['ROWS'] = $ROWS;

		$this->view("cart/index",$data);
	}

	private $redirect_to = "";

	public function add_to_cart($id = '')
	{
		$this->set_redirect();
		
		$id = esc($id);
		$DB = Database::newInstance();

		$ROWS = $DB->read("select * from products where id = :id limit 1",["id"=>$id]);

		if($ROWS){

			$ROW = $ROWS[0];
			if(isset($_SESSION['CART'])){

				$ids = array_column($_SESSION['CART'], "id");
				if(in_array($ROW->id, $ids)){

					$key = array_search($ROW->id, $ids);
					$_SESSION['CART'][$key]['qty']++;

				}else{
					$arr = array();
					$arr['id'] = $ROW->id;
					$arr['qty'] = 1;

					$_SESSION['CART'][] = $arr;
				}
			}else{

				$arr = array();
				$arr['id'] = $ROW->id;
				$arr['qty'] = 1;

				$_SESSION['CART'][] = $arr;
				
			}
			
		}

		header("Location: ". ROOT . "cart");
		die;
	}

	public function add_quantity($id = '')
	{
		$this->set_redirect();
		
		$id = esc($id);
		if(isset($_SESSION['CART'])){
			foreach ($_SESSION['CART'] as $key => $item) {
				# code...
				if($item['id'] == $id){

					$_SESSION['CART'][$key]['qty'] += 1;
					break;
				}
			}
		}

		$this->redirect();
	}

	public function subtract_quantity($id = '')
	{
		$this->set_redirect();
		
		$id = esc($id);
		if(isset($_SESSION['CART'])){
			foreach ($_SESSION['CART'] as $key => $item) {
				# code...
				if($item['id'] == $id){

					$_SESSION['CART'][$key]['qty'] -= 1;
					break;
				}
			}
		}

		$this->redirect();
	}

	public function remove($id = '')
	{
		$this->set_redirect();

		$id = esc($id);
		if(isset($_SESSION['CART'])){
			foreach ($_SESSION['CART'] as $key => $item) {
				# code...
				if($item['id'] == $id){

					unset($_SESSION['CART'][$key]);
					$_SESSION['CART'] = array_values($_SESSION['CART']);
					break;
				}
			}
		}

		$this->redirect();
	}

	private function redirect()
	{

		header("Location: ". $this->redirect_to);
		die;
	}

	private function set_redirect()
	{
		if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != "")
		{
			$this->redirect_to = $_SERVER['HTTP_REFERER'];
		}else{

			$this->redirect_to = ROOT . "shop";
		}
		
	}
}