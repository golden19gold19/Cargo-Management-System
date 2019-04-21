<?php $this->load->view('admin/layout/header');?>
<div class="container" style="margin-top:8px;">
   <div class="card">
      <div class="card-body">
         <h4 class="card-title">Cargo</h4>
         <hr>
         <ol class="breadcrumb">
                <li class="breadcrumb-item text-secondary"><a><span>Here you can add more cargo that have arrived. will automatically disappear if issued</span></a></li>
            </ol>
         <div style="padding-bottom:20px;">
            <a class="btn btn-primary" role="button" href="#cargo" data-toggle="modal"><i class="fa fa-cubes"></i>&nbsp;Add Cargo</a>
         </div>
         <div class="table-responsive">
            <table id="dashboard-cargo" class="table table-striped table-bordered" cellspacing="0" width="100%">
               <thead>
                  <tr>
                     <th>Unique Name</th>
                     <th>Cargo Type</th>
                     <th>Quantity</th>
                     <th>Weight(Kg)</th>
                     <th>Delivered on</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($cargos as $cargo) {?>
                  <tr>
                     <td><?php echo $cargo->unique_name; ?></td>
                     <td><?php echo $cargo->cargo_type; ?></td>
                     <td><?php echo $cargo->quantity; ?></td>
                     <td><?php echo $cargo->weight; ?></td>
                     <td><?php echo $cargo->delivered_on; ?></td>
                     <td>
                        <button href="#edit" data-toggle="modal" class="btn btn-primary btn-sm edit_cargo" id="<?php echo $cargo->id; ?>"><i class="fa fa-pencil"></i></button>
                        <button href="#delete" data-toggle="modal"  class="btn btn-danger btn-sm delete_cargo" id="<?php echo $cargo->id; ?>"><i class="fa fa-trash"></i></button>
                     </td>
                  </tr>
                  <?php }?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php $this->load->view('admin/layout/footer');?>
<?php $this->load->view('admin/layout/ajax_modals_cargo');?>