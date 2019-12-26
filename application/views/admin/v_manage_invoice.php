<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manage Invoice</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('auth')?>">Home</a></li>
                        <li class="breadcrumb-item active">Invoice</li>
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
                        <h5>Invoice Yang Belum Divalidasi</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="sale_list" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Order ID</th>
                                    <th>Tanggal Invoice</th>
                                    <th>No. Invoice</th>
                                    <th>Nama Portofolio</th>
                                    <th>Pembeli</th>
                                    <th>Author</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1;
                              foreach ($paidDesign as $row) { ?>
                                <?php if (!empty($paidDesign)) {
                                    
                                ?>
                                <tr>
                                  <td><?=$i;?></td>

                                  <td><?=$row['id']?></td>
                                  <td><?=date('D, d M Y',strtotime($row['invoicedate']))?></td>
                                  <td><?=$row['no_invoice']?></td>
                                  <td><?=$row['title']?></td>
                                  <td><?=ucwords($row['pembeli'])?></td>
                                  <td><?=ucwords($row['penjual'])?></td>
                                    

                                  <td class="project-actions">
                                    <button type="button" class="viewbtn btn btn-info btn-sm" data-id="<?=$row['id']?>" data-pembeliid="<?=$row['id_user']?>" data-penjualid="<?=$row['id_sianu']?>"  data-toggle="modal" data-target="#viewInvoice">
                                        <i class="fas fa-user"></i> Lihat
                                    </button>
                                    <button type="button" class="validatebtn btn btn-success btn-sm" data-id="<?=$row['no_invoice']?>" data-url="<?=base_url('admin/validate_invoice/'.$row['no_invoice'])?>">
                                      <i class="fas fa-check"></i> Validasi
                                    </button>
                                    <button type="button" class="deletebtn btn-danger btn-sm" data-id="<?=$row['id']?>" data-url="<?=base_url('admin/delete_invoice/'.$row['id'])?>">
                                      <i class="fas fa-trash"></i> Hapus
                                    </button>
                                  </td>
                                </tr>
                                <?php } else{?>
                                  <tr>
                                    <td colspan="8">
                                      <p><em>Belum ada Data</em></p>
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
