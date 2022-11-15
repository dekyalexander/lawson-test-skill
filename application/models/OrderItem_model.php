<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderItem_model extends CI_Model
{
    private $table = 'order_items';
       
    public function rules()
    {
        return [
            [
                'field' => 'date',  
                'label' => 'Date',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'order_id',  
                'label' => 'Order Id',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'quantity',  
                'label' => 'Quantity',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'product_id',  
                'label' => 'Product ID',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'user_id',  
                'label' => 'User ID',  
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getorder(){
        $query = $this->db->get('order_status');
        return $query;  
    }


    public function getproduct(){
        $query = $this->db->get('products');
        return $query;  
    }

    public function getuser(){
        $query = $this->db->get('users');
        return $query;  
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["order_item_id" => $id])->row();
        
    }

    
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->join('products','products.product_id = order_items.product_id','LEFT');
        $this->db->join('users','users.id = order_items.user_id','LEFT');
        $this->db->join('order_status','order_status.order_id = order_items.order_id','LEFT');
        $this->db->order_by('order_item_id', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }


    public function save()
    {   
        $data = array(
            "date" => $this->input->post('date'),
            "order_id" => $this->input->post('order_id'),
            "quantity" => $this->input->post('quantity'),
            "product_id" => $this->input->post('product_id'),
            "user_id" => $this->input->post('user_id'),
        );
        return $this->db->insert($this->table, $data);
    }

    
    public function update()
    {
        $data = array(
            "date" => $this->input->post('date'),
            "order_id" => $this->input->post('order_id'),
            "quantity" => $this->input->post('quantity'),
            "product_id" => $this->input->post('product_id'),
            "user_id" => $this->input->post('user_id'),
        );
        return $this->db->update($this->table, $data, array('order_item_id' => $this->input->post('order_item_id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("order_item_id" => $id));
    }
}