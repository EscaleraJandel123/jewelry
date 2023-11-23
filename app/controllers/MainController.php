<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class MainController extends Controller
{

    public function index()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('homepage', $data);
    }

    public function checkout()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('checkout', $data);
    }
    public function contact()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('contact', $data);
    }
    public function detail()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('detail', $data);
    }
    public function view($id)
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('viewdetails', $data);
    }
    public function shop()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        $data['prod'] = $this->Shopmodel_model->getInfo();
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
        $this->call->view('shop', $data);
    }
    // public function cart()
    // {
    //     if (!$this->session->userdata('IsLoggedIn')) {
    //         redirect('login');
    //     }
    //     $data['cart'] = $this->Shopmodel_model->getcart();
    //     $data['cartItemCount'] = count($data['cart']); //count the number of data in carts
    //     $this->call->view('cart', $data);
    // }
    // public function Ac($id)
    // {
    //     if (!$this->session->userdata('IsLoggedIn')) {
    //         redirect('login');
    //     }
    //     $data['prod'] = $this->Shopmodel_model->getInfoById($id);
    //     $quantity = $this->io->post('quantity');
    //     $bind = [
    //         'name' => $data['prod']['name'],
    //         'image' => $data['prod']['image'],
    //         'prize' => $data['prod']['prize'],
    //         'quantity' => $quantity,
    //     ];
    //     $this->db->table('cart')->insert($bind);
    //     redirect('shop');
    // }
    // public function Acc($id)
    // {
    //     if (!$this->session->userdata('IsLoggedIn')) {
    //         redirect('login');
    //     }
    //     $data['prod'] = $this->Shopmodel_model->getInfoById($id);
    //     $bind = [
    //         'name' => $data['prod']['name'],
    //         'image' => $data['prod']['image'],
    //         'prize' => $data['prod']['prize'],
    //         'quantity' => 1,
    //     ];
    //     $this->db->table('cart')->insert($bind);
    //     redirect('shop');
    // }
    // public function cartdel($id)
    // {
    //     if (!$this->session->userdata('IsLoggedIn')) {
    //         redirect('login');
    //     }
    //     if (isset($id)) {
    //         $this->db->table('cart')->where("id", $id)->delete();
    //         redirect('cart');
    //     } else {
    //         $_SESSION['delete'] = "FAILED";
    //         redirect('modify');
    //     }
    // }
    public function cart()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
    
        $userId = $this->session->userdata('user_id'); // Assuming 'user_id' is the session key for the user ID
    
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('cart', $data);
    }
    
    public function Ac($id)
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
    
        $userId = $this->session->userdata('user_id');
    
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $quantity = $this->io->post('quantity');
    
        $bind = [
            'user_id' => $userId,
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
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
    
        $userId = $this->session->userdata('user_id');
    
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $bind = [
            'user_id' => $userId,
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
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
    
        if (isset($id)) {
            $this->db->table('cart')->where("id", $id)->delete();
            redirect('cart');
        } else {
            $_SESSION['delete'] = "FAILED";
            redirect('modify');
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>