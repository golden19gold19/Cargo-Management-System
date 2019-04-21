<div class="modal fade" role="dialog" tabindex="-1" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="color:rgb(67,141,216);">&nbsp;&nbsp;<i class="fa fa-user-plus"></i>&nbsp; New Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Role</span></div>
                    <select class="form-control" name="role">
                        <option value="Cargo Company">Cargo Company</option>
                        <option value="Driver">Driver</option>
                        <option value="Warehouse">Warehouse</option>
                    </select>
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >Address</span></div>
                    <input class="form-control" type="text" name="address">
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >Phone Number</span></div>
                    <input class="form-control" type="text" name="contact">
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >Email</span></div>
                    <input class="form-control" type="text" name="email">
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >User Name</span></div>
                    <input class="form-control" type="text" name="username">
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >Password</span></div>
                    <input class="form-control" type="text" name="password" value="<?php echo 'WAH'.random_string('numeric',5); ?>">
                    <div class="input-group-append"></div>
                </div>
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary"  type="submit" name="create">Save</button>
            </div>
        </div>
    </div>
</div>


<div role="dialog" tabindex="-1" class="modal fade show" id="edit" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="fa fa-pencil-square-o"></i>Edit User</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <div class="input-group" style="padding:0px;padding-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Role</span></div>
                     <select class="form-control" name="edit_role">
                        <option value="Cargo Company">Cargo Company</option>
                        <option value="Driver">Driver</option>
                        <option value="Warehouse">Warehouse</option>
                    </select>
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="padding:0px;padding-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Address</span></div><input class="form-control" type="text" name="edit_address" />
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="padding:0px;padding-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text">Phone Number</span></div><input type="text" class="form-control" name="edit_contact" />
                    <div class="input-group-append"></div>
                </div>
                 <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >Email</span></div>
                    <input class="form-control" type="text" name="edit_email">
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >User Name</span></div>
                    <input class="form-control" type="text" name="edit_username">
                    <div class="input-group-append"></div>
                </div>
                <div class="input-group" style="margin-bottom:20px;">
                    <div class="input-group-prepend"><span class="input-group-text" >Password</span></div>
                    <input class="form-control" type="text" name="edit_password" >
                    <div class="input-group-append"></div>
                </div>

               
            </div>
            <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="submit" name="edit">Update</button></div>
        </div>
    </div>
</div>


<div tabindex="-1" class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><i class="fa fa-trash"></i> Delete User</h4><button type="button" class="close" data-dismiss="modal"><span>×</span></button></div>
            <div class="modal-body">
                <p><strong>Alert</strong></p>
                <p>Are you sure you want to delete this warehouse?</p>
            </div>
            <div class="modal-footer" style="  color:rgb(108,32,78);">
                <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-primary " type="delete">Save</button></div>
        </div>
    </div>
</div>

