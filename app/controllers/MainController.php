<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class MainController extends Controller {
	public function index() {
        $this->call->view('homepage');
    }
    public function shop() {
        $this->call->model('Shopmodel_model');
        $data['prod'] = $this->Shopmodel_model->getInfo();
        $this->call->view('shop', $data);
    }
    public function detail() {
        $this->call->view('detail');
    }
    public function cart() {
        $this->call->view('cart');
    }
    public function checkout() {
        $this->call->view('checkout');
    }
    public function contact() {
        $this->call->view('contact');
    }
}
?>
