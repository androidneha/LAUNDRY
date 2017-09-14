<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Order (OrderController)
 * Order Class to control all user related operations.
 * @author : Neha
 * @version : 1.1
 * @since : 15 November 2016
 */
class Order extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('order_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Order';
        
        $this->load->model('order_model');
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
            $count = $this->order_model->orderListingCount($searchText);
            $returns = $this->paginationCompress ( "order/orderListing/", $count, 3 );
            $data['orderRecords'] = $this->order_model->orderListing($searchText, $returns["page"], $returns["segment"]);
            $this->global['pageTitle'] = 'Order';
            $this->loadViews("order/orders", $this->global, $data, NULL);
        }
        
    }
    
    function orderListing()
    {
       
       $this->global['pageTitle'] = 'Order';
       
        $this->load->model('order_model');
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
            $count = $this->order_model->orderListingCount($searchText);
            $returns = $this->paginationCompress ( "order/orderListing/", $count, 3 );
            $data['orderRecords'] = $this->order_model->orderListing($searchText, $returns["page"], $returns["segment"]);
          
            $this->loadViews("order/orders", $this->global, $data, NULL);
        }
    }
    
     /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            
            $this->load->model('order_model');
            $data['cust'] = $this->order_model->getCustomerId();
           
             $data['status'] = $this->order_model->getOrderStatus();
          
            $this->global['pageTitle'] = 'Add Order';
            $this->loadViews("order/addNew", $this->global,$data, NULL);
        }
    }
      
    function addNewOrder()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');
            
            $this->form_validation->set_rules('orderNumber','Order Number','trim|required|max_length[128]|numeric');
            $this->form_validation->set_rules('custId','Customer Name','trim|required|numeric|xss_clean');
             $this->form_validation->set_rules('deliveryDate','Delivery Date','trim|required');
            $this->form_validation->set_rules('ammount','Ammount','required|max_length[20]|numeric');
            $this->form_validation->set_rules('orderStatus','Order Status','trim|required|max_length[20]|xss_clean');
            $this->form_validation->set_rules('discount','Discount','trim|required|numeric|xss_clean');
            $this->form_validation->set_rules('totalCloths','Total Cloths','required|trim|numeric');
            
            if($this->form_validation->run() == FALSE)
            {
                $this->addNew();
            }
            else
            {
                $orderNumber = $this->input->post('orderNumber');
                $custId = $this->input->post('custId');
                $deliveryDate = $this->input->post('deliveryDate');
                $ammount = $this->input->post('ammount');
                $orderStatus = $this->input->post('orderStatus');
                $discount = $this->input->post('discount');
                $totalCloths = $this->input->post('totalCloths');
                
                $orderInfo = array('order_number'=>$orderNumber, 'customer_id'=>$custId, 'total_ammount'=>$ammount, 'delivery_date'=> $deliveryDate,
                                    'order_status'=>$orderStatus, 'discount_coupon'=>$discount,'total_cloths'=>$totalCloths, 'createdDtm'=>date('Y-m-d H:i:s'));
                
                $this->load->model('order_model');
                $result = $this->order_model->addNewOrder($orderInfo);
                
                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'New Order added successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Order addition failed');
                }
                
                redirect('order/addNew');
            }
        }
    }
}
?>