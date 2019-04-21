<?php $this->load->view('drivers/layout/header');?>
<div class="container-fluid" style="padding:59px; ">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Dashboard</h4>
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a><span>Here Driver can approve he has received the cargo and if he has delivered that cargo to the warehouse</span></a></li>

            </ol>

            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a><span>Note :: Specific cargo will till persist if it's delivery has not been confirmed by the warehouse </span></a></li>

            </ol>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Current Job</a></li>
                        <li class="nav-item"><a class="nav-link" href="#item-1-2" id="item-1-2-tab" data-toggle="tab" role="tab" aria-controls="item-1-2" aria-selected="false">&nbsp;Passed Job</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div id="nav-tabContent" class="tab-content">
                        <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                            <div class="table-responsive">
                            <table id="dashboard-drivers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tracking ID</th>
                                        <th>Warehouse</th>
                                        <th>Cargo Type</th>
                                        <th>Weight</th>
                                        <th>Quantity</th>
                                        <th>Cargo Unique name</th>
                                        <th>Warehouse Room</th>
                                        <th>Warehouse Address</th>
                                        <th>Deliver On</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($current_jobs as $job) {?>
                                    <tr>
                                        <td><?php echo $job->tracking_id; ?></td>
                                        <td><?php echo $job->delivery_warehouse; ?></td>
                                        <td><?php echo $job->cargo_type; ?></td>
                                        <td><?php echo $job->weight; ?></td>
                                        <td><?php echo $job->quantity; ?></td>
                                        <td><?php echo $job->cargo_unique_name; ?></td>
                                        <td><?php echo $job->warehouse_room; ?></td>
                                        <td><?php echo $job->warehouse_address; ?></td>
                                        <td><?php echo $job->arrival_delivery; ?></td>

                                        <td>
                                            <?php if ($job->status == 0) {?>
                                            <button data-toggle="modal" title="Cargo Recieved" href="#cargoRecieve" class="btn btn-primary btn-sm rCargo" id="<?php echo $job->tb_cargo_id; ?>"><i class="fa fa-download"></i></button>
                                            <?php } else {?>
                                            <button data-toggle="modal" title="Cancel Cargo Recieved" href="#cancelCargoRecieve" class="btn btn-danger btn-sm cancelRCargo" id="<?php echo $job->tb_cargo_id; ?>"><i class="fa fa-remove"></i></button>
                                            <button data-toggle="modal" title="Delivered Cargo" href="#cargoDeliver" class="btn btn-secondary btn-sm dCargo" id="<?php echo $job->tb_cargo_id; ?>"><i class="fa fa-tasks"></i></button>
                                                <?php }?>

                                        </td>
                                    </tr>
                                        <?php }?>

                                </tbody>
                            </table>
                            </div>
                        </div>
                        <div id="item-1-2" class="tab-pane fade" role="tabpanel" aria-labelledby="item-1-2-tab">
                                                        <div class="table-responsive">
                            <table id="dashboard-drivers-passed" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Tracking ID</th>
                                        <th>Warehouse</th>
                                        <th>Cargo Type</th>
                                        <th>Weight</th>
                                        <th>Quantity</th>
                                        <th>Cargo Unique name</th>
                                        <th>Warehouse Room</th>
                                        <th>Warehouse Address</th>
                                        <th>Deliver On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($passed as $p_job) {?>
                                    <tr>
                                        <td><?php echo $p_job->tracking_id; ?></td>
                                        <td><?php echo $p_job->delivery_warehouse; ?></td>
                                        <td><?php echo $p_job->cargo_type; ?></td>
                                        <td><?php echo $p_job->weight; ?></td>
                                        <td><?php echo $p_job->quantity; ?></td>
                                        <td><?php echo $p_job->cargo_unique_name; ?></td>
                                        <td><?php echo $p_job->warehouse_room; ?></td>
                                        <td><?php echo $p_job->warehouse_address; ?></td>
                                        <td><?php echo $p_job->arrival_delivery; ?></td>
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
</div>


<div role="dialog" tabindex="-1" class="modal fade" id="cargoDeliver">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cargo Delivery</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <h5 class="text-secondary">Have you delivered cargo to the warehouse?</h5>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary cargoSubmitted" type="button" >Yes</button></div>
        </div>
    </div>
</div>

<div role="dialog" tabindex="-1" class="modal fade" id="cargoRecieve">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cargo Recieve</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <h5 class="text-secondary">Have you recieved the pending cargo ?</h5>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary cargoRecieved" type="button" id="cargo_recieve">Yes</button></div>
        </div>
    </div>
</div>


<div role="dialog" tabindex="-1" class="modal fade" id="cancelCargoRecieve">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cancel Cargo Recieve</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <h5 class="text-secondary">Do you want to cancel recieve?</h5>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary cancelCargoRecieved" type="button" id="cargo_recieve">Yes</button></div>
        </div>
    </div>
</div>
<?php $this->load->view('drivers/layout/footer');?>

<script type="text/javascript">
    $(document).ready(function(){
         $("#dashboard-drivers").on('click', ".dCargo", function () {
                var id = $(this).attr('id');
                $('.cargoSubmitted').click(function(){
             $.ajax({
                url : "<?php echo site_url('drivers/deliverySent/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id : id},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Success... Saving');
                        location.reload();
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
                });
        });


          $("#dashboard-drivers").on('click', ".rCargo", function () {
                var id = $(this).attr('id');
                $('.cargoRecieved').click(function(){
             $.ajax({
                url : "<?php echo site_url('drivers/cargoRecieved/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id : id},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Success... Saving');
                        location.reload();
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
                });
        });



                    $("#dashboard-drivers").on('click', ".cancelRCargo", function () {
                var id = $(this).attr('id');
                $('.cancelCargoRecieved').click(function(){
             $.ajax({
                url : "<?php echo site_url('drivers/cancelCargoRecieved/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id : id},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.warning('Cancelling... Recieve');
                        window.location.href='<?php echo base_url("drivers"); ?>';
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
                });
        });
    });
</script>