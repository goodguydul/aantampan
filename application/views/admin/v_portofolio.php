<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Portofolio</h1>
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
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="sale_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Desain</th>
                                    <th>Judul</th>
                                    <th>Author</th>
                                    <th>Related Author</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                              foreach ($portofolioList as $row) { ?>
                                <?php if (!empty($portofolioList)) {
                                    
                                ?>
                                <tr>
                                  <td><?=$i;?></td>

                                  <td><?=$row['id_port']?></td>
                                  <td><?=$row['title']?></td>
                                  <td><?=ucwords($row['arsitek'])?></td>
                                  <td><?=ucwords($row['tukang'])?></td>
                                  <td><?= "Rp " . number_format($row['harga'],2,',','.')?></td>   
                                  <td><?=($row['status_moderasi'] == 1 ? '<b style="color : green">Disetujui</b>' : ( $row['status_moderasi'] == 2 ? '<b style="color : red">Dibatalkan</b>'  : '<b style="color : orange">Menunggu Persetujuan</b>' ))?></td>   

                                  <td class="project-actions">
                                    <button type="button" class="viewpostbtn btn btn-success btn-sm" data-toggle="modal" data-target="#viewInvoice">
                                        <i class="fas fa-user"></i> View
                                    </button>
                                    <!-- <button type="button" class="editbtn btn btn-info btn-sm" data-id="<?=$row['id']?>">
                                      <i class="fas fa-pencil-alt"></i> Edit
                                    </button> -->
                                    <button type="button" class="deletepostbtn btn-danger btn-sm" data-id="<?=$row['id_port']?>" data-url="<?=base_url('admin/delete_portofolio/'.$row['id_port'])?>">
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
    <div class="modal fade" id="viewInvoice" tabindex="-1" role="dialog" aria-labelledby="viewInvoiceLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="viewInvoiceLabel">Detail Portofolio</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div id="viewInvoiceContent" class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>
<!-- /.row -->
