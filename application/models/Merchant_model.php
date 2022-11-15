<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Merchant_model extends CI_Model
{
    private $table = 'merchant';
       
    public function rules()
    {
        return [
            [
                'field' => 'expired_date',  
                'label' => 'Date Expired',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'merchant_name',  
                'label' => 'Merchant Name',  
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
                'field' => 'city_id',  
                'label' => 'City',  
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getcity(){
        $query = $this->db->get('city');
        return $query;  
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["merchant_id" => $id])->row();
        
    }

    
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->join('city','city.city_id = merchant.city_id','LEFT');
        $this->db->order_by('merchant_id', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }


    public function save()
    {   
        $data = array(
            "expired_date" => $this->input->post('expired_date'),
            "merchant_name" => $this->input->post('merchant_name'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "city_id" => $this->input->post('city_id'),
        );
        return $this->db->insert($this->table, $data);
    }

    
    public function update()
    {
        $data = array(
            "expired_date" => $this->input->post('expired_date'),
            "merchant_name" => $this->input->post('merchant_name'),
            "address" => $this->input->post('address'),
            "phone" => $this->input->post('phone'),
            "city_id" => $this->input->post('city_id'),
        );
        return $this->db->update($this->table, $data, array('merchant_id' => $this->input->post('merchant_id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("merchant_id" => $id));
    }
}