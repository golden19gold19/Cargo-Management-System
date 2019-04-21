<?php $this->load->view('warehouse/layout/header');?>
<main class="page cv-page">
   <div class="container" style="padding-top:16px;">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Delivery</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a><span>Here you can add approve a delivery. After approval you can disapprove if required.  After driver has delivered cargo, you can have the ability to click on  receive </span></a></li>

            </ol>
            <div class="card">
               <div class="card-header">
                  <ul class="nav nav-tabs card-header-tabs" role="tablist">
                     <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Warehouse Stock</a></li>
                     <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">Successful Deliveries</a></li>

                  </ul>
               </div>
               <div class="card-body">
                  <div id="nav-tabContent" class="tab-content">
                     <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab" style="padding-bottom:25px;">

                        <div class="table-responsive">
                           <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="delivery-warehouse">
                              <thead>
                                 <tr>
                                    <th>Tracking ID</th>
                                    <th>Issued By</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Time</th>
                                    <th>Driver</th>
                                    <th>Approved</th>
                                    <th>Recieved Stock</th>
                                    <th>More Info And Approval</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($deliveries as $delivery) {
	?>
	                                <tr>
                                    <td><?php echo $delivery->tracking_id; ?></td>
                                    <td><?php echo $delivery->issued_by; ?></td>
                                    <td><?php echo $delivery->start_time; ?></td>
                                    <td><?php echo $delivery->end_time; ?></td>
                                    <td><?php echo $delivery->driver_id; ?></td>
                                    <td align="center">
                                 <?php

	if ($delivery->confirm_warehouse_deliver == 0) {echo '<i class="fa fa-remove text-danger "></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                  </td>
                                   <td align="center">
                                 <?php

	if ($delivery->confirm_warehouse_receive == 0) {
		echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                              </td>
                                    <td align="center">
                                       <?php if ($delivery->confirm_warehouse_deliver != 1) {?>
                                       <button href="#seeMore" data-toggle="modal" class="btn btn-primary btn-sm seeMore" id="<?php echo $delivery->id; ?>">See Details</button>
                                       <?php } else {?>
                                          <?php if ($delivery->confirm_driver_deliver != 0) {?>
                                          <a href="<?php echo base_url('warehouse/received/' . $delivery->id); ?>"  class="btn btn-success btn-sm" ">Received</button>
                                             <?php } else {?>
                                          <a href="<?php echo base_url('warehouse/disapprove/' . $delivery->id); ?>"  class="btn btn-danger btn-sm" ">Disapprove</button>
                                       <?php }}?>
                                    </td>
                                 </tr>
                                 <?php }?>
                              </tbody>
                           </table>
                        </div>
                     </div>



                     <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
             <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="delivery-success">
                              <thead>
                                 <tr>
                                    <th>Tracking ID</th>
                                    <th>Issued By</th>
                                    <th>Departure Time</th>
                                    <th>Arrival Time</th>
                                    <th>Driver</th>
                                    <th>Approved</th>
                                    <th>Recieved Stock</th>
                                 </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($completeDeliveries as $comp_delivery) {
	?>
                                   <tr>
                                    <td><?php echo $comp_delivery->tracking_id; ?></td>
                                    <td><?php echo $comp_delivery->issued_by; ?></td>
                                    <td><?php echo $comp_delivery->start_time; ?></td>
                                    <td><?php echo $comp_delivery->end_time; ?></td>
                                    <td><?php echo $comp_delivery->driver_id; ?></td>
                                    <td align="center">
                                 <?php

	if ($comp_delivery->confirm_warehouse_deliver == 0) {echo '<i class="fa fa-remove text-danger "></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                                  </td>
                                   <td align="center">
                                 <?php

	if ($comp_delivery->confirm_warehouse_receive == 0) {
		echo '<i class="fa fa-remove text-danger"></i>';} else {echo '<i class="fa fa-check text-success "></i>';}?>
                              </td>

                                 </tr>
                                 <?php }?>
                              </tbody>
                           </table>

                     </div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>




<div class="modal fade" role="dialog" tabindex="-1" id="myModal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 style="color:rgb(58,124,190);"><i class="fa fa-th-large"></i> Delivery</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Name</span></div>
               <input class="form-control" type="text">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Type</span></div>
               <input class="form-control" type="text">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Address</span></div>
               <input class="form-control" type="text">
               <div class="input-group-append"></div>
            </div>
            <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Active</label></div>
         </div>
         <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save</button></div>
      </div>
   </div>
</div>
<?php $this->load->view('warehouse/layout/ajax_modals_delivery');?>
<?php $this->load->view('warehouse/layout/footer');?>