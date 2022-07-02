<?php
class Product extends Controller {
  private $productModel;

  public function __construct() {
    $this->productModel = $this->load_model("Product");
  }

  public function index() {
    $data['page-title'] = 'Products';
    $data['products'] = $this->productModel->get_all();
    this->view('products', $data);
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      //...
    }
  }
}
