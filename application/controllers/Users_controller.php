<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Users_model");
    }

    
    public function index()
    {

        $title["title"] = "List Data Users";

        $title_name["title_name"] = "Administrator";
        
        $data["data_users"] = $this->Users_model->getAll();
        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/users/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $Users = $this->Users_model; 
        $validation = $this->form_validation; 
        $validation->set_rules($Users->rules());
        if ($validation->run()) {
            $Users->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Master Users Berhasil Disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('users_controller');
        }

        $title["title"] = "Tambah Data Users";

        $title_name["title_name"] = "Administrator";

        
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/users/add', $title_name );
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('users');

        $Users = $this->Users_model;
        $validation = $this->form_validation;
        $validation->set_rules($Users->rules());

        if ($validation->run()) {
            $Users->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Users Berhasil Diupdate.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect('users_controller');
        }

        $title["title"] = "Edit Data Users";

        $title_name["title_name"] = "Administrator";


        $data["data_users"] = $Users->getById($id);
        

        if (!$data["data_users"]) show_404();
        $this->load->view('templates/header', $title);
        $this->load->view('templates/menu', $title_name);
        $this->template->load('templates/sidebar','templates/admin/users/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Users_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Users Berhasil Dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
}