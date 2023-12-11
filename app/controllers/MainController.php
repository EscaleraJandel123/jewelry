<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class MainController extends Controller
{

    public function index()
    {
        // if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
        //     redirect('login');
        // }

        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('homepage', $data);
    }

    public function checkout()
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $data['users'] = $this->User_model->getUserById($userId);

        $this->call->view('checkout', $data);
    }
    public function purchase()
    {
        // Check if the user is logged in
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }

        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }

        // Get user information from the form
        $userId = $this->session->userdata('user_id');
        $fullname = $this->io->post('fullname');
        $email = $this->io->post('email');
        $number = $this->io->post('number');
        $compAdd = $this->io->post('compAdd');
        $payment = isset($_POST['payment']) ? $this->io->post('payment') : '';

        // Save purchase details
        $purchaseData = [
            'user_id' => $userId,
            'fullname' => $fullname,
            'email' => $email,
            'number' => $number,
            'payment' => $payment,
            'compAdd' => $compAdd,

        ];

        // model to insert purchase data into the database
        $purchaseId = $this->Shopmodel_model->insertPurchaseData($purchaseData);
        echo "Purchase ID: $purchaseId";

        // Retrieve cart data from the session
        $data['cart'] = $this->Shopmodel_model->getcart($userId);

        if (!empty($data['cart'])) {
            foreach ($data['cart'] as $cartItem) {
                $itemTotal = $cartItem['prize'] * $cartItem['quantity'];
                $itemData = [
                    'Customer' => $fullname,
                    'CustomerId' => $userId,
                    'purchase_id' => $purchaseId,
                    'prod_id' => $cartItem['prod_id'],
                    'Item_name' => $cartItem['name'],
                    'Item_image' => $cartItem['image'],
                    'quantity' => $cartItem['quantity'],
                    'prize' => $cartItem['prize'],
                    'total_price' => $itemTotal,
                ];
                // Insert item data into the 'purchase_items' table
                $this->db->table('purchase_items')->insert($itemData);
            }

            // Update product quantities
            $this->Shopmodel_model->updateProductQuantity($purchaseId);

            // Clear cart
            $this->Shopmodel_model->clearCart($userId);
        }

        redirect('thankyou');
    }

    public function thankyou()
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $this->call->view('thankyou');
    }

    public function contact()
    {
        // if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
        //     redirect('login');
        // }
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('contact', $data);
    }
    public function detail()
    {
        // if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
        //     redirect('login');
        // }
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('detail', $data);
    }
    public function view($id)
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('viewdetails', $data);
    }
    public function shop()
    {
        // if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
        //     redirect('login');
        // }
        $data['prod'] = $this->Shopmodel_model->getInfo();
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('shop', $data);
    }
    
    public function search()
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }

        $searchTerm = $this->io->get('search'); // Get the search term from the query string
        $data['prod'] = $this->Shopmodel_model->searchInfo($searchTerm);

        $userId = $this->session->userdata('user_id');
        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);

        $this->call->view('shop', $data);
    }


    public function cart()
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }

        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('cart', $data);
    }

    public function Ac($id)
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }

        $userId = $this->session->userdata('user_id');

        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $quantity = $this->io->post('quantity');

        $bind = [
            'user_id' => $userId,
            'prod_id' => $id, // Add the prod_id to the cart item
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
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }

        $userId = $this->session->userdata('user_id');

        $data['prod'] = $this->Shopmodel_model->getInfoById($id);
        $bind = [
            'user_id' => $userId,
            'prod_id' => $id, // Add the prod_id to the cart item
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
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
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

    public function profile()
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        
        $userId = $this->session->userdata('user_id');
        $data['cart'] = $this->User_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        
        $data['purchase_items'] = $this->Shopmodel_model->getorder($userId);
        $data['users'] = $this->User_model->getUserById($userId);
        $this->call->view('profile',$data);
    }
    
    public function profUp()
    {
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id');
        $data['users'] = $this->User_model->getUserById($userId);
            $fullname = $this->io->post('fullname');
            $number = $this->io->post('number');
            $compAdd = $this->io->post('compAdd');
            $data = [
                "fullname" => $fullname,
                "number" => $number,
                "compAdd" => $compAdd,        
            ];
            // Update the product data in the database
            $this->db->table('users')->where("id", $userId)->update($data);
            redirect('profile');
    }
}
?>