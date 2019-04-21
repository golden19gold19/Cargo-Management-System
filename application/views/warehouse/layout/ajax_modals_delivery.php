<div role="dialog" tabindex="-1" class="modal fade show" id="delivery">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Delivery Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">


                        <div>

                        </div>
                        <div class="col">
                                <label>unique Cargo Name</label>
                            <input id="uniqueCargoName" class="text-secondary form-control" disabled=""><br>
                            <label>cargoType</label>
                            <input id="cargoType" class="text-secondary form-control" disabled=""><br>
                            <label>quantity</label>
                            <input id="quantity" class="text-secondary form-control" disabled=""><br>
                            <label>weight</label>
                            <input id="weight" class="text-secondary form-control" disabled=""><br>
                           <label> issued By </label>
                            <input id="issuedBy" class="text-secondary form-control" disabled=""><br>
                            <label>issued On</label>
                            <input id="issuedOn" class="text-secondary form-control" disabled=""><br>

                        </div>
                        <div class="col-lg-6">
                            <label>Tracking ID</label>
                            <input class="form-control text-secondary" id="trackingId" disabled="">
                            <hr />
                            <label>delivery Warehouse</label>
                            <input id="deliveryWarehouse" class="text-secondary form-control" disabled=""><br>
                            <label>issued Delivery Date</label>
                            <input id="issuedDeliveryDate" class="text-secondary form-control" disabled=""><br>
                            <label>arrival Delivery</label>
                            <input id="arrivalDelivery" class="text-secondary form-control" disabled=""><br>
                            <label> assigned Driver</label>
                            <input id="assignedDriver" class="text-secondary form-control" disabled=""><br>
                            <label class="text-danger">Enter Room Offload</label>
                            <select id="room" class="text-secondary form-control">

                                <?php if (!empty($rooms)) {
	foreach ($rooms as $room) {?>
                                <option><?php echo $room->room; ?></option>
                                <?php }} else {echo '<option selected disabled>No Room Created</option>';}?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" name="approve">Approve</button></div>
        </div>
    </div>
</div>
