<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class MainController extends Controller
{

    public function index()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('homepage', $data);
    }

    public function checkout()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);

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

        $firstName = $this->io->post('firstName');
        $lastName = $this->io->post('lastName');
        $email = $this->io->post('email');
        $number = $this->io->post('number');
        $street = $this->io->post('street');
        $barangay = $this->io->post('barangay');
        $city = $this->io->post('city');
        $zip = $this->io->post('zip');

        // Validate and sanitize input data as needed

        // Save purchase details
        $purchaseData = [
            'user_id' => $userId,
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'number' => $number,
            'street' => $street,
            'barangay' => $barangay,
            'city' => $city,
            'zip' => $zip,
        ];

        // Use your model to insert purchase data into the database
        $purchaseId = $this->Shopmodel_model->insertPurchaseData($purchaseData);

        // Debugging: Output or log the purchase_id
        echo "Purchase ID: $purchaseId";

        // Retrieve cart data from the session
        $data['cart'] = $this->Shopmodel_model->getcart($userId);

        // Check if cart data is not empty
        if (!empty($data['cart'])) {
            // Iterate over each item in the cart
            foreach ($data['cart'] as $cartItem) {
                $itemTotal = $cartItem['prize'] * $cartItem['quantity'];
                $itemData = [
                    'Customer' => $firstName . ' ' . $lastName,
                    'CustomerId' => $userId,
                    'purchase_id' => $purchaseId,
                    'Item_name' => $cartItem['name'],
                    'Item_image' => $cartItem['image'],
                    'quantity' => $cartItem['quantity'],
                    'prize' => $cartItem['prize'],
                    'total_price' => $itemTotal,
                ];
                // Insert item data into the 'purchase_items' table
                $this->db->table('purchase_items')->insert($itemData);

                // Update product quantity in the 'prod' table

            }
            // Clear cart
            $this->Shopmodel_model->clearCart($userId);
        }

        // Redirect to checkout or another page
        redirect('thankyou');
    }

    public function thankyou()
    {
        $this->call->view('thankyou');
    }

    public function contact()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('contact', $data);
    }
    public function detail()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('detail', $data);
    }
    public function view($id)
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
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
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
            redirect('login');
        }
        $data['prod'] = $this->Shopmodel_model->getInfo();
        $userId = $this->session->userdata('user_id');

        $data['cart'] = $this->Shopmodel_model->getcart($userId);
        $data['cartItemCount'] = count($data['cart']);
        $this->call->view('shop', $data);
    }

    public function cart()
    {
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
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
        if (!$this->session->userdata('IsLoggedIn')) {
            redirect('login');
        }
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
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
        if (!$this->session->userdata('role') || $this->session->userdata('role') !== 'user') {
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

}
?>