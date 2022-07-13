<?php
class Product extends Controller {
  private $productModel;

  public function __construct() {
    $this->productModel = $this->load_model("Product");
  }

  public function index() {
    $data['page-title'] = 'Products';
    $data['products'] = $this->productModel->getAllProds();
    $this->view('products', $data);
  }

  public function create() {
    $data['page-title'] = 'Add Product';
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
    $data['page-title'] = 'Edit Product';
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

  public function search() {
    $data['page-title'] = 'All products';
    $searched = $_POST['search'];
    $results = $this->productModel->search($searched);
    $data['products'] = $results;
    $this->view('product/search', $data);
  }
}
