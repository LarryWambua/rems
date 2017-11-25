<?php

/**
 * @author Larry Mutuku
 * @copyright Koski 2016
 * @description Core app functions 
 */

function get_name($uid) {
    $CI =& get_instance();
    $query = $CI->db->get_where('tbl_users', array('user_id' => $uid));
    if($query->num_rows()==0) {
        return "";
    } 
    $result = $query->row();
    return $result->user_fullname;
}

function get_data($table, $where = "")
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT * FROM $table $where");
    if($query->num_rows() == 0) {
        return array();
    }
    
    return $query->result_array();
}
function get_tenant_data($room)
{ 
 $CI =& get_instance();
    $query = $CI->db->query("SELECT a.*, b.* FROM tbl_tenants b JOIN tbl_rooms a ON a.room_id = b.tenantid WHERE roomtenants_tenantid = '".$room."' AND b.roomtenants_active = 1");
    if($query->num_rows() == 0) {
        return array();
    }
    
    return $query->result_array();
}
function get_building_tenant($hid)
{ 
 $CI =& get_instance();
    $query = $CI->db->query("SELECT a.*, b.*, c.* FROM tbl_rooms a
    INNER JOIN tbl_roomtenants b ON a.room_id=b.roomtenants_roomid
    INNER JOIN tbl_tenants c ON b.roomtenants_tenantid=c.tenant_id
    WHERE a.room_buildingid='".$hid."'");
    if($query->num_rows() == 0) {
        return array();
    }
    
    return $query->result_array();
}
function get_buildingname($hid)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tbl_buildings', array('building_id' => $hid));
    if($query->num_rows() == 0) {
        return "Not defined";
    }
    $result = $query->row();
    return $result->building_name;
}

function get_tenantname($tid)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tbl_tenants', array('tenant_roomid' => $tid));
    if($query->num_rows() == 0) {
        return "Not defined";
    }
    $result = $query->row();
    return $result->tenant_fullname;
}
function get_rent($id)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tbl_rent', array('rent_roomid' => $id));
    if($query->num_rows() == 0) {
        return "Not defined";
    }
    $result = $query->row();
    return $result->rent_amount;
}

function get_tenantdetails($tid)
{
    $CI =& get_instance();
    $query = $CI->db->query("SELECT a.*, b.roomtenants_createdate AS d FROM tbl_roomtenants b JOIN tbl_rooms a ON a.room_id = b.roomtenants_roomid WHERE roomtenants_tenantid = '".$tid."' AND b.roomtenants_active = 1");
    if($query->num_rows()==0) {
        return array();
    } else {
        return $query->result_array();
    }
}

function get_roomoptions($hse_id)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tbl_rooms', array('room_buildingid' => $hse_id, 'room_status' => 0));
    if($query->num_rows()==0) {
        return "<option value=''>This building has no vacancies</option>";
    }
    
    $res = $query->result();
    $opts = "";
    foreach($res as $value){
        $room_no = $value->room_no;
        $room_id = $value->room_id;
        $opts .= "<option value='$room_id'>$room_no</option>";
    }
    
    return $opts;
}

function get_frequency($int)
{
    switch ($int) {
        case 0 :
            return "One Time";
            break;
        case 1 :
            return "Daily";
            break;
        case 2 :
            return "Weekly";
            break;
        case 3 :
            return "Monthly";
            break;
        case 4 :
            return "Yearly";
            break;
    }
}

function get_roomno($id)
{
    $CI =& get_instance();
    $query = $CI->db->get_where('tbl_rooms', array('room_id' => $id));
    if($query->num_rows()==0) {
        return "Not defined";
    }
    
    $res = $query->row();
    return $res->room_no;
}


function get_columndata($table, $column, $value, $where)
{
    $CI =& get_instance();
    $query = $CI->db->get_where($table, array($column => $where));
    if($query->num_rows()==0) {
        return "Not defined";
    }
    
    $result = $query->row();
    return $result->$value;
}

function get_roomcharges($room_id, $frequency, $when = "")
{
    $CI =& get_instance();
    $hse = get_columndata('tbl_rooms', 'room_id', 'room_buildingid', $room_id);
    if($when == "") {
        $query = $CI->db->query("SELECT SUM(charge_amt) AS total FROM tbl_charges JOIN tbl_buildingsettings ON hs_chargeid = charge_id  WHERE hs_buildingid = $hse AND charge_chargetypeid = $frequency");
    } else {
        $query = $CI->db->query("SELECT SUM(charge_amt) AS total FROM tbl_charges JOIN tbl_buildingsettings ON hs_chargeid = charge_id  WHERE hs_buildingid = $hse AND charge_chargetypeid = $frequency AND when_to_pay = $when");
    }
    if($query->num_rows()==0) {
        return 0;
    }
    $result = $query->row();
    return $result->total;
}

function get_tenantroom($id)
{
    $CI =& get_instance();
    $room = get_columndata('tbl_roomtenants', 'roomtenants_tenantid', 'roomtenants_roomid', $id);
    $details = get_data('tbl_rooms', 'WHERE room_id = '.$room);
    //$details=get_tenant_data($room);
    $dets=
    $res = "";
    foreach($details as $detail) {
        $roomid = $detail['room_id'];
        $roomname = $detail['room_no'];
        $amt = $detail['room_rentrate'];
        //$id = $detail['tenant_nationalid'];  
        $res .= "<label>Room No: </label> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  ";
        $res .= "<input type='text' name='roomname' value='$roomname' disabled /> <br/>";
        //$res .= "<label>Tenant ID: </label> &nbsp &nbsp &nbsp ";
        //$res .= "<input type='text' name='id' value='$id' />";
        $res .= "<label>Amount Paid: </label> &nbsp &nbsp &nbsp ";
        $res .= "<input type='text' name='amt' value='$amt' />";
        $res .= "<input type='hidden' name='roomid' value='$roomid' />";
    }
    return $res;
}
?>