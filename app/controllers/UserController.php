<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class UserController extends Controller
{
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
    //     $email = $this->io->post('email');
    //     $password = $this->io->post('password');
    //     $user = $this->User_model->getEmail($email);

    //     if ($user && password_verify($password, $user['password'])) {
    //         $sesData = [
    //             'user_id' => $user['id'],
    //             'email' => $user['email'],
    //             'IsLoggedIn' => true
    //         ];
    //         if ($user['role'] == 'admin') {
    //             $ses = ['IsAdmin' => true,];
    //             $this->session->set_userdata($ses);
    //             redirect('dashboard');
    //         } else {
    //             $this->session->set_userdata($sesData);
    //             redirect('');
    //         }
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
                'IsLoggedIn' => true,
                'role' => $user['role'], // Include user role in the session data
            ];

            $this->session->set_userdata($sesData);

            if ($user['role'] == 'admin') {
                redirect('dashboard');  // Redirect to admin dashboard
            } else {
                redirect('');  // Redirect to user dashboard
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
    // public function logout()
    // {
    //     $this->session->sess_destroy();
    //     redirect('login');
    // }

    public function logout()
    {
        // Check if user is an admin or regular user
        $role = $this->session->userdata('role');

        if ($role == 'admin') {
            // Admin logout
            $this->session->unset_userdata(['user_id', 'email', 'IsLoggedIn', 'role']);
            // Additional admin logout logic if needed
            redirect('login');  // Redirect to admin login page
        } else {
            // User logout
            $this->session->unset_userdata(['user_id', 'email', 'IsLoggedIn', 'role']);
            redirect('login');  // Redirect to user login page
        }
    }

}
?>