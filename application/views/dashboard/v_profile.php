            <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12" style="width: 100%;">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                           <?php foreach ($userdata as $row) {
                              $id = $row['id'];
                              ?>

                              <img class="img-circle img-responsive" alt="" src="<?= ( empty($row['photopath']) || $row['photopath'] === '') ? 'http://placehold.it/300x300' : base_url($row['photopath'])?>">

                           <?php 
                              if($this->session->userdata('username') !== '' && $this->session->userdata('username') === $uname){
                           ?>
                              <a href="<?=base_url('dashboard/edit_profile')?>"> 
                                 <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-success" type="button"><i class="fa fa-edit"></i> Edit Profile</button>
                              </a>

                              <a href="<?=base_url('dashboard/change_password')?>"> 
                                 <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-success" type="button"><i class="fa fa-edit"></i> Ubah Password</button>
                           
                              </a>
                              <?php
                              }
                           ?>
                           </figure>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <?=$this->session->flashdata('status');?>
                           <ul class="list-group">
                              <li class="list-group-item"><i class="fa fa-user"></i> <?= ucwords($row['fname'] .' '. $row['lname']);?></li>
                              <li class="list-group-item"><i class="fa fa-home"></i> <?= ucwords($row['alamat']);?></li>
                              <li class="list-group-item"><i class="fa fa-calendar"></i> <?= ucwords($row['birthplace'] . ', ' . date('D, d M Y', strtotime($row['birthdate'])));?></li>
                              <li class="list-group-item"><i class="fa fa-phone"></i> <?= $row['nohp'];?></li>
                              <li class="list-group-item"><i class="fa fa-envelope"></i> <?= $row['email'];?></li>
                           <?php }?>
                           </ul>
                           <?php if($this->session->userdata('username') !== '' && $this->session->userdata('username') !== $uname){
                           ?>
                           <a href="<?=base_url('home/make_appointment/'.$uname);?>"> 
                              <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-success" type="button"><i class="fa fa-notes"></i> Buat Janji Temu</button>
                           </a>
                           <?php
                             }
                           ?>
                        </div>
                     </div>
                  </div>
               </div>  
            </div>
            <hr>
            <?php if($level != 1 ){?>
               <div class="bs-callout bs-callout-danger">
                  <div class="row" style="margin-left: 0px;">
                     <h4 style="margin-right: 10px;">Portofolio</h4>
                     <?php if($this->session->userdata('username') !== '' && $this->session->userdata('username') === $uname ){?>
                     <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addPortofolio"><i class="fa fa-plus"></i> Tambah Portofolio</button> 
                     <div id="addPortofolio" class="modal fade" role="dialog">
                        <div class="modal-dialog" >

                         <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal">&times;</button>
                             <h4 class="modal-title">Tambah Portofolio</h4>
                           </div>
                           <div class="modal-body">
                              <form class="form" action="<?=base_url('dashboard/add_portofolio')?>" method="POST" enctype="multipart/form-data">
                                 <div class="form-inline"> 
                                    <div class="form-group">
                                       <label style="width: 100px;">Judul :</label>
                                       <input class="form-control" type="text" name="title" required="">
                                    </div>
                                    <hr>
                                    <div class="form-group">                                       
                                       <label style="width: 100px;">Gambar :</label>
                                       <input class="form-control" type="file" name="img_url" accept="image/x-png,image/gif,image/jpeg" required="">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                       <label style="width: 100px;">Tukang : </label>
                                       <select class="form-control" name="related_id" required="">
                                       <option disabled selected></option>
                                          <?php foreach ($listtukang as $row) { ?>
                                          <option value="<?=$row['id']?>"><?=ucwords($row['fname'].' '.$row['lname'])?></option>
                                       <?php }?>
                                       </select>
                                    </div>  
                                    <hr>
                                    <label>Ukuran Tanah :</label>
                                    <div class="form-group">
                                       <label style="width: 100px;">Panjang</label>
                                       <input class="form-control" style="max-width: 70px;margin-right: 10px;" type="number" name="panjang" required="">
                                       <label style="width: 100px;">Lebar</label>
                                       <input class="form-control" style="max-width: 70px;margin-right: 10px;" type="number" name="lebar" required="">
                                    </div>  
                                    <hr>
                                    <div class="form-group">
                                       <label style="width: 100px;">Luas Bangunan :</label>
                                       <input class="form-control" style="max-width: 70px;margin-right: 10px;" type="number" name="lb" required="">
                                    </div>
                                    <hr>
                                    <label>Jumlah </label>
                                    <br>
                                    <div class="form-group">
                                       <label style="width: 100px;">Kamar Tidur : </label>
                                       <input class="form-control" style="max-width: 70px;margin-right: 10px;" type="number" name="kt" required="">
                                       <label style="width: 100px;">Kamar Mandi :</label>
                                       <input class="form-control" style="max-width: 70px;margin-right: 10px;" type="number" name="km" required="">  
                                       <label style="width: 100px;">Kamar Tamu :</label>
                                       <input class="form-control" style="max-width: 70px;margin-right: 10px;" type="number" name="ktm" required="">
                                    </div>
                                    <hr>  
                                    <div class="form-group"> 
                                       <label style="width: 140px;">Jumlah Mobil Yang Bisa Ditampung :</label>
                                       <input class="form-control" style="max-width: 70px;" type="number" name="garasi" required="">
                                    </div> 
                                    <hr> 
                                    <div class="form-group">
                                       <label style="width: 140px;">Harga</label>
                                       Rp. <input class="form-control" style="max-width: 170px;" type="number" name="harga" required="">
                                    </div> 
                                 </div>
                                                  
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                             <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</button>

                           </div>
                              </form>
                         </div>

                        </div>
                     </div>
                     <?php }?>
                  </div>   
                  <hr> 
                  <?php if(!empty($portofolio)){ ?>
                        
                     <?php foreach ($portofolio as $key) {?>
                        
                        <div class="wrap">
                           <div class="cardx">
                                <div class="card-liner">
                                    <figure><img src="<?=base_url($key['img_url'])?>" alt="" /> </figure>
                                    <div class="card--title">
                                        <h3><?=$key['title']?></h3>
                                        <p></p>
                                    </div>
                                    <div class="card--btn">
                                        <a href="<?=$key['url']?>">
                                            <span class="moreinfo"><i class="fa fa-info-circle"></i> More Info</span>
                                            <span class="fullprof">Lihat Portofolio</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <?php }

                     }else{?> 
                  
                     <p><em><small>--- Belum ada Portofolio</small></em></p>

                  <?php }?> 
               </div>
               <?php?>
            <?php }elseif($this->session->userdata('username') === $uname && $level != 1 ){?>
               <div class="bs-callout bs-callout-danger">
                  <h4 style="margin-right: 10px;">Daftar Janji Temu</h4>
                         
                     <form id="checkjadwal"  method="POST">
                        <div class="form-inline">
                            <label>Cari Tanggal : </label>                    
                            <input class="form-control" type="date" name="checkdate" required="" style="max-width: 200px" min="<?=date('Y-m-d')?>" value="<?=date('Y-m-d')?>" >
                            <input type="text" name="id" value="<?=$id?>" hidden>

                            <button class="btn btn-md btn-success" type="submit">Cek Tanggal</button>
                        </div>
                        <hr>
                        <div style="max-height: 300px">
                           <table  class="table table-hover">
                              <thead>
                                   <tr>
                                       <th>Jam</th>
                                       <th>Pelanggan</th>
                                   </tr>
                               </thead>
                               <tbody id="listjadwal">
                                   
                               </tbody>
                           </table>
                        </div>
                        
                    </form>
               </div>  
            <?php }else{?>

              <div class="tab bs-callout bs-callout-danger" style="padding: 0px">
                <button class="tablinks" onclick="openMenu(event, 'Appointment')">Daftar Janji Temu</button>
                <button class="tablinks" onclick="openMenu(event, 'Invoice')">Daftar Invoice</button>
              </div>
              <div id="Appointment" class="tabcontent bs-callout bs-callout-danger">
                <h4 style="margin-right: 10px;">Daftar Janji Temu Yang Telah Dibuat</h4>
                <hr>
                <table class="table table-hover">
                  <thead>
                    <th class="text-center">No.</th>
                    <th class="text-center">Tanggal</th>
                    <th class="text-center">Jam</th>
                    <th class="text-center">Tempat</th>
                    <th class="text-center">Arsitek/Tukang</th>
                    <th class="text-center">Aksi</th>

                  </thead>
                  <tbody>
                <?php 
                if (empty($listjadwal)) {?>
                    <tr class="text-center">
                      <td colspan="6"> <em>Belum ada Janji Temu</em></td>
                    </tr>    
                <?php 
                }else{
                  $i = 1;
                  foreach ($listjadwal as $row) { ?>
                    <tr class="text-center">
                      <td><?=$i?></td>
                      <td><?=date('D, d M Y',strtotime($row['tanggal']))?></td>
                      <td><?=date('h:i',strtotime($row['waktu']))?></td>
                      <td><?=$row['tempat']?></td>
                      <td><?= ucwords($row['fname'] .' '. $row['lname']);?></td>
                      <td><a href="<?=base_url('home/cancel_appointment/'.$row['id_janji'])?>"><button class="btn btn-danger btn-sm">Batalkan</button></a></td>
                    </tr>      
                <?php $i++; }
                } 
                ?>
                  </tbody>
                </table> 
              </div>
              <div id="Invoice" class="tabcontent bs-callout bs-callout-danger">
                <h4 style="margin-right: 10px;">Invoices</h4>
                <hr>
                <table class="table table-hover">
                  <thead>
                    <th class="text-center">No. Invoice</th>
                    <th class="text-center">Tanggal Order</th>
                    <th class="text-center">No. Produk</th>
                    <th class="text-center">Nama Produk</th>
                    <th class="text-center">Harga</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                  </thead>
                  <tbody> 
                <?php 
                if (empty($invoices)) {?>
                    <tr class="text-center">
                      <td colspan="6"> <em>Belum ada Invoice</em></td>
                          
                    </tr>    
                <?php 
                }else{
                  foreach ($invoices as $row) { ?>
                    <tr class="text-center">
                      <td><?=$row['no_invoice']?></td>
                      <td><?=date('D, d M Y',strtotime($row['invoicedate']))?></td>
                      <td><?=$row['id_post']?></td>
                      <td><?=$row['title']?></td>
                      <td><?= "Rp " . number_format($row['harga'],2,',','.');?></td>
                      <td><?=($row['status'] == 0 )? '<span style="color:red">Menunggu</span>' : (($row['status'] == 1)? '<span style="color:green">Lunas</span>' : '') ?></td>
                      <td><?=($row['status'] == 0 )? '<a href="'.base_url('home/konfirmasi/'.$row['no_invoice']).'"><button class="btn btn-warning btn-sm" type="button">Bayar</button></a>' : (($row['status'] == 1)? '' : '') ?></td>
                    </tr>      
                <?php 
                  }
                } 
                ?>
                  </tbody>
                </table> 
              </div>

            <?php }?> 
          </div>
