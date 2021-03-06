<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('auth')?>">Home</a></li>
                        <li class="breadcrumb-item active">Portofolio</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h5>Portofolio User</h5>
                        <?php if($this->session->flashdata('status')) { echo $this->session->flashdata('status');}?>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUserModal">
                          <i class="fas fa-plus"></i> Tambah Pengguna
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="sale_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Tempat / Tanggal Lahir</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                              foreach ($userList as $row) { ?>
                                <?php if (!empty($userList)) {
                                    
                                ?>
                                <tr>
                                  <td><?=$i;?></td>

                                  <td><?=$row['username']?></td>
                                  <td><?=ucwords($row['birthplace']. ' / '.date('D, d m Y', strtotime($row['birthdate'])))?></td>
                                  <td><?=ucwords($row['fname'].' '.$row['lname'])?></td>
                                  <td style="font-size: 13px;"><?=$row['alamat']?></td>
                                  <td><?=$row['email']?></td>
  
                                  <td><?=($row['level'] == 1 ? 'Member' : ( $row['level'] == 2 ? 'Arsitek'  : 'Tukang' ))?></td>   
                                  <td><?=($row['logged_in'] == 1 ? '<b style="color : green">Online</b>'   : '<b style="color:grey">Offline<b>' )?></td>   

                                  <td class="project-actions">
                                    <button type="button" class="viewuserbtn btn btn-success btn-sm" data-toggle="modal" data-target="#viewUser">
                                        <i class="fas fa-user"></i> View
                                    </button>
                                    <!-- <button type="button" class="editbtn btn btn-info btn-sm" data-id="<?=$row['id']?>">
                                      <i class="fas fa-pencil-alt"></i> Edit
                                    </button> -->
                                    <button type="button" class="deleteuserbtn btn-danger btn-sm" data-id="<?=$row['id']?>" data-url="<?=base_url('admin/deleteuser/'.$row['id'])?>">
                                      <i class="fas fa-trash"></i> Delete
                                    </button>
                                  </td>
                                </tr>
                                <?php } ?>
                            <?php $i++;}?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>              
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </section>
    <!-- Modal -->
    <div class="modal fade" id="viewUser" tabindex="-1" role="dialog" aria-labelledby="viewUserLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewInvoiceLabel">Detail User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="viewUserContent" class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addUserModalLabel">Tambah User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="addUserModalContent" class="modal-body">
            <div class="signup-form">
              <form action="<?=base_url('admin/adduser')?>" method="POST">


                <div class="form-inline">
                  <div class="form-group">
                      <input type="text" class="form-control" name="fname" placeholder="First Name" required="required">
                      <span style="margin-left: 10px"></span>
                      <input type="text" class="form-control" name="lname" placeholder="Last Name" required="required">
                  </div>          
                </div>
                <br>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
                </div>   
                <div class="form-group">
                  <select class="form-control" name="level" required>
                    <option value="2">Arsitek</option>
                    <option value="3">Tukang</option>
                  </select>
                </div>  
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Tambah User</button>
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.row -->
