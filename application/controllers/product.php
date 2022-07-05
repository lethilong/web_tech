<?php
class Product extends Controller {
  private $productModel;

  public function __construct() {
    $this->productModel = $this->load_model("Product");
  }

  public function index() {
    $data['page-title'] = 'Products';
    $data['products'] = $this->productModel->getAllProds();
    this->view('products', $data);
  }

  public function create() {
    $data['page-title'] = 'Add Product';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      if ($this->productModel->create($_POST, $_FILES)) {
        Redirect::to(products);
      } else {
        //$data['products'] = $this->productModel->getAllProd
        $this->view('products.add', $data);
      }
    }
  }
}
