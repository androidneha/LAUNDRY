<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    function getCustomerId()
    {
        $query = $this->db->get('id','customer_name');
        $result = $query->result();

        $cat_id = array('-CHOOSE-');
        $cat_name = array('-CHOOSE-');
        
        for ($i = 0; $i < count($result); $i++)
        {
            array_push($cat_id, $result[$i]->id);
            array_push($cat_name, $result[$i]->customer_name);
        }
        return array_combine($cat_id, $cat_name);
    }
    
    
}
?>

