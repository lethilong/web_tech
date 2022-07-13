<?php
class Category extends Controller {
  private $categoryModel;

  public function __construct() {
    $this->categoryModel = $this->load_model("category");
  }

  public function index() {
    $data['page-title'] = 'categories';
    $data['categories'] = $this->categoryModel->getcategory();
    $this->view('categories', $data);
  }

  public function create() {
    $data['page-title'] = 'Add category';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->categoryModel->create($_POST)) {
        Redirect::to('category');
      } else {
        //$data['categories'] = $this->categoryModel->getAllProd
        $this->view('categories.add', $data);
      }
    }
  }
}
 