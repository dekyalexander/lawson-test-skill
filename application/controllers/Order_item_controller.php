<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_item_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("OrderItem_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data Order Item";

        $title_name["title_name"] = "Administrator";
        
        $data["data_order_item"] = $this->OrderItem_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/order-item/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $OrderItem = $this->OrderItem_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($OrderItem->rules());
        if ($validation->run()) {
            $OrderItem->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data OrderItem Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('order_item_controller');
        }

        $title["title"] = "Tambah Data Order Item";

        $data["title_name"] = "Administrator";


        // Order

        $data['order'] = $this->OrderItem_model->getorder()->result();


        // Product

        $data['product'] = $this->OrderItem_model->getproduct()->result();

        // User

        $data['user'] = $this->OrderItem_model->getuser()->result();

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $data);
        $this->template->load('templates/sidebar','templates/admin/order-item/add', $data );
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('order_items');

        $OrderItem = $this->OrderItem_model;
        $validation = $this->form_validation;
        $validation->set_rules($OrderItem->rules());

        if ($validation->run()) {
            $OrderItem->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data OrderItem Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('order_item_controller');
        }

        $title["title"] = "Edit Data Product";

        $title_name["title_name"] = "Administrator";


        $data["data_order_item"] = $OrderItem->getById($id);
        
        // Order

        $data['order'] = $this->OrderItem_model->getorder()->result();


        // Product

        $data['product'] = $this->OrderItem_model->getproduct()->result();

        // User

        $data['user'] = $this->OrderItem_model->getuser()->result();

        if (!$data["data_order_item"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $data);
        $this->template->load('templates/sidebar','templates/admin/order-item/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('order_item_id');
        if (!isset($id)) show_404();
        $this->OrderItem_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Order Item Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}