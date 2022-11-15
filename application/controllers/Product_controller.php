<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Product_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data Product";

        $title_name["title_name"] = "Administrator";
        
        $data["data_product"] = $this->Product_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/product/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $Product = $this->Product_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($Product->rules());
        if ($validation->run()) {
            $Product->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Product Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('product_controller');
        }

        $title["title"] = "Tambah Data Product";

        $data["title_name"] = "Administrator";


        // Merchant

        $data['merchant'] = $this->Product_model->getmerchant()->result();

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $data);
        $this->template->load('templates/sidebar','templates/admin/product/add', $data );
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('products');

        $Product = $this->Product_model;
        $validation = $this->form_validation;
        $validation->set_rules($Product->rules());

        if ($validation->run()) {
            $Product->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Product Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('product_controller');
        }

        $title["title"] = "Edit Data Product";

        $title_name["title_name"] = "Administrator";


        $data["data_product"] = $Product->getById($id);
        
        // Merchant

        $data['merchant'] = $this->Product_model->getmerchant()->result();

        if (!$data["data_product"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $data);
        $this->template->load('templates/sidebar','templates/admin/product/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('product_id');
        if (!isset($id)) show_404();
        $this->Product_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Product Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}