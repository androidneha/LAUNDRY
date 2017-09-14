<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bell"></i> Order Management
        <small>Add / Edit Order</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Order Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addOrder" action="<?php echo base_url() ?>order/addNewOrder" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="orderNumber">Order Number</label>
                                        <input type="text" class="form-control required" id="orderNumber" name="orderNumber" maxlength="128">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                         <label for="custId">Choose Customer</label>
                                        <select class="form-control required" id="custId" name="custId">
                                            <option value="0">Select Customer</option>
                                            <?php
                                            if(!empty($cust))
                                            {
                                                foreach ($cust as $cId)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cId->id ?>"><?php echo $cId->customer_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="ammount">Amount</label>
                                        <input type="text" class="form-control required" id="ammount"  name="ammount" maxlength="10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="deliveryDate">Delivery Date</label>
                                        <input type="text" class="form-control required" id="deliveryDate" name="deliveryDate">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="orderStatus">order Status</label>
                                        <select class="form-control required" id="orderStatus" name="orderStatus">
                                            <option value="0">Choose Status</option>
                                            <?php
                                            if(!empty($status))
                                            {
                                                foreach ($status as $cId)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cId->status ?>"><?php echo $cId->status ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label for="role">Discount</label>
                                        <select class="form-control required" id="discount" name="discount">
                                            <option value="0">Select Discount(in %)</option>
                                           <option value="1">10%-20%</option>
                                           <option value="2">20%-30%</option>
                                           <option value="3">30%-40%</option>
                                           <option value="4">40%-50%</option>
                                           <option value="5">50%-60%</option>
                                           <option value="6">60%-70%</option>
                                           <option value="7">70%-80%</option>
                                           <option value="8">80%-90%</option>
                                           <option value="9">90%-100%</option>
                                        </select>
                                    </div>
                                </div>    
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="totalCloths">Total Cloths</label>
                                        <input type="text" class="form-control required digits" id="totalCloths" name="totalCloths">
                                    </div>
                                </div>
                             </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    
</div>
 <script src="<?php echo base_url(); ?>assets/js/jQuery-ui.js"></script>
 <script type="text/javascript">
    $(function() {
        $("#deliveryDate").datepicker(
                {
                   dateFormat: "yy-mm-dd"
                });
    });
</script>
<script src="<?php echo base_url(); ?>assets/js/addOrder.js" type="text/javascript"></script>