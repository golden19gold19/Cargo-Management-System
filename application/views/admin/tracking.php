<?php $this->load->view('admin/layout/header');?>

    <main class="page hire-me-page">
        <section class="portfolio-block hire-me" style="padding-top:0px;padding-bottom:2px;">
            <section class="portfolio-block website gradient">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-5 offset-lg-1 text">
                            <h3>Track Your Cargo</h3>
                            <p>Cargo numbers have the format XXX-12345678
                            We use the first 3 digits to show the cargo type</p>
                        </div>
                        <div class="col"><img src="<?php echo base_url('assets/'); ?>img/goods.png" width="400"></div>
                    </div>
                </div>
                <div class="container mt-5 col-md-4">
                       <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text text-secondary">Enter Tracking ID</span></div><input class="form-control" required type="text" name="tracking_id" />

                        <div class="input-group-append"><button class="btn btn-primary" name="track">Track!</button></div>
                    </div>
                </div>
            </section>
        </section>
    </main>

<div role="dialog" tabindex="-1" class="modal fade show" id="tracking">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Delivery Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo base_url('assets/'); ?>img/cargo.png" width="350" height="190" />
                            <br><br>
                            <p class="h6 text-uppercase">Cargo Details</p>
                                <hr>
                            <p id="un" class="text-secondary"></p>
                            <p id="ct" class="text-secondary"></p>
                            <p id="qty" class="text-secondary"></p>
                            <p id="we" class="text-secondary"></p>
                        </div>
                        <div class="col-lg-6">
                            <p class="lead text-uppercase" id="ti"></p>
                            <hr />
                            <p id="dw" class="text-secondary"></p>
                            <p id="ibb" class="text-secondary"></p>
                            <p id="ald" class="text-secondary"></p>
                            <p id="ad" class="text-secondary"></p>
                            <p id="ib" class="text-secondary"></p>
                            <p id="io" class="text-secondary"></p>
                            <p id="ct" class="text-secondary"></p>
                            <p id="cs" class="text-secondary"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('admin/layout/footer');?>
<script type="text/javascript">
    $(document).ready(function(){
        $('[name="track"]').click(function(){
        var tracking_id = $('[name="tracking_id"]').val();
        event.preventDefault();
         $.ajax({
                url : "<?php echo site_url('admins/tracking/'); ?>",
                type : 'POST',
                dataType :'json',
                data : {tracking_id : tracking_id},
                success: function(response){
                    if($.isEmptyObject(response.error)){
                       $('#tracking').modal('show');
                        $('#ti').text('Tracking ID =>> ' + response[0].tracking_id);
                        $('#dw').text('Delivery Warehouse =>> ' + response[0].deliver_warehouse_id);
                        $('#ibb').text('Issued Delivery Date =>> ' + response[0].start_time);
                        $('#ad').text('Assigned Driver =>> ' + response[0].driver_id);
                        $('#ald').text('Arrival Delivery =>> ' + response[0].end_time);
                        $('#ib').text('Issued By =>> ' + response[0].issued_by);
                        $('#io').text('Issued On =>> ' + response[0].issued_on);
                        $('#ct').text('Cargo Type =>> ' + response[1].cargo_type);
                        $('#qty').text('Quantity =>> ' + response[1].quantity);
                        $('#we').text('Weight (Kg) =>> ' + response[1].weight);
                        $('#un').text('Unique Cargo Name =>> ' + response[1].unique_name);
                      }else{
                        alert('Results Not Found');
                      }
                }
            });
     });
    });
</script>
