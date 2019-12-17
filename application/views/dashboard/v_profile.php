            <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12" style="width: 100%;">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                           <?php foreach ($userdata as $row) {?>

                              <img class="img-circle img-responsive" alt="" src="<?= ( empty($row['photopath']) || $row['photopath'] === '') ? 'http://placehold.it/300x300' : base_url($row['photopath'])?>">

                           <?php 
                              if($this->session->userdata('username') !== '' && $this->session->userdata('username') === $uname){
                           ?>
                              <a href="<?=base_url('dashboard/edit_profile')?>"> 
                                 <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-success" type="button"><i class="fa fa-edit"></i> Edit Profile</button>
                              </a>

                              <a href="<?=base_url('dashboard/change_password')?>"> 
                                 <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-success" type="button"><i class="fa fa-edit"></i> Ubah Password</button>
                           <?php
                              }
                           ?>
                              </a>
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
               <div class="bs-callout bs-callout-danger">
                  <div class="row" style="margin-left: 0px;">
                     <h4 style="margin-right: 10px;">Portofolio</h4>
                     <?php if($this->session->userdata('username') !== '' && $this->session->userdata('username') === $uname){?>
                     <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addPortofolio">Tambah Portofolio</button> 
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
                                 <div class="form-group">
                                    <label>Judul</label>
                                    <input class="form-control" type="text" name="title" required="">
                                 </div>
                                 <div class="form-group">
                                    <label>Gambar</label>
                                    <input class="form-control" type="file" name="img_url" accept="image/x-png,image/gif,image/jpeg" required="">
                                 </div>
                                 <div class="form-group">
                                    <label>Konten</label>
                                    <textarea id="summernote" class="form-control" name="content" style="min-height: 300px">
                                       
                                    </textarea>
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
                  <?php if(!empty($portofolio)){?>
                     
                  <?php }else{?> 
                  <div class="bs-callout bs-callout-danger">
                     <p><em><small>Belum ada Portofolio</small></em></p>
                  </div>
                  <?php }?> 
               </div>    
         </div>