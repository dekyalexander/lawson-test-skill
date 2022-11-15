<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users_model extends CI_Model
{
    private $table = 'users';
       
    public function rules()
    {
        return [
            [
                'field' => 'date_of_birth',  
                'label' => 'Date Of Birth',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'full_name',  
                'label' => 'Full Name',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'address',  
                'label' => 'Address',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'phone',  
                'label' => 'Phone',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',  
                'label' => 'Email',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'active',  
                'label' => 'Active',  
                'rules' => 'trim|required'
            ]
        ];
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        
    }

    
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by('id', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }


    public function save()
    {   
        $data = array(
            "date_of_birth" => $this->input->post('date_of_birth'),
            "full_name" => $this->input->post('full_name'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "email" => $this->input->post('email'),
            "active" => $this->input->post('active'),
        );
        return $this->db->insert($this->table, $data);
    }

    
    public function update()
    {
        $data = array(
            "date_of_birth" => $this->input->post('date_of_birth'),
            "full_name" => $this->input->post('full_name'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "email" => $this->input->post('email'),
            "active" => $this->input->post('active'),
        );
        return $this->db->update($this->table, $data, array('id' => $this->input->post('id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("id" => $id));
    }
}