<?php
Class Admin extends Controller {
    public function index()
    {
        $User = $this->load_model('User');
        $user_data = $User->checkLogin(['admin']);
        $data['page-title'] = "Admin";
        $this->view("admin/index", $data);
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
}