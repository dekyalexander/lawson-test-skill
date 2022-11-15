<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master_status_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("MasterStatus_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data Master Status";

        $title_name["title_name"] = "Administrator";
        
        $data["data_master_status"] = $this->MasterStatus_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/master-status/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $MasterStatus = $this->MasterStatus_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($MasterStatus->rules());
        if ($validation->run()) {
            $MasterStatus->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Master Status Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('master_status_controller');
        }

        $title["title"] = "Tambah Data Master Status";

        $title_name["title_name"] = "Administrator";

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/master-status/add', $title_name );
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
            Data Master Status Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('master_status_controller');
        }

        $title["title"] = "Edit Data Master Status";

        $title_name["title_name"] = "Administrator";


        $data["data_master_status"] = $MasterStatus->getById($id);
        

        if (!$data["data_master_status"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/master-status/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->MasterStatus_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Master Status Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}