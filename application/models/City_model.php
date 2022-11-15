<?php
defined('BASEPATH') or exit('No direct script access allowed');

class City_model extends CI_Model
{
    private $table = 'city';
       
    public function rules()
    {
        return [
            [
                'field' => 'name',  
                'label' => 'Name',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'longitude',  
                'label' => 'Longitude',  
                'rules' => 'trim|required'
            ],
            [
                'field' => 'latitude',  
                'label' => 'Latitude',  
                'rules' => 'trim|required'
            ]
        ];
    }

    
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["city_id" => $id])->row();
        
    }

    
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by('city_id', 'desc');
        $query = $this->db->get();
        return $query->result();
        
    }


    public function save()
    {   
        $data = array(
            "name" => $this->input->post('name'),
            "longitude" => $this->input->post('longitude'),
            "latitude" => $this->input->post('latitude'),
        );
        return $this->db->insert($this->table, $data);
    }

    
    public function update()
    {
        $data = array(
            "name" => $this->input->post('name'),
            "longitude" => $this->input->post('longitude'),
            "latitude" => $this->input->post('latitude'),
        );
        return $this->db->update($this->table, $data, array('city_id' => $this->input->post('city_id')));
    }

    public function delete($id)
    {
        return $this->db->delete($this->table, array("city_id" => $id));
    }
}