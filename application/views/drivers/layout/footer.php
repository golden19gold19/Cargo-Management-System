    <script src="<?php echo base_url('assets/'); ?>js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/'); ?>js/script.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/toastr/toastr.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/datatable/datatables.min.js"></script>

    <script type="text/javascript">
         //toastr prevent duplicates
    toastr.options.preventDuplicates = true;
    toastr.options.progressBar = true;
    toastr.options.closeButton = true;

    	$(document).ready(function(){
    	   $('#dashboard-drivers').DataTable({
                responsive: true
            });
             $('#dashboard-drivers-passed').DataTable({
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




</body>

</html>