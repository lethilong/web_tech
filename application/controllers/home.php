<?php
Class Home extends Controller {
    public function index()
    {
        $User = $this->load_model('User');
        $image_class = $this->load_model('Image');
        $user_data = $User->checkLogin();

        if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

        $DB = Database::newInstance();

        $ROWS = $DB->read("select * from products");

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
        $data['page_title'] = "Home";
        $this->view("home", $data);
    }
}