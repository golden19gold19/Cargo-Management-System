<!-- create cargo -->
<div class="modal fade" role="dialog" tabindex="-1" id="cargo">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 style="color:rgb(57,134,210);"><i class="fa fa-cubes"></i>&nbsp;Cargo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Unique Name</span></div>
               <input class="form-control" type="text" name="uniname">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Cargo Type</span></div>
               <input class="form-control" type="text" name="cargo_type">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Quantity</span></div>
               <input class="form-control" type="text" name="quantity">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Weight(Kg)</span></div>
               <input class="form-control" type="text" name="weight">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend">
                  <span class="input-group-text" style="color:rgb(63,60,196);">Delivered On </span>
               </div>
               <input class="form-control" type="date" name="delivered_on">
               <div class="input-group-append"></div>
            </div>
            <i>click to select date</i>
         </div>
         <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" name="stock_create">Save</button></div>
      </div>
   </div>
</div>
<!-- edit cargo -->
<div class="modal fade" role="dialog" tabindex="-1" id="edit">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 style="color:rgb(57,134,210);"><i class="fa fa-cubes"></i>&nbsp;Cargo</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Unique Name</span></div>
               <input class="form-control" type="text" name="euniname">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Cargo Type</span></div>
               <input class="form-control" type="text" name="ecargo_type">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Quantity</span></div>
               <input class="form-control" type="text" name="equantity">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Weight</span></div>
               <input class="form-control" type="text" name="eweight">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text" style="color:rgb(63,60,196);">Delivered On</span></div>
               <input class="form-control" type="date" name="edelivered_on">
               <div class="input-group-append"></div>
            </div>
         </div>
         <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" type="button" name="edit_cargo_data">Save</button>
         </div>
      </div>
   </div>
</div>
<!-- delete cargo_type -->
<div tabindex="-1" class="modal fade" id="delete">
<div class="modal-dialog">
   <div class="modal-content">
      <div class="modal-header">
         <h4><i class="fa fa-trash"></i> Delete Cargo</h4>
         <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
      </div>
      <div class="modal-body">
         <p><strong>Alert</strong></p>
         <p>Are you sure you want to delete this Cargo?</p>
      </div>
      <div class="modal-footer" style="  color:rgb(108,32,78);">
         <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
         <button class="btn btn-primary " type="delete" name="delete_cargo">Save</button>
      </div>
   </div>
</div>
<script type="text/javascript">
   //ajax create Cargo
   $(document).ready(function(){
   $('[name="stock_create"]').click(function(){
       event.preventDefault();
   var cargo_type = $("input[name='cargo_type']").val();
   var uniname = $("input[name='uniname']").val();
   var quantity = $("input[name='quantity']").val();
   var weight = $("input[name='weight']").val();
   var delivered_on = $("input[name='delivered_on']").val();
       $.ajax({
           url : "<?php echo site_url('admins/createCargo'); ?>",
           type : 'POST',
           dataType :'json',
           data : {uniname: uniname,cargo_type: cargo_type,cargo_type : cargo_type,quantity : quantity,delivered_on:delivered_on,weight:weight},
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
   //ajax edit cargo data

   $(document).ready(function(){
   $('[name="edit_cargo_data"]').click(function(){
       event.preventDefault();
       var id = $(this).attr('id');
   var cargo_type = $("input[name='ecargo_type']").val();
   var uniname = $("input[name='euniname']").val();
   var quantity = $("input[name='equantity']").val();
   var weight = $("input[name='eweight']").val();
   var delivered_on = $("input[name='edelivered_on']").val();

       $.ajax({
           url : "<?php echo site_url('admins/editCargoData/'); ?>"+id,
           type : 'POST',
           dataType :'json',
           data : {uniname : uniname,cargo_type : cargo_type,quantity : quantity, weight : weight, delivered_on : delivered_on},
           success: function(data){
               if($.isEmptyObject(data.error)){
                   toastr.success('Successful... Updating');
                 location.reload();
                 }else{
                   toastr.error(data.error,'Form Validation Errors',{timeOut: 6000});
                 }
           }
       });
   });

   });


   //ajax populate fields

   $(document).ready(function(){
   $('.edit_cargo').click(function(){
       var id = $(this).attr('id');
       event.preventDefault();

       $.ajax({
           url : "<?php echo site_url('admins/editCargo/'); ?>"+id,
           type : 'POST',
           dataType :'json',
           data : {id:id},
           success: function(response){
              $('[name="euniname"').val(response[0].unique_name);
              $('[name="ecargo_type"').val(response[0].cargo_type);
              $('[name="equantity"').val(response[0].quantity);
              $('[name="eweight"').val(response[0].weight);
              $('[name="edelivered_on"').val(response[0].delivered_on);
               //setting id to edit button
              $('[name="edit_cargo_data"').attr('id',response[0].id);
           }
       });
   });

   });

   //ajax delete cargo

   $(document).ready(function(){
   $('.delete_cargo').click(function(){
       var id  = $(this).attr('id');
       $('[name="delete_cargo"]').attr('id',id);
   });
   $('[name="delete_cargo"]').click(function(){
       $(this).attr('disabled','true');
       event.preventDefault();
       var id = $(this).attr('id');
       $.ajax({
           url : "<?php echo site_url('admins/deleteCargo/'); ?>"+id,
           type : 'POST',
           dataType :'json',
           data : {id:id},
           success: function(response){
              if($.isEmptyObject(response.error)){
                   toastr.success('Deleted. Successful... ');
                   location.reload();
                 }else{
                     toastr.error(response.error,'Error Occurred',{timeOut: 90000});
                 }
           }
       });
   });

   });
</script>
</script>