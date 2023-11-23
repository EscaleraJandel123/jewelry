<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class UserController extends Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->call->model('User_model');
    //     $this->getusers = $this->User_model->getusers();
    // }

    public function create()
    {
        $email = $this->io->post('email');
        $password = $this->io->post('password');

        $data = array(
            "email" => $email,
            "password" => password_hash($password, PASSWORD_DEFAULT),
        );
        $this->User_model->addUser($data);
        redirect('/login');
    }

    // public function auth()
    // {
    //     $email = $this->io->post('email'); // Use io->post() instead of io->post()
    //     $password = $this->io->post('password');
    //     $user = $this->User_model->getEmail($email);

    //     if ($user && password_verify($password, $user['password'])) {
    //         $sesData = [
    //             'user_id' => $user['id'], // Assuming user ID is present in your 'users' table
    //             'email' => $user['email'],
    //             'IsLoggedIn' => true
    //         ];
    //         $this->session->set_userdata($sesData);
    //         redirect('');
    //     } else {
    //         $this->session->set_flashdata('error', 'Invalid email or password');
    //         redirect('login');
    //     }
    // }

    public function auth()
{
    $email = $this->io->post('email');
    $password = $this->io->post('password');
    $user = $this->User_model->getEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        $sesData = [
            'user_id' => $user['id'],
            'email' => $user['email'],
            'IsLoggedIn' => true  // Use a more specific key
        ];

        // Check user role and redirect accordingly
        if ($user['role'] == 'admin') {
            $ses = ['IsAdmin' => true,];
            // Redirect admin to the admin page
            $this->session->set_userdata($ses);
            redirect('dashboard');
        } else {
            // Redirect regular user to the homepage
            $this->session->set_userdata($sesData);
            redirect('');
        }
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