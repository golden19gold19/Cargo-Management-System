
    <footer id="myFooter">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12">
                    <p class="footer-copyright">© <?php echo date('Y',time()); ?> ~ Cargo Management System &nbsp;<a href="#"></a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="<?php echo base_url('assets'); ?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/js/script.min.js"></script>
    <script src="<?php echo base_url('assets'); ?>/toastr/toastr.min.js"></script>

    <script type="text/javascript">
   // Display a warning toast, with no title
   toastr.options.progressBar = true;
   toastr.options.closeButton = true;
   toastr.options.positionClass = "toast-top-center";
    <?php
        if($this->session->flashdata('toastr')){
            $toastr = $this->session->flashdata('toastr');
     echo "toastr.".$toastr['type']."('".$toastr['msg']."','".strtoupper($toastr['type'])."', {timeOut: 9000})"; 
        }
      ?>
        
    </script>
</body>

</html>