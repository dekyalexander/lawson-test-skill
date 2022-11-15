<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OrderStatus_model extends CI_Model
{
    private $table = 'order_status';
       
    public function rules()
    {
        return [
            [
                'field' => 'status_id',  
                'label' => 'Status',  
                'rules' => 'trim|required'
            ]
        ];
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["order_id" => $id])->row();
        
    }

    public function getorderstatus(){
        $query = $this->db->get('master_status');
        return $query;  
    }

    
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->join('master_status','master_status.id = order_status.status_id','LEFT');
        $this->db->order_by('order_id', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }


    public function save()
    {   
        $data = array(
            "status_id" => $this->input->post('status_id'),
        );
        return $this->db->insert($this->table, $data);
    }

    
    public function update()
    {
        $data = array(
            "status_id" => $this->input->post('status_id'),
        );
        return $this->db->update($this->table, $data, array('order_id' => $this->input->post('order_id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("order_id" => $id));
    }
}