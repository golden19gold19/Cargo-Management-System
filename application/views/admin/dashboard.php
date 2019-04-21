<?php $this->load->view('admin/layout/header');?>
<div class="container-fluid" style="margin-top:8px;">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Dashboard</h4><hr>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a><span>Welcome to Cargo Management System. You can add new user here , delete and update them.</span></a></li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" href="#item-1-1" id="item-1-1-tab" data-toggle="tab" role="tab" aria-controls="item-1-1" aria-selected="true">Users</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div id="nav-tabContent" class="tab-content">
                        <div id="item-1-1" class="tab-pane fade show active" role="tabpanel" aria-labelledby="item-1-1-tab">
                            <div style="padding-bottom:25px;">
                                <a class="btn btn-primary" role="button" href="#myModal" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp;New Users</a>
                            </div>
                            <div class="table-responsive">
                                <table id="dashboard-users" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Address </th>
                                            <th>Contact</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $user) {?>
                                        <tr>
                                            <td><?php echo $user->username; ?></td>
                                            <td><?php echo $user->password; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td><?php echo $user->role; ?></td>
                                            <td><?php echo $user->address; ?></td>
                                            <td><?php echo $user->contact; ?></td>

                                            <td>
                                                <button href="#edit" data-toggle="modal" class="btn btn-primary btn-sm edit" id="<?php echo $user->id; ?>"><i class="fa fa-pencil"></i></button>
                                                <button href="#delete" data-toggle="modal"  class="btn btn-danger btn-sm delete" id="<?php echo $user->id; ?>"><i class="fa fa-trash"></i></button>
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




<?php $this->load->view('admin/layout/ajax_modals_dashboard');?>
<?php $this->load->view('admin/layout/footer');?>

