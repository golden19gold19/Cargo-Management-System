

<div class="modal fade" role="dialog" tabindex="-1" id="myModal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 style="color:rgb(58,124,190);"><i class="fa fa-home"></i>   Warehouse</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Name</span></div>
               <input class="form-control" type="text" name="nameOfStorage">
               <div class="input-group-append"></div>
            </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Storage Type</span></div>
               <input class="form-control" type="text" name="typeOfStorage">
               <div class="input-group-append"></div>
            </div>

         </div>
         <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" name="createRoom">Save</button></div>
      </div>
   </div>
</div>



<div class="modal fade" role="dialog" tabindex="-1" id="editRoom">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h4 style="color:rgb(58,124,190);"><i class="fa fa-home"></i>Edit Storage Room</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
         </div>
         <div class="modal-body">
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Name</span></div>
               <input class="form-control" type="text" name="enameOfStorage">
               <div class="input-group-append"></div>
              </div>
            <div class="input-group" style="padding-bottom:20px;">
               <div class="input-group-prepend"><span class="input-group-text">Storage Type</span></div>
               <input class="form-control" type="text" name="etypeOfStorage">
               <div class="input-group-append"></div>
            </div>


         </div>
         <div class="modal-footer"><button class="btn btn-light" type="button" data-dismiss="modal">Close</button><button class="btn btn-primary" type="button" name="edit_Room_Data">Update</button></div>
      </div>
   </div>
</div>


<!-- delete cargo_type -->
<div tabindex="-1" class="modal fade" id="deleteRoom">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4><i class="fa fa-trash"></i> Delete Room</h4>
            <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
        </div>
        <div class="modal-body">
            <p><strong>Alert</strong></p>
            <p>Are you sure you want to delete this Room?</p>
        </div>
        <div class="modal-footer" style="  color:rgb(108,32,78);">
            <button class="btn btn-light" type="button" data-dismiss="modal">Close</button>
            <button class="btn btn-primary " type="delete" name="delete_Room">Save</button>
        </div>
    </div>
</div>