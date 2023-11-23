<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('User_model'); // Make sure to load the User_model
        $this->getusers = $this->User_model->getusers();
    }

    public function create()
    {
        // retrieve form io values
        $email = $this->io->post('email'); // Use io->post() instead of io->post()
        $password = $this->io->post('password');
        $token = $this->verification(50);

        // add user ios to an array and continue with the insertion of data to the database with hashed token & password for security
        $data = array(
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT),
            "token" => $token
        );
        $this->User_model->addUser($data);
        redirect('/login');
    }

    public function verification($length)
    {
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        return substr(
            str_shuffle($str_result),
            0,
            $length
        );
    }

    // public function auth()
    // {
    //     $email = $this->io->post('email'); // Use io->post() instead of io->post()
    //     $password = $this->io->post('password');
    //     $user = $this->User_model->getEmail($email);

    //     if ($user && password_verify($password, $user['password'])) {
    //         $sesData = [
    //             'email' => $user['email'],
    //             'IsLoggedIn' => true
    //         ];
    //         // var_dump($sesData);
    //         $this->session->set_userdata($sesData);
    //         redirect('');
    //     } else {
    //         $this->session->set_flashdata('error', 'Invalid email or password');
    //         redirect('login');
    //     }
    // }

    public function auth()
{
    $email = $this->io->post('email'); // Use io->post() instead of io->post()
    $password = $this->io->post('password');
    $user = $this->User_model->getEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $sesData = [
            'user_id' => $user['id'], // Assuming user ID is present in your 'users' table
            'email' => $user['email'],
            'IsLoggedIn' => true
        ];
        $this->session->set_userdata($sesData);
        redirect('');
    } else {
        $this->session->set_flashdata('error', 'Invalid email or password');
        redirect('login');
    }
}

    public function login()
    {
        $this->call->view('login');
    }
    public function register()
    {
        $this->call->view('register');
    }
}
?>