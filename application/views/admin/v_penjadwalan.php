<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Penjadwalan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('auth')?>">Home</a></li>
                        <li class="breadcrumb-item active">Penjadwalan</li>
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
                        <h5>Jadwal Janji Temu User</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="sale_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Janji</th>
                                    <th>Tanggal Janji</th>
                                    <th>Jam</th>
                                    <th>Pembuat Janji</th>
                                    <th>Penerima Janji</th>
                                    <th>Status Janji</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                              foreach ($appointmentList as $row) { ?>
                                <?php if (!empty($appointmentList)) {
                                    
                                ?>
                                <tr>
                                  <td><?=$i;?></td>

                                  <td><?=$row['id_janji']?></td>
                                  <td><?=date('D, d M Y',strtotime($row['tanggal']))?></td>
                                  <td><?=date('h:i',strtotime($row['waktu']))?></td>
                                  <td><?=ucwords($row['pembuat'])?></td>
                                  <td><?=ucwords($row['penerima'])?></td>
                                  <td><?=($row['statusjanji'] == 1)? '<b style="color : green">Telah Selesai</b>' : ($row['statusjanji'] == 2)? '<b style="color : red">Dibatalkan</b>': '<b style="color : orange">Menunggu Persetujuan</b>' ?></td>    
                                  <td class="project-actions">
                                    <button type="button" class="viewJanjibtn btn btn-success btn-sm" data-id="<?=$row['id_janji']?>" data-pembeliid="<?=$row['user_id']?>" data-penjualid="<?=$row['sianu_id']?>"  data-toggle="modal" data-target="#viewInvoice">
                                        <i class="fas fa-user"></i> View
                                    </button>
                                    <!-- <button type="button" class="editbtn btn btn-info btn-sm" data-id="<?=$row['id']?>">
                                      <i class="fas fa-pencil-alt"></i> Edit
                                    </button> -->
                                    <button type="button" class="deleteJanjibtn btn-danger btn-sm" data-id="<?=$row['id_janji']?>" data-url="<?=base_url('admin/cancel_appointment/'.$row['id_janji'])?>">
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
            <h5 class="modal-title" id="viewInvoiceLabel">Detail Invoice</h5>
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
