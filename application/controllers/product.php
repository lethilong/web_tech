<?php
class Product extends Controller {
  private $productModel;

  public function __construct() {
    $this->productModel = $this->load_model("Product");
  }

  public function index() 	{
		//check if its a search
		$search = false;
		if(isset($_GET['find']))
		{
			$find = addslashes($_GET['find']);
			$search = true;
		}

		$User = $this->load_model('User');
		$image_class = $this->load_model('Image');
		$user_data = $User->checkLogin();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();

		if($search){
			$arr['name'] = "%". $find . "%";
			$ROWS = $DB->read("select * from products where name like :name or name like :description or brand like :name",$arr);
		}else{
			$ROWS = $DB->read("select * from products");
		}

		$data['page_title'] = "Products";

		if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
			}
		}

		//get all categories
		$category = $this->load_model('category');
		$data['categories'] = $category->get_all();


		$data['ROWS'] = $ROWS;
		$data['show_search'] = true;
		$this->view("products/index",$data);
	}

	public function category($cat_find = '')
	{

		$User = $this->load_model('User');
		$category = $this->load_model('category');
		$image_class = $this->load_model('Image');
		$user_data = $User->checkLogin();

		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();

 		$cat_id = null;
		$check = $category->get_one_by_id($cat_find);
		if(is_object($check)){
			$cat_id = $check->id;
		}
		$ROWS = $DB->read("select * from products where category = :cat_id",["cat_id"=>$cat_id]);

		$data['page_title'] = "Products";

		if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
			}
		}

		//get all categories
		$data['categories'] = $category->get_all();


		$data['ROWS'] = $ROWS;
		$data['show_search'] = true;

		$this->view("products/category",$data);
	}

  public function details($slag){
    $slag = esc($slag);

		$User = $this->load_model('User');
		$userData = $User->checkLogin();

		if(is_object($userData)){
			$data['user_data'] = $userData;
		}

		$DB = Database::newInstance();

		$ROW = $DB->read("select * from products where slag = :slag",['slag'=>$slag]);
    $category = $DB->read("select * from categories where id = :id", ['id'=> $ROW[0]->category]);
    $data['category']=$category[0]->category;

    //get all prods
    $ROWS = $DB->read("select * from products where category = :cat", ["cat" => $category[0]->id]);
    shuffle($ROWS);
    $ROWS = array_slice($ROWS, 0, 3);
    $image_class = $this->load_model('Image');
    if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_recommend($ROWS[$key]->image);
			}
		}
    		$data['ROWS'] = $ROWS;

    //get all categories
		$category = $this->load_model('category');
		$data['categories'] = $category->get_all();

		$data['page_title'] = "Product Details";
		$data['ROW'] = is_array($ROW) ? $ROW[0] : false;

		$this->view("products/details",$data);
  }

  public function ajax() {
    if(count($_POST) > 0){
 			$data = (object)$_POST;
		}else{
 			$data = file_get_contents("php://input");
 			$data = json_decode($data);
		}

 		if(is_object($data) && isset($data->data_type))
		{

			$DB = Database::getInstance();
			$product = $this->load_model('Product');
			$category = $this->load_model('Category');
			$image_class = $this->load_model('Image');

			if($data->data_type == 'add_product')
			{
				//add new product
				$check = $product->create($data,$_FILES,$image_class);

				if($_SESSION['error'] != "")
				{
          			$arr['message'] = $_SESSION['error'];
					$_SESSION['error'] = "";
					$arr['message_type'] = "error";
					$arr['data'] = "";
					$arr['data_type'] = "add_new";

					echo json_encode($arr);
				}
        		else
				{
					$arr['message'] = "Product added successfully!";
					$arr['message_type'] = "info";
					$cats = $product->getAllProds();
					$arr['data'] = $product->makeTable($cats,$category);
					$arr['data_type'] = "add_new";

					echo json_encode($arr);
				}
			}else
			if($data->data_type == 'disable_row')
			{

				$disabled = ($data->current_state == "Enabled") ?  1 : 0 ;
				$id = $data->id ;

				$query = "update categories set disabled = '$disabled' where id = '$id' limit 1";
				$DB->write($query);

				$arr['message'] = "";
				$_SESSION['error'] = "";
				$arr['message_type'] = "info";

				$cats = $product->getAllProds();
				$arr['data'] = $product->makeTable($cats);

				$arr['data_type'] = "disable_row";

				echo json_encode($arr);

			}else
			if($data->data_type == 'edit_product')
			{

				$product->edit($data,$_FILES,$image_class);
				if($_SESSION['error'] != ""){
					$arr['message'] = $_SESSION['error'];
					$arr['message_type'] = "error";
				}else{

					$arr['message'] = "Your row was successfully edited";
					$arr['message_type'] = "info";
				}

				$_SESSION['error'] = "";

				$cats = $product->getAllProds();
				$arr['data'] = $product->makeTable($cats,$category);

				$arr['data_type'] = "edit_product";

				echo json_encode($arr);

			}else
			if($data->data_type == 'delete_row')
			{

				$product->delete($data->id);
				$arr['message'] = "Your row was successfully deleted";
				$_SESSION['error'] = "";
				$arr['message_type'] = "info";

				$cats = $product->getAllProds();
				$arr['data'] = $product->makeTable($cats,$category);

				$arr['data_type'] = "delete_row";

				echo json_encode($arr);
			}


		}

  }
/*
  public function create() {
    $data['page_title'] = 'Add Product';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->productModel->create($_POST, $_FILES)) {
        Redirect::to('product');
      } else {
        //$data['products'] = $this->productModel->getAllProd
        $this->view('products/add', $data);
      }
    }
  }

  public function update($id) {
    $data['page_title'] = 'Edit Product';
    $data['product'] = $this->productModel->getProdById($id);
    if ($this->productModel->update($_POST, $_FILES)) {
      Redirect::to('products');
    } else $this->view('products/update', $data);
  }

  public function delete($id){
    $delete =  $this->productModel->delete($id);
    if($delete){
        Redirect::to('products');
    }
  }
*/
/*
  public function search() {
    $data['page_title'] = 'All products';
    $searched = $_POST['search'];
    $results = $this->productModel->search($searched);
    $data['products'] = $results;
    $this->view('product/search', $data);
  }
  */
}
