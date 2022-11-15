<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $table = 'products';
       
    public function rules()
    {
        return [
            [
                'field' => 'name',  
                'label' => 'Name',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'merchant_id',  
                'label' => 'Merchant Id',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'price',  
                'label' => 'Price',  
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getmerchant(){
        $query = $this->db->get('merchant');
        return $query;  
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["product_id" => $id])->row();
        
    }

    
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->join('merchant','merchant.merchant_id = products.merchant_id','LEFT');
        $this->db->order_by('product_id', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }


    public function save()
    {   
        $data = array(
            "name" => $this->input->post('name'),
            "merchant_id" => $this->input->post('merchant_id'),
            "price" => $this->input->post('price'),
        );
        return $this->db->insert($this->table, $data);
    }

    
    public function update()
    {
        $data = array(
            "name" => $this->input->post('name'),
            "merchant_id" => $this->input->post('merchant_id'),
            "price" => $this->input->post('price'),
        );
        return $this->db->update($this->table, $data, array('product_id' => $this->input->post('product_id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("product_id" => $id));
    }
}