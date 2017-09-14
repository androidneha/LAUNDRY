<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Customer extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
       
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->model('customer_model');
         $this->isLoggedIn(); 
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Customer';
        
        $this->load->model('customer_model');
        $this->isLoggedIn(); 
        
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;
            $this->load->library('pagination');
            $count = $this->customer_model->orderListingCount($searchText);
            $returns = $this->paginationCompress ( "orderListing/", $count, 5 );
            $data['orderRecords'] = $this->customer_model->orderListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Order';
            $this->loadViews("order/orders", $this->global, $data, NULL);
        }
        
    }
    
     /**
     * This function is used to load the add new form
     */
    function addNew()
    {
      
    }
       
}

?>