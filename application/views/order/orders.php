<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bell"></i> Order Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>order/addNew"><i class="fa fa-plus"></i> Add Order</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Order List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>order" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Order No/Amount"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>Id</th>
                      <th>Order Number</th>
                      <th>Customer Id / Name</th>
                      <th>Amount</th>
                      <th>Delivery Date</th>
                      <th>Order Status</th>
                      <th>Discount</th>
                      <th>Total cloths</th>
                      <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($orderRecords))
                    {
                        foreach($orderRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->id ?></td>
                      <td><?php echo $record->order_number ?></td>
                      <td><a href="">
                        <?php 
                            $CI =& get_instance();
                            $CI->load->model('order_model');
                            $result= $CI->order_model->getCustomerName($record->customer_id ); 
                            foreach ($result as $row)
                            {
                                    echo $record->customer_id.'/'.$row->customer_name;
                            }
                       ?></a>
                      <td><?php echo $record->total_ammount ?></td>
                      <td><?php echo $record->delivery_date ?></td>
                      <td><?php echo $record->order_status ?></td>
                      <td>
                          <?php 
                          if(strcasecmp($record->discount_coupon,"1")==0)
                          {
                              echo "10% - 20%";
                          }
                          else if(strcasecmp($record->discount_coupon,"2")==0)
                          {
                              echo "20% - 30%";
                          }
                          else if(strcasecmp($record->discount_coupon,"3")==0)
                          {
                              echo "30% - 40%";
                          }
                          else if(strcasecmp($record->discount_coupon,"4")==0)
                          {
                              echo "40% - 50%";
                          }
                          else if(strcasecmp($record->discount_coupon,"5")==0)
                          {
                              echo "50% - 60%";
                          }
                          else if(strcasecmp($record->discount_coupon,"6")==0)
                          {
                              echo "60% - 70%";
                          }
                          else if(strcasecmp($record->discount_coupon,"7")==0)
                          {
                              echo "70% - 80%";
                          }
                          else if(strcasecmp($record->discount_coupon,"8")==0)
                          {
                              echo "80% - 90%";
                          }
                          else if(strcasecmp($record->discount_coupon,"9")==0)
                          {
                              echo "90% - 100%";
                          }
                          ?>
                      </td>
                      <td><?php echo $record->total_cloths ?></td>
                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url().'editOld/'.$record->id; ?>"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->id; ?>"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix text-center">
                    <?php echo $this->pagination->create_links(); ?> 
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "order/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
