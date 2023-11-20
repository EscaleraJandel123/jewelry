<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class MainController extends Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->call->model('User_model');
    //     $this->call->library('auth');
    // }
    public function login()
    {
        // $data = $this->auth->login('jandeleido@gmail.com', '1');
        // var_dump($data);
        $this->call->view('login');
    }
    public function register()
    {
        $this->call->view('register');
    }
    // public function create(){
    //     $email = $this->io->post('email');
    //     $password = $this->io->post('password');
    //     // $token = $this->io->post('token');
    //     $bind = array(
    //         "email" => $email,
    //         "password" => password_hash($password,PASSWORD_DEFAULT),
    //         // "token" => 'unverified',
    //     );
    //     $this->db->table('users')->insert($bind);
    //     redirect('login');
    // }
    public function index()
    {
        $data['cart'] = $this->Shopmodel_model->getcart();
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('homepage',$data);
    }
    public function checkout()
    {
        $this->call->view('checkout');
    }
    public function contact()
    {  
        
        $this->call->view('contact');
    }
    public function detail()
    {
        $data['cart'] = $this->Shopmodel_model->getcart();
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('detail', $data);
    }
    public function view($id)
    {
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $this->call->view('viewdetails', $data);
    }
    public function shop()
    {
        $data['prod'] = $this->Shopmodel_model->getInfo();
        $data['cart'] = $this->Shopmodel_model->getcart();
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('shop', $data);
    }
    public function cart()
    {
        $data['cart'] = $this->Shopmodel_model->getcart();
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        // echo $cartItemCount;

        $this->call->view('cart', $data);
    }
    public function Ac($id)
    {
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $quantity = $this->io->post('quantity');
        $bind = [
            'name' => $data['prod']['name'],
            'image' => $data['prod']['image'],
            'prize' => $data['prod']['prize'],
            'quantity' => $quantity,
        ];
        $this->db->table('cart')->insert($bind);
       redirect('shop');
    }
    public function Acc($id)
    {
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $bind = [
            'name' => $data['prod']['name'],
            'image' => $data['prod']['image'],
            'prize' => $data['prod']['prize'],
            'quantity' => 1,
        ];
        $this->db->table('cart')->insert($bind);
       redirect('shop');
    }
    public function cartdel($id)
    {
        if(isset($id)){
            $this->db->table('cart')->where("id", $id)->delete();
            redirect('cart');
        }
        else{
            $_SESSION['delete'] = "FAILED";
            redirect('modify');
        }
    }
}
?>