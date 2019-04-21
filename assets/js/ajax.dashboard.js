    $(document).ready(function(){
        $('#dashboard-warehouse').DataTable({
            responsive: true
        });
    
        $('#cargo').DataTable({
            responsive: true
        });
    });
    //toastr prevent duplicates
    toastr.options.positionClass = 'toast-top-center';
    toastr.options.preventDuplicates = true;
       toastr.options.progressBar = true;
    toastr.options.closeButton = true;


    $(document).ready(function(){
        $('[name="create"]').click(function(){
            event.preventDefault();
      var email = $("input[name='email']").val();
      var role = $("select[name='role']").val();
      var address = $("input[name='address']").val();
      var contact = $("input[name='contact']").val();
      var username = $("input[name='username']").val();
      var password = $("input[name='password']").val();
            $.ajax({
                url : "<?php echo site_url('admins/create_users'); ?>",
                type : 'POST',
                dataType :'json',
                data : {email : email,role : role,address : address,contact : contact,username : username,password : password},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Success... Saving');
                        setInterval(function(){window.location.href='<?php echo base_url("admins"); ?>', 3000});
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
        });
    
    });

    $(document).ready(function(){
        $('[name="edit"]').click(function(){
            event.preventDefault();
            var id = $(this).attr('id');
      var address = $("input[name='edit_address']").val();
      var username = $("input[name='edit_username']").val();
      var password = $("input[name='edit_password']").val();
      var contact = $("input[name='edit_contact']").val();
      var role = $("select[name='edit_role']").val();
      var email = $("input[name='edit_email']").val();
            $.ajax({
                url : "<?php echo site_url('admins/edit_user_data/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {email : email,role : role, address : address, contact : contact,username : username, password : password},
                success: function(data){
                    if($.isEmptyObject(data.error)){
                        toastr.success('Success... Updating');
                        setInterval(function(){window.location.href='<?php echo base_url("admins"); ?>', 3000});
                      }else{
                        toastr.error(data.error,'Form Validation Errors',{timeOut: 90000});
                      }
                }
            });
        });
    
    });

    $(document).ready(function(){
        $('.edit').click(function(){
            var id = $(this).attr('id');
            event.preventDefault();
            
            $.ajax({
                url : "<?php echo site_url('admins/edit_users/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id:id},
                success: function(response){
                   $('[name="edit_password"').val(response[0].password);
                   $('[name="edit_role"').val(response[0].role);
                   $('[name="edit_contact"').val(response[0].contact);
                   $('[name="edit_address"').val(response[0].address);
                   $('[name="edit_email"').val(response[0].email);
                   $('[name="edit_username"').val(response[0].username);
                   $('[name="edit"').attr('id',response[0].id);
                }
            });
        });
    
    });

    $(document).ready(function(){
        $('.delete').click(function(){
            var id  = $(this).attr('id');
            $('[type="delete"]').attr('id',id);
        });
        $('[type="delete"]').click(function(){
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url : "<?php echo site_url('admins/delete_user/'); ?>"+id,
                type : 'POST',
                dataType :'json',
                data : {id:id},
                success: function(response){
                   if($.isEmptyObject(response.error)){
                        toastr.success('Success... Deleted');
                        setInterval(function(){window.location.href='<?php echo base_url("admins"); ?>', 3000});
                      }else{
                          toastr.error(response.error,'Error Occurred',{timeOut: 90000});
                      }
                }
            });
        });
    
    });
