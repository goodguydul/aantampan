        <div class="rows rows">
            <div class="col-xs-4" id="list-cari" style="border:10px">
                <p style="margin-bottom: 35px"><b>Apa yang Anda cari?</b></p>
                <ul class="list-group">
                    <li class="list-group-item list-cari-item"><a href="#">Arsitek</a></li>
                    <li class="list-group-item list-cari-item"><a href="#">Desain Rumah</a></li>
                    <li class="list-group-item list-cari-item"><a href="#">Desain Villa</a></li>
                    <li class="list-group-item list-cari-item"><a href="#">Tukang Bangunan</a></li>
                </ul>
            </div>
            <div class="col-xs-8 search-content">
                <div class="kolom-pencarian">
                    <form id="caribenda" method="POST">
                        <div class="form-group pencariandiv">
                            <input class="form-control caribenda" type="text" name="search" placeholder="Cari...">
                            <button class="btn btn-sm btn-success">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="search-items">
                    <?php foreach ($contents as $row) {?>

                        <div class="card bg-light">
                            <div class="card-header text-muted border-bottom-0">
                              <?=($row['level'] == '2' ? 'Arsitek' : ($row['level'] == '3' ? 'Tukang' : ''))?>
                            </div>
                            <div class="card-body pt-0">
                              <div class="row">
                                <div class="col-xs-7">
                                  <h2 class="lead"><?=ucwords($row['fname'].' '.$row['lname'])?></h2>
                                  <hr>
                                  <ul class="ml-4 mb-0 fa-ul text-muted" style="">
                                    <li class="small"> 
                                        <span class="fa-li">
                                            <i class="fa fa-building"></i>
                                        </span>
                                        <?=ucwords($row['alamat'])?>
                                    </li>
                                    <li class="small">
                                        <span class="fa-li">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <?=ucwords($row['nohp'])?>
                                    </li>
                                  </ul>
                                </div>
                                <div class="col-xs-5 text-center">
                                  <img src="<?=($row['photopath'] !== null || !empty($row['photopath'])  ? base_url(str_replace('./','',$row['photopath'])) : base_url('assets/img/img_avatar.png'));?>" alt="" class="img-circle img-fluid">
                                </div>
                              </div>
                            </div>
                            <div class="card-footer">
                              <div class="text-right">
                                <a href="<?=base_url('home/profile/'.$row['username'])?>" class="btn btn-sm btn-primary">
                                  <i class="fa fa-user"></i> View Profile
                                </a>
                              </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>

                <hr>
                
          </div>
    </div>