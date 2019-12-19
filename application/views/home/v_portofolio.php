            <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12" style="width: 100%;">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                           <?php foreach ($contents as $row) {?>

                              <img class="img img-responsive" alt="" src="<?= ( empty($row['img_url']) || $row['img_url'] === '') ? 'http://placehold.it/300x300' : base_url($row['img_url']);?>">

                           <?php 
                              if(empty($this->session->userdata('username')) || $this->session->userdata('username') !== $uname1 && $this->session->userdata('username') !== $uname2){
                           ?>
                              <a href="<?=base_url('home/beli/'.$row['id'])?>"> 
                                 <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-success" type="button"><i class="fa fa-edit"></i> Beli</button>
                              </a>

                              <a href="<?=base_url('home/profile/'.$row['tukang'])?>"> 
                                 <button style="margin:10px 10px 10px 0px;width: 100%" class="btn btn-warning" type="button"><i class="fa fa-edit"></i> Bangun Rumah</button>
                          
                              </a>
                               <?php
                              }
                           ?>
                           </figure>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                           <?=$this->session->flashdata('status');?>
                           <ul class="list-group">
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    ID Desain
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 
                                 <?= $row['id']?>
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Judul
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 
                                 <?= $row['title']?>
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Arsitek/ Designer
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <a href="<?=base_url('home/profile/'.$row['arsitek'])?>"><?= ucwords($row['namaarsitek']);?></a> 
                                    
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Tukang Bangunan
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <a href="<?=base_url('home/profile/'.$row['tukang'])?>"><?= ucwords($row['namatukang']);?></a> 
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Ukuran Tanah
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <?= $row['panjang']?>m x <?= $row['lebar'];?>m
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Luas Bangunan
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <?= $row['lb']?>m
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Jumlah Kamar Tidur
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <?= $row['kt']?>
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Jumlah Kamar Mandi
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <?= $row['km']?>
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Jumlah Kamar Tamu
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <?= $row['ktm']?>
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6" style="font-size: 12px;">
                                    Kapasitas Garasi (Mobil)
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <?= $row['garasi']?>
                                 
                              </li>
                              <li class="list-group-item">
                                 <span class="col-xs-6">
                                    Harga
                                 </span>
                                 <span style="margin-right: 5px">
                                    :
                                 </span>
                                 <b><?= "Rp " . number_format($row['harga'],2,',','.');?></b>
                                 
                              </li>
                           <?php }?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>  
            </div>
            <hr>
               <div class="bs-callout bs-callout-danger">
                  <div class="row" style="margin-left: 0px;">
                     <h4 style="margin-right: 10px;">Kelengkapan Desain</h4>
                     <hr>
                     <ul>
                        <li>
                           Konsep Denah 2D
                        </li>
                        <li>
                           Konsep Modeling 3D
                        </li>
                        <li>
                           Gambar Visual 3D
                        </li>
                        <li>
                           Rencana Anggaran Biaya
                        </li>
                        <li>
                           Gambar Teknis Arsitektur, Struktur & MEP (Mekanikal, Eletrikal, Plumbing)
                        </li>
                     </ul>
                  </div>   
                  
   
               </div>    
         </div>