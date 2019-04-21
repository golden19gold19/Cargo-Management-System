<script type="text/javascript">
	$(document).ready(function(){
        $('[name="createRoom"]').click(function(){
            event.preventDefault();
      var nameOfStorage = $("input[name='nameOfStorage']").val();
      var typeOfStorage = $("input[name='typeOfStorage']").val();
      var status = $("input[name='status']").val();
            $.ajax({
                url : "<?php echo site_url('warehouse/createRoom'); ?>",
                type : 'POST',
                dataType :'json',
                data : {nameOfStorage : nameOfStorage,typeOfStorage : typeOfStorage},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Success... Saving');
                        window.location.href='<?php echo base_url("warehouse"); ?>';
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
        });

// edit room
    $('.edit_Room').click(function(){
        var id = $(this).attr('id');
        event.preventDefault();

        $.ajax({
            url : "<?php echo site_url('warehouse/editRoom/'); ?>"+id,
            type : 'POST',
            dataType :'json',
            data : {id:id},
            success: function(response){
               $('[name="enameOfStorage"').val(response[0].room);
               $('[name="etypeOfStorage"').val(response[0].type);
               var status = response[0].status;
               // if(status=='on'){
               //  $('#status1').attr('checked','true');
               // }
                //setting id to edit button
               $('[name="edit_Room_Data"').attr('id',response[0].id);
            }
        });
    });

	//delete room
    $('.delete_Room').click(function(){
        var id  = $(this).attr('id');
        $('[name="delete_Room"]').attr('id',id);
    });
    $('[name="delete_Room"]').click(function(){
        event.preventDefault();
        var id = $(this).attr('id');
        $.ajax({
            url : "<?php echo site_url('warehouse/deleteRoom/'); ?>"+id,
            type : 'POST',
            dataType :'json',
            data : {id:id},
            success: function(response){
               if($.isEmptyObject(response.error)){
                    toastr.success('Room. Successfully Deleted... ');
                    window.location.href='<?php echo base_url("warehouse"); ?>';
                  }else{
                      toastr.error(response.error,'Error Occurred',{timeOut: 90000});
                  }
            }
        });
    });



       $('[name="edit_Room_Data"]').click(function(){
            event.preventDefault();
            var id = $(this).attr('id');
      var room = $("input[name='enameOfStorage']").val();
      var type = $("input[name='etypeOfStorage']").val();
            $.ajax({
                url : "<?php echo site_url('warehouse/editRoomData/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {room : room,type : type},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Room Updated Successfully....');
                        window.location.href='<?php echo base_url("warehouse"); ?>';
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
        });
	});






</script>