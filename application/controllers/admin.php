<?php
Class Admin extends Controller {
    public function index()
    {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(['admin']);
        if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}
        $data['current_page'] = "dashboard";
        $data['page_title'] = 'Admin';
        $this->view('admin/index', $data);
    }

    public function users($type = "customers") {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(['admin']);
        if(is_object($user_data)) {
            $data['user_data'] = $user_data;
        }

        if($type == 'admins') {
            $users = $User->getAllAdmins();
			$data['page_title'] = "Admin - Admins";
        } else {
            $users = $User->getAllCustomers();
			$data['page_title'] = "Admin - Customers";
        }
        $data['users'] = $users;
        $data['current_page'] = "users";
        
        $this->view('admin/users', $data);
    }

    public function categories()
	{

		$User = $this->load_model('User');
		$user_data = $User->checkLogin(["admin"]);
		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();
		$categories_all = $DB->read("select * from categories order by id desc");

		$category = $this->load_model("Category");
		$tbl_rows = $category->make_table($categories_all);
		$data['tbl_rows'] = $tbl_rows;
		// $data['categories'] = $categories;

		$data['page_title'] = "Admin - Categories";
		$data['current_page'] = "categories";
		$this->view("admin/categories",$data);
	}

  public function products()
	{

		$User = $this->load_model('User');
		$user_data = $User->checkLogin(["admin"]);
		if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

		$DB = Database::newInstance();
		$products = $DB->read("select * from products order by id desc");

 		$categories = $DB->read("select * from categories  order by id desc");

		$product = $this->load_model("Product");
		$category = $this->load_model("Category");

		$tbl_rows = $product->makeTable($products,$category);
		$data['tbl_rows'] = $tbl_rows;
		$data['categories'] = $categories;

		$data['page_title'] = "Admin - Products";
		$data['current_page'] = "products";
		$this->view("admin/products",$data);
	}
}
