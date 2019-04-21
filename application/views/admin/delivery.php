<?php $this->load->view('admin/layout/header');?>
<div class="container-fluid" style="margin-top:8px;">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Delivery</h4><hr>
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a><span>Here you can add cargo to be issued to a warehouse, view the delivery status of the cargo and know whether cargo has been delivered successfully</span></a></li>
         </ol>
         <p class="card-text font-weight-bold">Note Key Words Used </p>
                  <div class="card">
            <div class="card-header">
               <ul class="nav nav-tabs card-header-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">New Delivery</a></li>
                  <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">View Deliveries</a></li>
                  <li class="nav-item"><a class="nav-link" href="#item-1-3" id="item-1-3-tab" data-toggle="tab" role="tab" aria-controls="item-1-3" aria-selected="false">Completed Delivery </a></li>
               </ul>
            </div>
            <div class="card-body">
               <div id="nav-tabContent" class="tab-content">
                  <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                      <h4>Cargo Details</h4>
                     <hr>
                     <?php echo form_open('admins/delivery'); ?>

                      <?php echo validation_errors('<p class="h5  text-danger">>>', '</p><br>'); ?>

                     <div class="input-group" style="padding-bottom:20px;">
                        <div class="input-group-prepend"><span class="input-group-text" >Warehouse Name</span></div>
                        <select class="form-control" name="warehouse">
                           <?php foreach ($warehouses as $warehouse) {?>
                           <option value="<?php echo $warehouse->username; ?>"><?php echo $warehouse->username; ?></option>
                           <?php }?>
                        </select>
                        <div class="input-group-append"></div>
                     </div>
                     <div class="input-group" style="padding-bottom:20px;">
                        <div class="input-group-prepend"><span class="input-group-text" >Cargo</span></div>
                        <select class="form-control" name="cargo">

                           <?php
if (empty($cargos)) {echo '<option disabled >No Cargo Inserted</option>';} else {
	foreach ($cargos as $cargo) {?>
                           <option value="<?php echo $cargo->unique_name; ?>"><?php echo $cargo->unique_name . " (Type) " . $cargo->cargo_type; ?></option>
                           <?php }}?>
                        </select>
                        <div class="input-group-append"></div>
                     </div>

                     <div class="input-group" style="padding-bottom:20px;">
                        <div class="input-group-prepend"><span class="input-group-text" >Assign Driver</span></div>
                       <select class="form-control" name="driver">
                           <?php foreach ($drivers as $driver) {?>
                           <option value="<?php echo $driver->username; ?>"><?php echo $driver->username; ?></option>
                           <?php }?>
                        </select>
                        <div class="input-group-append"></div>
                     </div>
                     <div class="input-group" style="padding-bottom:20px;">
                        <div class="input-group-prepend"><span class="input-group-text" >From Date</span></div>
                        <input class="form-control" name="from_date" type="date">
                        <div class="input-group-append"></div>
                     </div>
                     <div class="input-group" style="padding-bottom:20px;">
                        <div class="input-group-prepend"><span class="input-group-text" >To Date</span></div>
                        <input class="form-control" name="to_date" type="date">
                        <div class="input-group-append"></div>
                     </div>
                     <div class="input-group" style="padding-bottom:20px;">
                        <div class="input-group-prepend"><span class="input-group-text" >Tracking ID</span></div>
                        <input name="tracking_id" class="form-control" type="text" value="<?php echo strtoupper(random_string('alpha', 5) . "-" . random_string('numeric', 5)); ?>">
                        <div class="input-group-append"></div>
                     </div>
                        <button class="btn btn-primary" type="submit">Initialise Delivery</button>


                  </div>
                  <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">

              <table id="dashboard-delivery" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th>Warehouse Name</th>
                              <th>Cargo Unique Name </th>
                              <th>Assigned Driver </th>
                              <th>Driver Recieved Package</th>
                              <th>Driver Comfirm Delivery</th>
                              <th>Warehouse Comfirm Recieve</th>
                              <th>Warehouse Comfirm Delivery</th>
                              <th>From Date</th>
                              <th>To Date</th>
                              <th>Tracking ID</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach ($deliveries as $delivery) {
	?>
                           <tr>
                              <td><?php echo $delivery->deliver_warehouse_id; ?></td>

                              <td><?php echo $delivery->cargo_data_id; ?></td>
                              <td><?php echo $delivery->driver_id; ?></td>
                              <td align="center">
                                 <?php

	if ($delivery->confirm_driver_receive == 0) {echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                 </td>
                              <td align="center">
                                 <?php

	if ($delivery->confirm_driver_deliver == 0) {echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                  </td>
                                  <td align="center">
                                 <?php

	if ($delivery->confirm_warehouse_receive == 0) {echo '<i class="fa fa-remove text-danger "></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                  </td>
                              <td align="center">
                                 <?php

	if ($delivery->confirm_warehouse_deliver == 0) {
		echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                              </td>
                              <td><?php echo $delivery->start_time; ?></td>
                              <td><?php echo $delivery->end_time; ?></td>
                              <td><?php echo $delivery->tracking_id; ?></td>

                           <td>

                        <button href="#edit_delivery" data-toggle="modal" class="btn btn-primary btn-sm edit_delivery" id="<?php echo $delivery->id; ?>"><i class="fa fa-pencil"></i></button>
                        <button href="#delete_delivery" data-toggle="modal"  class="btn btn-danger btn-sm delete_delivery" id="<?php echo $delivery->id; ?>"><i class="fa fa-trash"></i></button>
                     </td>
                     <?php }?>
                           </tr>
                        </tbody>
                     </table>

               </div>

               <?php form_close();?>

                  <div id="item-1-3" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-3-tab">
                     <div class="table-responsive">
                       <table id="dashboard-delivery-complete" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                           <tr>
                              <th>Warehouse Name</th>
                              <th>Cargo Unique Name </th>
                              <th>Assigned Driver </th>
                              <th>Driver Recieved Package</th>
                              <th>Driver Comfirm Delivery</th>
                              <th>Warehouse Comfirm Recieve</th>
                              <th>Warehouse Comfirm Delivery</th>
                              <th>From Date</th>
                              <th>To Date</th>
                              <th>Tracking ID</th>
                           </tr>
                        </thead>
                           <tbody>
                           <?php foreach ($complete_deliveries as $cdelivery) {
	?>
                           <tr>
                              <td><?php echo $cdelivery->deliver_warehouse_id; ?></td>

                              <td><?php echo $cdelivery->cargo_data_id; ?></td>
                              <td><?php echo $cdelivery->driver_id; ?></td>
                              <td align="center">
                                 <?php

	if ($cdelivery->confirm_driver_receive == 0) {echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                 </td>
                              <td align="center">
                                 <?php

	if ($cdelivery->confirm_driver_deliver == 0) {echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                  </td>
                                  <td align="center">
                                 <?php

	if ($cdelivery->confirm_warehouse_receive == 0) {echo '<i class="fa fa-remove text-danger "></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                  </td>
                              <td align="center">
                                 <?php

	if ($cdelivery->confirm_warehouse_deliver == 0) {
		echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                              </td>
                              <td><?php echo $cdelivery->start_time; ?></td>
                              <td><?php echo $cdelivery->end_time; ?></td>
                              <td><?php echo $cdelivery->tracking_id; ?></td>

                     </td>
                     <?php }?>
                           </tr>
                        </tbody>
                        </table>
                     </div>
                  </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?php $this->load->view('admin/layout/ajax_modals_delivery');?>
<?php $this->load->view('admin/layout/footer');?>

<script type="text/javascript">
    $(document).ready(function(){
            $('.edit_delivery').click(function(){
            var id = $(this).attr('id');

            $.ajax({
                url : "<?php echo site_url('admins/editDelivery/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id:id},
                success: function(response){

                   $('[name="ewarehouse_name"').val(response[0].deliver_warehouse_id);
                   $('[name="etracking_id"').val(response[0].tracking_id);
                   $('[name="efrom_date"').val(response[0].start_time);
                   $('[name="eto_date"').val(response[0].end_time);
                   $('[name="eassigned_driver"').val(response[0].driver_id);
                   $('[name="ecargo_unique_name"').val(response[0].cargo_data_id);
                   $('[name="update_delivery"').attr('id',response[0].id);
                }
            });
        });

                    $('[name="update_delivery"]').click(function(){

            var id = $(this).attr('id');

           var warehouse_name = $('[name="ewarehouse_name"').val();
                    var tracking_id = $('[name="etracking_id"').val();
                  var from_date  =  $('[name="efrom_date"').val();
                  var to_date =  $('[name="eto_date"').val();
                  var assigned_driver =   $('[name="eassigned_driver"').val();
                 var cargo_unique_name  =   $('[name="ecargo_unique_name"').val();

            $.ajax({
                url : "<?php echo site_url('admins/editDeliveryData/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data :
                {
                  tracking_id : tracking_id,
                  driver_id : assigned_driver,
                  deliver_warehouse_id : warehouse_name,
                  start_time : to_date,
                  end_time : to_date,
                  cargo_data_id : cargo_unique_name
                  },
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Success... Updating');
                        location.reload();
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
        });

$('.delete_delivery').click(function(){
            var id  = $(this).attr('id');
            $('.deleteid_delivery').attr('id',id);
        });
        $('.deleteid_delivery').click(function(){
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url : "<?php echo site_url('admins/deleteDelivery/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id:id},
                success: function(response){
                   if($.isEmptyObject(response.error)){
                        toastr.success('Success... Deleted');
                        setTimeout(function(){window.location.href='<?php echo base_url("admins/delivery"); ?>', 1000});
                      }else{
                          toastr.error(response.error,'Error Occurred',{timeOut: 90000});
                      }
                }
            });
        });
    });



</script>



