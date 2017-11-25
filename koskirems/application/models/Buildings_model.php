<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @author Larry Mutuku
 * @copyright Quadrant 2016
 */
 
 class Buildings_model extends CI_Model
 {
    var $table = 'tbl_buildings';
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create()
    {
        if(count($_POST) == 0) {
            return false;
        }
        
        $data = array(
                    'building_name' => $this->input->post('building_name'),
                    'building_location' => $this->input->post('location'),
                    'building_description' => $this->input->post('desc'));
        return $this->db->insert($this->table, $data);
    }
    
    public function create_room()
    {
        if(count($_POST) == 0) {
            return false;
        }
        
        $data = array(
                    'room_no' => $this->input->post('room_no'),
                    'room_buildingid' => $this->input->post('hse'),
                    'room_rentrate' => $this->input->post('amt'),
                    'room_type' => $this->input->post('type'));
        return $this->db->insert('tbl_rooms', $data);
    }
    public function create_tenant()
    {
        if(count($_POST) == 0) {
            return false;
        }
        
        $data = array(
                    'tenant_fullname' => $this->input->post('tent_name'),
                    'tenant_roomid' => $this->input->post('tent_id'),
                    'tenant_phone' => $this->input->post('tent_phone'),
                    'tenant_roomno' => $this->input->post('room_no'));
        return $this->db->insert('tbl_tenants', $data);
    }
    public function create_workorder()
    {
        if(count($_POST) == 0) {
            return false;
        }
        
        $data = array(
                    'workorder_buildingid' => $this->input->post('building_id'),
                    'workorder_description' => $this->input->post('desc'),
                    'workorder_createdate' => $this->input->post('date'));
        return $this->db->insert('tbl_tenants', $data);
    }
    //vacate or take room
    public function change_roomstatus($room_id, $status)
    {
        //$this->db->where(array('room_id' => $room_id));
        return $this->db->update('tbl_rooms',array('room_status' => $status), array('room_id' => $room_id));
    }
    
    public function vacate()
    {
        if(count($_POST) == 0) {
            return false;
        }
        
        $room_id = $this->input->post('room_id');
        $tenant = $this->input->post('tenant');
        
        if($this->change_roomstatus($room_id, 0)) {
            $this->load->model('tenants_model');
            $this->tenants_model->change_status($tenant, 0);
            return $this->db->update('tbl_roomtenants', array('roomtenants_active' => 0), array('roomtenants_roomid' => $room_id));
        } else {
            return false;
        }
    }
    
    public function set()
    {
        if(count($_POST) == 0) {
            return false;
        }
        
        $charges = $this->input->post('charges');
        foreach($charges as $charge) {
            $this->db->insert('tbl_buildingsettings' , array('hs_chargeid' => $charge, 'hs_buildingid' => $this->input->post('hse')));
        }
        
        return true;
    }
   public function delete($id)
    {
        return $this->db->query("delete from tbl_rooms where room_id='$id'");
    }
   public function delete_building($id)
    {
        return $this->db->query("delete from tbl_buildings where building_id='$id'");
    }
    function update() 
        {   
            if(count($_POST) == 0) {
            return false;
        } 
                 $data = array(       
                     'building_name' => $this->input->post('name'),
                     'building_description' => $this->input->post('description'),
                     'building_location' => $this->input->post('location'));
       return $this->db->update('tbl_buildings', $data, array('building_id' => $_POST['id']));                                        

    }
    public function get_data($id){
          $query = $this->db->query("SELECT * from tbl_buildings where building_id = '$id'");
           if($query -> num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }    
        
        
        }
   function update_room() 
        {   
            if(count($_POST) == 0) {
            return false;
        } 
                $data = array(
                    'room_no' => $this->input->post('room_no'),
                    'room_rentrate' => $this->input->post('amt'),
                    'room_type' => $this->input->post('type'));
       return $this->db->update('tbl_rooms', $data, array('room_id' => $_POST['id']));                                        

    }
    public function get_room_data($id){
          $query = $this->db->query("SELECT * from tbl_rooms where room_id = '$id'");
           if($query -> num_rows() > 0)
   {
     return $query->result();
   }
   else
   {
     return false;
   }    
        
        
        }
 }