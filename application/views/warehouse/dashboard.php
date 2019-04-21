<!-- including header -->
<?php $this->load->view('warehouse/layout/header');?>
<!-- main content area -->
    <main class="page cv-page">
   <div class="container" style="padding-top:16px;">
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Dashboard</h4>
            <ol class="breadcrumb">
               <!-- breadcrumbs -->
               <li class="breadcrumb-item text-secondary"><a><span>
               Here you can add new room ,edit and delete . Storage Rooms are created according to their name and what they store</span></a></li>

            </ol>
            <div class="card">
               <div class="card-header">
                  <!-- nav -->
                  <ul class="nav nav-tabs card-header-tabs" role="tablist">
                     <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Warehouses</a></li>
                  </ul>
               </div>
               <div class="card-body">
                  <div id="nav-tabContent" class="tab-content">
                     <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                        <div style="padding-bottom:14px;"><a class="btn btn-primary" role="button" href="#myModal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;Add Room</a>
                        </div>
                        <div class="table-responsive">
                        <table id="dashboard-warehouse" class="table table-striped table-bordered" >
                           <!-- table -->
                           <thead>
                              <tr>
                                 <th>Name</th>
                                 <th>Type Of Storage</th>
                                 <th>Actions</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php foreach ($rooms as $room) {?>
                              <tr>
                                 <td><?php echo $room->room; ?></td>
                                 <td><?php echo $room->type; ?></td>

                                <td>
                                    <button href="#editRoom" data-toggle="modal" class="btn btn-primary btn-sm edit_Room" id="<?php echo $room->id; ?>"><i class="fa fa-pencil"></i></button>
                                    <button href="#deleteRoom" data-toggle="modal"  class="btn btn-danger btn-sm delete_Room" id="<?php echo $room->id; ?>"><i class="fa fa-trash"></i></button>
                                 </td>
                              </tr>
                              <?php }?>
                           </tbody>
                        </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
<?php $this->load->view('warehouse/layout/ajax_modals_dashboard');?>
<?php $this->load->view('warehouse/layout/footer');?>