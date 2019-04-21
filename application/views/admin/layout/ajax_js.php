
<script type = "text/javascript" >

//         function sendmail(username,password,toEmail,role,header,msg,contact,address){
//             Email.send({
//     secureToken : '6037c5fb-dd02-4b69-b1ff-a5398030f4dd',
//     Host : "smtp25.elasticemail.com",
//     Username : "0554apana@gmail.com",
//     Password : "6037c5fb-dd02-4b69-b1ff-a5398030f4dd",
//     To : toEmail,
//     From : "0554apana@gmail.com",
//     Subject : "Program Analysis",
//     Body : '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head> <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="format-detection" content="date=no"> <meta name="format-detection" content="telephone=no"> <title>Cargo Management System</title> <style type="text/css">body{margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;}table{border-spacing: 0;}table td{border-collapse: collapse;}.ExternalClass{width: 100%;}.ExternalClass,.ExternalClass p,.ExternalClass span,.ExternalClass font,.ExternalClass td,.ExternalClass div{line-height: 100%;}.ReadMsgBody{width: 100%; background-color: #ebebeb;}table{mso-table-lspace: 0pt; mso-table-rspace: 0pt;}img{-ms-interpolation-mode: bicubic;}.yshortcuts a{border-bottom: none !important;}@media screen and (max-width: 599px){.force-row, .container{width: 100% !important; max-width: 100% !important;}}@media screen and (max-width: 400px){.container-padding{padding-left: 12px !important; padding-right: 12px !important;}}.ios-footer a{color: #aaaaaa !important; text-decoration: underline;}a[href^="x-apple-data-detectors:"],a[x-apple-data-detectors]{color: inherit !important; text-decoration: none !important; font-size: inherit !important; font-family: inherit !important; font-weight: inherit !important; line-height: inherit !important;}</style></head><body style="margin:0; padding:0;" bgcolor="#F0F0F0" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><table border="0" width="100%" height="100%" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0"> <tr> <td align="center" valign="top" bgcolor="#F0F0F0" style="background-color: #F0F0F0;"> <br><table border="0" width="600" cellpadding="0" cellspacing="0" class="container" style="width:600px;max-width:600px"> <tr> <td class="container-padding header" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:24px;font-weight:bold;padding-bottom:12px;color:#DF4726;padding-left:24px;padding-right:24px"> Cargo Management System </td></tr><tr> <td class="container-padding content" align="left" style="padding-left:24px;padding-right:24px;padding-top:12px;padding-bottom:12px;background-color:#ffffff"> <br><div class="title" style="font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:600;color:#374550">'+header+'</div><br><div class="body-text" style="font-family:Helvetica, Arial, sans-serif;font-size:14px;line-height:20px;text-align:left;color:#333333">'+msg+'  ('+role+') <br>Login Url <a href="http://localhost/cargo-management-system">Cargo Management System</a><br>Your User Name is : '+ username +' <br> Your Password is : '+password +' <br>Your Contact : '+ contact +' <br>Your Address : '+ address +' <br><br></div></td></tr><tr> <td class="container-padding footer-text" align="left" style="font-family:Helvetica, Arial, sans-serif;font-size:12px;line-height:16px;color:#aaaaaa;padding-left:24px;padding-right:24px"> <br><br>Cargo Management System: © 2019. <br><br></td></tr></table> </td></tr></table></body></html>'
// });
//     }

    $(document).ready(function () {

        $('#dashboard-users').DataTable({
            responsive: true
        });

        $('#dashboard-delivery').DataTable({
            responsive: true
        });

        $('#dashboard-cargo').DataTable({
            responsive: true
        });

        $('#dashboard-delivery-complete').DataTable({
            responsive: true
        });

        //toastr prevent duplicates
        toastr.options.positionClass = 'toast-top-center';
        toastr.options.preventDuplicates = true;
        toastr.options.progressBar = true;
        toastr.options.closeButton = true;


        //ajax create user

        $('[name="create"]').click(function () {
            event.preventDefault();
            var email = $("input[name='email']").val();
            var role = $("select[name='role']").val();
            var address = $("input[name='address']").val();
            var contact = $("input[name='contact']").val();
            var username = $("input[name='username']").val();
            var password = $("input[name='password']").val();
            $.ajax({
                url: "<?php echo site_url('admins/createUsers'); ?>",
                type: 'POST',
                dataType: 'json',
                data: {
                    email: email,
                    role: role,
                    address: address,
                    contact: contact,
                    username: username,
                    password: password
                },
                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
                        toastr.success('Success... Saving');
                        //var msg = 'Your have successfully been registered as a user with account information as';
                      //  var header = 'User Registration'
                        //sendmail(username,password,email,role,header,msg,contact,address);
                       // setTimeout(function () {location.reload() }, 5000);
                       location.reload();
                    } else {
                        toastr.error(data.error, 'Form Validation Errors', {
                            timeOut: 90000
                        });
                    }
                }
            });
        });



        //ajax edit user


        $('[name="edit"]').click(function () {
            event.preventDefault();
            var id = $(this).attr('id');
            var address = $("input[name='edit_address']").val();
            var username = $("input[name='edit_username']").val();
            var password = $("input[name='edit_password']").val();
            var contact = $("input[name='edit_contact']").val();
            var role = $("select[name='edit_role']").val();
            var email = $("input[name='edit_email']").val();
            var emailData = {username : username , password: password};
            $.ajax({
                url: "<?php echo site_url('admins/editUserData/'); ?>" + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    email: email,
                    role: role,
                    address: address,
                    contact: contact,
                    username: username,
                    password: password
                },

                success: function (data) {
                    if ($.isEmptyObject(data.error)) {
            var msg = 'Your account has been successfully edited ';
                       // var header = 'User Data Update'
                        //sendmail(username,password,email,role,header,msg,contact,address);
                        toastr.success('Success... Updating');
                          location.reload();
                    } else {
                        toastr.error(data.error, 'Form Validation Errors', {
                            timeOut: 90000
                        });
                    }
                }
            });
        });


        //ajax populate fields


        $('.edit').click(function () {
            var id = $(this).attr('id');
            event.preventDefault();

            $.ajax({
                url: "<?php echo site_url('admins/editUsers/'); ?>" + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function (response) {
                    $('[name="edit_password"').val(response[0].password);
                    $('[name="edit_role"').val(response[0].role);
                    $('[name="edit_contact"').val(response[0].contact);
                    $('[name="edit_address"').val(response[0].address);
                    $('[name="edit_email"').val(response[0].email);
                    $('[name="edit_username"').val(response[0].username);
                    $('[name="edit"').attr('id', response[0].id);
                }
            });
        });


        //ajax delete user

        $('.delete').click(function () {
            var id = $(this).attr('id');
            $('[type="delete"]').attr('id', id);
        });
        $('[type="delete"]').click(function () {
            event.preventDefault();
            var id = $(this).attr('id');
            $.ajax({
                url: "<?php echo site_url('admins/deleteUser/'); ?>" + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function (response) {
                    if ($.isEmptyObject(response.error)) {
                        toastr.success('Success... Deleted');
                        location.reload();
                    } else {
                        toastr.error(response.error, 'Error Occurred', {
                            timeOut: 90000
                        });
                    }
                }
            });
        });

    });

</script>