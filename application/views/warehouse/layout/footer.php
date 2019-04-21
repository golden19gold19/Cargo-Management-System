    <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/script.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/datatable/datatables.min.js"></script>
<?php $this->load->view('warehouse/layout/ajax_dashboard');?>

    <script type="text/javascript">

         //toastr prevent duplicates
    toastr.options.preventDuplicates = true;
       toastr.options.progressBar = true;
    toastr.options.closeButton = true;

    	$(document).ready(function(){
    		$('#dashboard-warehouse').DataTable({
    			responsive: true
    		});

    		$('#delivery-warehouse').DataTable({
    			responsive: true
    		});
            $('#delivery-success').DataTable({
                responsive: true
            });

   });
    <?php
if ($this->session->flashdata('toastr')) {
	$toastr = $this->session->flashdata('toastr');
	echo "toastr." . $toastr['type'] . "('" . $toastr['msg'] . "','" . strtoupper($toastr['type']) . "', {timeOut: 9000})";
}
?>
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.seeMore').click(function(){
            var id = $(this).attr('id');
        event.preventDefault();
         $.ajax({
                url : "<?php echo site_url('warehouse/seeMoreDetails/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id : id},
                success: function(response){
                    if($.isEmptyObject(response.error)){
                       $('#delivery').modal('show');
                        $('#trackingId').val( response[0].tracking_id);
                        $('#deliveryWarehouse').val(response[0].deliver_warehouse_id);
                        $('#issuedDeliveryDate').val(response[0].start_time);
                        $('#assignedDriver').val( response[0].driver_id);
                        $('#arrivalDelivery').val( response[0].end_time);
                        $('#issuedBy').val( response[0].issued_by);
                        $('#issuedOn').val( response[0].issued_on);
                        $('#cargoType').val(response[1].cargo_type);
                        $('#quantity').val(response[1].quantity);
                        $('#weight').val(response[1].weight);
                        $('#uniqueCargoName').val(response[1].unique_name);
                      }else{
                        alert('Results Not Found');
                      }
                }
            });
     });


           $('[name="approve"]').click(function(){
            event.preventDefault();
            var id = $('.seeMore').attr('id');
                        var trackingId = $('#trackingId').val();
                        var deliveryWarehouse  = $('#deliveryWarehouse').val();
                        var issuedDeliveryDate =  $('#issuedDeliveryDate').val();
                        var assignedDriver = $('#assignedDriver').val();
                        var arrivalDelivery = $('#arrivalDelivery').val();
                       var  cargoType = $('#cargoType').val();
                       var  quantity = $('#quantity').val();
                       var  weight = $('#weight').val();
                        var uniqueCargoName = $('#uniqueCargoName').val();
                        var warehouseRoom = $('#room').val();
            $.ajax({
                url : "<?php echo site_url('warehouse/approveDelivery/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {
                    id : id,
                    trackingId : trackingId,
                    deliveryWarehouse : deliveryWarehouse,
                    issuedDeliveryDate : issuedDeliveryDate,
                    assignedDriver : assignedDriver,
                    arrivalDelivery : arrivalDelivery,
                    cargoType : cargoType,
                    quantity : quantity,
                    weight : weight,
                    uniqueCargoName : uniqueCargoName,
                    warehouseRoom:warehouseRoom
                },
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Successfully Approved');
                        location.reload();
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
        });

});
</script>

</body>

</html>