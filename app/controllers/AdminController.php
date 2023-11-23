<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');

class AdminController extends Controller
{

    public function dashboard()
    {
        if (!$this->session->userdata('IsAdmin')) {
            redirect('login');
        }
        $this->call->view('admin/dashboard');
    }
    public function products()
    {
        $data['prod'] = $this->AdminModel_model->getInfo();
        $this->call->view('admin/products', $data);
    }
    public function add()
    {
        $name = $this->io->post('name');
        $description = $this->io->post('description');
        $category = $this->io->post('category');
        $quantity = $this->io->post('quantity');
        $prize = $this->io->post('prize');


        // File upload handling
        $uploadDir = 'uploads/';
        $uploadedFile = $_FILES['image']['tmp_name'];
        $imageFileName = uniqid('img_') . '_' . $_FILES['image']['name'];
        $targetFile = $uploadDir . $imageFileName;

        move_uploaded_file($uploadedFile, $targetFile);

        $bind = array(
            "name" => $name,
            "description" => $description,
            "category" => $category,
            "quantity" => $quantity,
            "prize" => $prize,
            "image" => $imageFileName  // Save the image file name in the database
        );

        $this->db->table('prod')->insert($bind);

        redirect('items');
    }
    public function addcat()
    {
        $newcat = $this->io->post('newcat');
        $ins = [
            'categories' => $newcat
        ];
        $this->db->table('cat')->insert($ins);
        redirect('items');
    }
    public function delcat($id)
    {
        if (isset($id)) {
            $this->db->table('cat')->where("id", $id)->delete();
            redirect('items');
        } else {
            $_SESSION['delete'] = "FAILED";
            redirect('items');
        }
    }

    public function items()
    {
        $data['cat'] = $this->AdminModel_model->getCat();
        $this->call->view('admin/items', $data);
    }

    public function modify()
    {
        $data['prod'] = $this->AdminModel_model->getInfo();
        $data['cat'] = $this->AdminModel_model->getCat();
        $this->call->view('admin/modify', $data);
    }
    public function delete($id)
    {
        if (isset($id)) {
            $this->db->table('prod')->where("id", $id)->delete();
            redirect('modify');
        } else {
            $_SESSION['delete'] = "FAILED";
            redirect('modify');
        }
    }
    public function edit($id)
    {
        $data['prod'] = $this->AdminModel_model->getInfo();
        $data['cat'] = $this->AdminModel_model->getCat();
        $data['edit'] = $this->AdminModel_model->searchInfo($id);
        $this->call->view('admin/modify', $data);
    }

    public function submitedit($id)
    {
        if (isset($id)) {
            $name = $this->io->post('name');
            $description = $this->io->post('description');
            $category = $this->io->post('category');
            $quantity = $this->io->post('quantity');
            $prize = $this->io->post('prize');
            // Check if a new image is uploaded
            if ($_FILES['image']['size'] > 0) {
                // File upload handling
                $uploadDir = 'uploads/';
                $uploadedFile = $_FILES['image']['tmp_name'];
                $imageFileName = uniqid('img_') . '_' . $_FILES['image']['name'];
                $targetFile = $uploadDir . $imageFileName;
                move_uploaded_file($uploadedFile, $targetFile);
                // Update the image field in the database
                $data['image'] = $imageFileName;
            }
            $data = [
                "name" => $name,
                "description" => $description,
                "category" => $category,
                "quantity" => $quantity,
                "prize" => $prize,
                "image" => $imageFileName,
            ];
            // Update the product data in the database
            $this->db->table('prod')->where("id", $id)->update($data);
            redirect('modify');
        }
    }
}
?>