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
    // public function changePass()
    // {
    //     $userId = $this->session->userdata('user_id');
    //     // Fetch user information from the model
    //     $data['user'] = $this->User_model->getUserById($userId);

    //     // Get form data
    //     $currentPassword = $this->io->post('password');
    //     $newPassword = $this->io->post('newpassword');
    //     $reenteredPassword = $this->io->post('renewpassword');

    //     // Validate that the new password and re-entered password match
    //     if ($newPassword !== $reenteredPassword) {
    //         // Handle password mismatch error (e.g., display an error message)
    //         redirect('profile'); // Redirect back to the profile page
    //         return;
    //     }
    //     // Check if the current password matches the one in the database
    //     $user = $this->User_model->getUserById($userId);

    //     if ($user && password_verify($currentPassword, $user['password'])) {
    //         // Update the user's password
    //         $updatedData = ['password' => password_hash($newPassword, PASSWORD_DEFAULT)];

    //         $this->db->table('users')->where('id', $userId)->update($updatedData);

    //         // Redirect to a success page or any desired destination
    //         echo 'Password updated successfully';
    //     } else {
    //         // Handle incorrect current password error (e.g., display an error message)
    //         redirect('profile'); // Redirect back to the profile page
    //     }
    // }
    public function changePass()
    {
        $userId = $this->session->userdata('user_id');
        // Fetch user information from the model
        $data['user'] = $this->User_model->getUserById($userId);
    
        // Get form data
        $currentPassword = $this->io->post('password');
        $newPassword = $this->io->post('newpassword');
        $reenteredPassword = $this->io->post('renewpassword');
    
        // Validate that the new password and re-entered password match
        if ($newPassword !== $reenteredPassword) {
            // Handle password mismatch error
            $this->session->set_flashdata('error', 'New password and re-entered password do not match.');
            redirect('profile');
            return;
        }
    
        // Check if the current password matches the one in the database
        $user = $this->User_model->getUserById($userId);
    
        if ($user && password_verify($currentPassword, $user['password'])) {
            // Update the user's password
            $updatedData = ['password' => password_hash($newPassword, PASSWORD_DEFAULT)];
            $this->db->table('users')->where('id', $userId)->update($updatedData);
    
            // Set a success flash message
            $this->session->set_flashdata('success', 'Password updated successfully.');
        } else {
            // Set an error flash message for incorrect current password
            $this->session->set_flashdata('error', 'Incorrect current password.');
        }
    
        redirect('profile');
    }
    
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
            $this->session->set_flashdata('email_error', 'Invalid email');
            $this->session->set_flashdata('password_error', 'Invalid password');
            redirect('login');
        }
        
    }

    public function login()
    {
        if ($this->session->userdata('IsLoggedIn') || $this->session->userdata('role') == 'admin') {
            redirect('dashboard');
        } elseif ($this->session->userdata('IsLoggedIn') || $this->session->userdata('role') == 'user') {
            redirect('');
        }
        $this->call->view('login');
    }
    public function register()
    {
        $this->call->view('register');
    }


    public function logout()
    {
        // Check if user is an admin or regular user
        $role = $this->session->userdata('role');

        if ($role == 'admin') {
            // Admin logout
            $this->session->unset_userdata(['user_id', 'email', 'IsLoggedIn', 'role']);
            // Additional admin logout logic if needed
            redirect('login');  // Redirect to admin login page
        } elseif ($role == 'user') {
            // User logout
            $this->session->unset_userdata(['user_id', 'email', 'IsLoggedIn', 'role']);
            redirect('login');  // Redirect to user login page
        } else {
            // If the role is not recognized, just log out without redirecting
            $this->session->unset_userdata(['user_id', 'email', 'IsLoggedIn', 'role']);
            redirect('login');  // Redirect to a default login page
        }
    }
}
?>