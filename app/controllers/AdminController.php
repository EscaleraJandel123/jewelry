<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AdminController extends Controller {
	public function dashboard() {
        $this->call->view('admin/dashboard');
    }
    public function products() {
        $this->call->model('AdminModel_model');
        $data['prod'] = $this->AdminModel_model->getInfo();
        $this->call->view('admin/products',$data);
    }
    public function add(){
        $name = $this->io->post('name');
        $description = $this->io->post('description');
        $category = $this->io->post('category');
        $quantity = $this->io->post('quantity');
        $prize = $this->io->post('prize');
        // $image = $this->io->post('image');
        $bind = array(
            "name" => $name,
            "description" => $description,
            "category" => $category,
            "quantity" => $quantity,
            "prize" => $prize,
            // "image" => $image
            
        );
        $this->db->table('prod')->insert($bind);
        
        redirect('/items');
    }

    public function items() {
        $this->call->model('AdminModel_model');
        $data['cat'] = $this->AdminModel_model->getCat();
        $this->call->view('admin/items',$data);
    }
    
    public function modify() {
        $this->call->model('AdminModel_model');
        $data['prod'] = $this->AdminModel_model->getInfo();
        $this->call->view('admin/modify', $data);
    }
    public function delete($id)
    {
        if(isset($id)){
            $this->db->table('prod')->where("id", $id)->delete();
            redirect('/modify');
        }
        else{
            $_SESSION['delete'] = "FAILED";
            redirect('/modify');
        }
    }
}
?>
