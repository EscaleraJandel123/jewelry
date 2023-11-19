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
        $this->call->view('homepage');
    }
    public function shop()
    {
        $data['prod'] = $this->Shopmodel_model->getInfo();
        $this->call->view('shop', $data);
    }

    public function cart()
    {
        $this->call->view('cart');
    }

    public function Ac($id)
    {
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $bind = [
            'name' => $data['prod']['name'],
            'image' => $data['prod']['image'],
            // 'quantity' => 0,
        ];
        $this->db->table('cart')->insert($bind);
        // $this->call->view('addtocart',$data);
        redirect('shop');
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
        $this->call->view('detail');
    }

    public function view($id)
    {
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $this->call->view('viewdetails', $data);
    }
}
?>