<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_status_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("OrderStatus_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data Order Status";

        $title_name["title_name"] = "Administrator";
        
        $data["data_order_status"] = $this->OrderStatus_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/order-status/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $OrderStatus = $this->OrderStatus_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($OrderStatus->rules());
        if ($validation->run()) {
            $OrderStatus->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Order Status Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('order_status_controller');
        }

        $title["title"] = "Tambah Data Master Status";

        $title_name["title_name"] = "Administrator";

        // Status

        $data['status'] = $this->OrderStatus_model->getorderstatus()->result();

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title);
        $this->template->load('templates/sidebar','templates/admin/order-status/add', $data );
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('master_status');

        $MasterStatus = $this->MasterStatus_model;
        $validation = $this->form_validation;
        $validation->set_rules($MasterStatus->rules());

        if ($validation->run()) {
            $MasterStatus->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Order Status Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('order_status_controller');
        }

        $title["title"] = "Edit Data Order Status";

        $title_name["title_name"] = "Administrator";

         // Status

         $data['status'] = $this->OrderStatus_model->getorderstatus()->result();


        $data["data_order_status"] = $MasterStatus->getById($id);
        

        if (!$data["data_order_status"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/order-status/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('order_id');
        if (!isset($id)) show_404();
        $this->OrderStatus_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Order Status Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}