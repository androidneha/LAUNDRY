<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model
{
    
    function orderListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.order_number, BaseTbl.customer_id, BaseTbl.total_ammount
            , BaseTbl.delivery_date, BaseTbl.order_status, BaseTbl.discount_coupon,BaseTbl.total_cloths');
        $this->db->from('orders as BaseTbl');
        
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.order_number  LIKE '%".$searchText."%'
                            OR  BaseTbl.total_ammount  LIKE '%".$searchText."%'
                            OR  BaseTbl.order_status  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
       
        $query = $this->db->get();
        
        return count($query->result());
    }
    
    function orderListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.order_number, BaseTbl.customer_id, BaseTbl.total_ammount
            , BaseTbl.delivery_date, BaseTbl.order_status, BaseTbl.discount_coupon,BaseTbl.total_cloths');
        $this->db->from('orders as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.order_number  LIKE '%".$searchText."%'
                            OR  BaseTbl.total_ammount  LIKE '%".$searchText."%'
                            OR  BaseTbl.order_status  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);
        $query = $this->db->get();
        
        $result = $query->result();        
        return $result;
    }
    
    function getCustomerId()
    {
        $this->db->select('id,customer_name');
        $this->db->from('customer');
        $query = $this->db->get();
        
        return $query->result();
        //var_dump($query->result());
    }
    
     function getCustomerName($id)
    {
        $this->db->select('customer_name');
        $this->db->from('customer');
         $this->db->where('id', $id);
        $query =$this->db->get();
        
        return $query->result();
        //var_dump($query->result());
    }
    
    function getOrderStatus()
    {
        $this->db->select('id,status');
        $this->db->from('order_status');
        $query = $this->db->get();
        
        return $query->result();
        //var_dump($query->result());
    }
    
    function addNewOrder($orderInfo)
    {
        $this->db->trans_start();
        $this->db->insert('orders', $orderInfo);
        $insert_id = $this->db->insert_id();
        $this->db->trans_complete();
        
        return $insert_id;
    }
}