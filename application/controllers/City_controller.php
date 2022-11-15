<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("City_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data City";

        $title_name["title_name"] = "Administrator";
        
        $data["data_city"] = $this->City_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/city/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $City = $this->City_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($City->rules());
        if ($validation->run()) {
            $City->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data City Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('city_controller');
        }

        $title["title"] = "Tambah Data City";

        $title_name["title_name"] = "Administrator";

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/city/add', $title_name );
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('city');

        $City = $this->City_model;
        $validation = $this->form_validation;
        $validation->set_rules($City->rules());

        if ($validation->run()) {
            $City->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data City Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('city_controller');
        }

        $title["title"] = "Edit Data Master Status";

        $title_name["title_name"] = "Administrator";


        $data["data_city"] = $City->getById($id);
        

        if (!$data["data_city"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/city/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('city_id');
        if (!isset($id)) show_404();
        $this->City_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data City Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}