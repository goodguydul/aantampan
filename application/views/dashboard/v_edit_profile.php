            <div class="panel panel-default">
               <div class="panel-heading resume-heading">
                  <div class="row">
                     <div class="col-lg-12" style="width: 100%;">
                        <div class="col-xs-12 col-sm-4">
                           <figure>
                           <?php foreach ($userdata as $row) {?>

                              <img class="img-circle img-responsive" alt="" src="<?= ( empty($row['photopath']) || $row['photopath'] === '') ? 'http://placehold.it/300x300' : base_url($row['photopath'])?>">
                              <form action="<?=base_url('dashboard/upload_photo')?>" method="post" enctype="multipart/form-data" >
                                 <div class="form-group" style="margin:10px 10px 10px 0px;">
                                    <input class="form-control" type="file" name="photopath" accept="image/x-png,image/gif,image/jpeg">
                                    <button type="submit" style="margin-top:5px;width: 100%" class="btn btn-success"><i class="fa fa-upload"></i> Upload Photo</button>
                                 </div>
                              </form>
                           </figure>
                        </div>
                        <div class="col-xs-12 col-md-8">
                           <?=$this->session->flashdata('status');?>
                           <form action="<?=base_url('dashboard/update_profile')?>" method="POST">
                              <ul class="list-group">
                                    <li class="list-group-item">
                                       <div class="form-inline">
                                          <i class="fa fa-user" > </i>
                                          <input class="form-control" type="text" name="fname" value="<?= $row['fname'];?>" placeholder="Nama Depan" required>
                                          <input class="form-control" type="text" name="lname" value="<?= $row['lname'];?>" placeholder="Nama Belakang" required>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="form-inline">
                                          <i class="fa fa-home" ></i> 
                                           <textarea class="form-control" name="alamat" placeholder="Alamat" required><?= $row['alamat'];?></textarea> 
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="form-inline">
                                          <i class="fa fa-calendar" > </i>
                                          <input class="form-control" type="text" name="birthplace" value="<?= $row['birthplace'];?>" placeholder="Tempat Lahir" required>

                                          <input class="form-control" type="date" name="birthdate" value="<?= $row['birthdate'];?>" required>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="form-inline">
                                          <i class="fa fa-phone" > </i>
                                          <input class="form-control" type="tel" name="nohp" value="<?= $row['nohp'];?>" placeholder="No. HP" required pattern="[0-9]{11,14}">
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="form-inline">
                                          <i class="fa fa-envelope" > </i>
                                          <input class="form-control" type="email" name="email" value="<?= $row['email'];?>" placeholder="Email" required>
                                       </div>                                
                                    </li>
                                 <?php }?>
                              </ul>
                              <button class="btn btn-success" style="width: 100%" type="submit">Save Data</button>
                           </form>
                          
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="bs-callout bs-callout-danger">
                  <h4>Summary</h4>
                  <p>
                     Lorem ipsum dolor sit amet, ea vel prima adhuc, scripta liberavisse ea quo, te vel vidit mollis complectitur. Quis verear mel ne. Munere vituperata vis cu, 
                     te pri duis timeam scaevola, nam postea diceret ne. Cum ex quod aliquip mediocritatem, mei habemus persecuti mediocritatem ei.
                  </p>
                  <p>
                     Odio recteque expetenda eum ea, cu atqui maiestatis cum. Te eum nibh laoreet, case nostrud nusquam an vis. 
                     Clita debitis apeirian et sit, integre iudicabit elaboraret duo ex. Nihil causae adipisci id eos.
                  </p>
               </div>
               <div class="bs-callout bs-callout-danger">
                  <h4>Research Interests</h4>
                  <p>
                     Software Engineering, Machine Learning, Image Processing,
                     Computer Vision, Artificial Neural Networks, Data Science,
                     Evolutionary Algorithms.
                  </p>
               </div> -->
            </div>
         </div>