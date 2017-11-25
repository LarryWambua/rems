<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


/**
 * @author Larry Wambua
 * @copyright Koski 2016
 */
 
class Buildings extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('buildings_model');
    }
    
    public function index()
    {
        $this->load->view('buildings');
    }
    
    public function buildings_action()
    {
        $this->load->view('buildings_action');
    }
    public function create()
    {
        if($this->buildings_model->create()) {
            $data['response'] = 1;
            
        } else {
            $data['response'] = 0;
        }
        
        $this->load->view('buildings', $data);
    }
    public function buildings_room()
    {
        $this->load->view('buildings_room');
    }
    public function rooms($id)
    {
        $data['hse'] = $id;
        $this->load->view('rooms', $data);
    }
  public function tenants($id)
    {
        $data['hse'] = $id;
        $this->load->view('tenants_building', $data);
    }
    
    public function create_room($id)
    {
        $data['hse'] = $id;
        if($this->buildings_model->create_room()) {
            $data['response'] = 1;
            
        } else {
            $data['response'] = 0;
        }
        
        $this->load->view('rooms', $data);
    }
    
    public function give_room($id)
    {
        $this->load->model('tenants_model');
        $data['hse'] = $id;
        if($this->tenants_model->assign()) {
            $data['response'] = 1;
            
        } else {
            $data['response'] = 0;
        }
        
        $this->load->view('rooms', $data);
    }
    
    public function load_form($id, $room)
    {
        $data['hse'] = $id;
        $data['room'] = $room;
        $this->load->view('give_room', $data);
    }
    
    public function vacate()
    {
        if($this->buildings_model->vacate()) {
            echo "Room vacated successfuly";
        } else {
            echo "A problem occured while trying to vacate room. Please try again";
        }
    }
    
    public function settings()
    {
        $this->load->view('month');
    }
    
    public function set_settings()
    {
        if($this->buildings_model->set()) {
            $data['response'] = 1;
            
        } else {
            $data['response'] = 0;
        }
        
        $this->load->view('settings', $data);
    }public function delete($id)
    {  $this->buildings_model->delete($id); 
       //$data['response'] ="Record Deleted Successfully";
       $this->load->view('buildings');
    }
  public function delete_building($id)
    {  $this->buildings_model->delete_building($id); 
       //$data['response'] ="Record Deleted Successfully";
       $this->load->view('buildings');
    }
    public function edit()
    {
        if($this->buildings_model->update()) {
            $data['response'] = 1;
            
        } else {
            $data['response'] = 0;
        }
        
        $this->load->view('buildings', $data);
    }
    public function update($id)
    { 
       $mem_arry=$this->buildings_model->get_data($id);
            foreach ($mem_arry as $value) {
              $data['id'] = $value->building_id;
              $data['name'] = $value->building_name;
              $data['location'] = $value->building_location;
              $data['description'] = $value->building_description;             	
            	 
              $this->load->view('buildings', $data);
             }    
      
    }
   public function edit_room()
    {
        if($this->buildings_model->update_room()) {
            $data['response'] = 1;
            
        } else {
            $data['response'] = 0;
        }
        
        $this->load->view('buildings', $data);
    }
    public function update_room($id,$hid)
    { 
       $mem_arry=$this->buildings_model->get_room_data($id);
            foreach ($mem_arry as $value) {
              $data['id'] = $value->room_id;
              $data['room_no'] = $value->room_no;
              $data['amt'] = $value->room_rentrate;
              $data['type'] = $value->room_type;
               $data['hse'] = $hid;
            	 
              $this->load->view('rooms', $data);
             }    
      
    }
}