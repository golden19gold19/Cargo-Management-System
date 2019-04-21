<div role="dialog" tabindex="-1" class="modal fade" id="edit_delivery">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Update Delivery</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Warehouse Name</span></div>
                   <select class="form-control" name="ewarehouse_name">
                           <?php foreach ($warehouses as $warehouse) {?>
                           <option value="<?php echo $warehouse->username; ?>"><?php echo $warehouse->username; ?></option>
                           <?php }?>
                        </select>
                    <div class="input-group-append"></div>
                </div>



                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Cargo Unique Name</span></div>
                         <select class="form-control" name="ecargo_unique_name">
                        <?php if (!empty($cargos)) {
	foreach ($cargos as $cargo) {?>
                           <option value="<?php echo $cargo->unique_name; ?>"><?php echo $cargo->unique_name . " (Type) " . $cargo->cargo_type; ?></option>
                           <?php }} else {?> <option selected="" disabled=""> No Cargo To Update</option> <?php }?>

                        </select>
                    <div class="input-group-append"></div>
                </div>


                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Assigned Driver</span></div>
                    <select class="form-control" name="eassigned_driver">
                           <?php foreach ($drivers as $driver) {?>
                           <option value="<?php echo $driver->username; ?>"><?php echo $driver->username; ?></option>
                           <?php }?>
                        </select>
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">From Date</span></div><input type="date" class="form-control" name="efrom_date" />
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">To Date</span></div><input type="date" class="form-control" name="eto_date" />
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Tracking ID</span></div><input type="text" class="form-control" name="etracking_id"/>
                    <div class="input-group-append"></div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" name="update_delivery">Update</button></div>
        </div>
    </div>
</div>


<div tabindex="-1" class="modal fade" id="delete_delivery">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="fa fa-trash"></i> Delete Delivery</h4><button type="button" class="close" data-dismiss="modal"><span>×</span></button></div>
            <div class="modal-body">
                <p><strong>Alert</strong></p>
                <p>Are you sure you want to delete this Delivery?</p>
            </div>
            <div class="modal-footer" style="  color:rgb(108,32,78);">
                <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary deleteid_delivery" type="button" >Save</button></div>
        </div>
    </div>
</div>

