<div class="container">
    <div class="row form-janjitemu">
        <form action="<?=base_url('home/make_appointment/'.$uname)?>" method="POST">
            <h3 class="text-center">Buat Janji Temu</h3>
            <hr>
            
            <p class="text-center"><?=$this->session->flashdata('status');?></p>
            <div class="col-md-6 col-xs-12">
                    <h4>Pembuat</h4>
                    <?php foreach ($userdata as $row) {?>
                        <input type="text" name="user_id" value="<?=$row['id']?>" hidden>
                        <table class="table table-hover">

                            <tr>
                                <td style="width: 80px;"> <i class="fa fa-user"></i> Nama </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <?=ucwords($row['fname'] .' '. $row['lname']);?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-home"></i> Alamat </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <?=ucwords($row['alamat']);?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-calendar"></i> Tempat, Tanggal Lahir </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <?=ucwords($row['birthplace'] .', '. date('D, d M Y',strtotime($row['birthdate'])));?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-user"></i> E-mail </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <?=$row['email'];?>
                                    </p>
                                </td>
                            </tr>
                        </table>
                        <?php }?>
            </div>

            <div class="col-md-6 col-xs-12" style="border-left: 1px solid grey">
                    <h4>Penerima</h4>
                    <?php foreach ($sianu as $row) {?>
                        <?php $sianu_id = $row['id'];?>
                        <input type="text" name="sianu_id" value="<?=$row['id']?>" hidden>
                        <table class="table table-hover">
                            <tr>
                                <td> <i class="fa fa-user"></i> Nama
                                    <?=ucwords($type);?>
                                </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <?=ucwords($row['fname'] .' '. $row['lname']);?>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-user"></i> Pilih Tanggal </td>
                                <td>:</td>
                                <td>
                                    <input class="form-control" type="date" name="tanggal" min="<?php echo date('Y-m-d'); ?>" required />
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-user"></i> Pilih Jam </td>
                                <td>:</td>
                                <td>
                                    <select class="form-control" name="waktu" required>
                                    <?php foreach ($timerange as $row => $val) {?>
                                        <option value="<?=date('H:i:s',strtotime($val))?>" ><?=$val?></option>
                                    <?php  }?>   
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-user"></i> Tempat </td>
                                <td>:</td>
                                <td>
                                    <input class="form-control" type="text" name="tempat" required />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td></td>
                                <td class="text-right">
                                    <button class="btn btn-md btn-danger" type="reset" style="width:100px">Batal</button>
                                    <button class="btn btn-md btn-primary" type="button" style="width:100px" data-toggle="modal" data-target="#cekjadwal">Cek Jadwal</button>
                                    <button class="btn btn-md btn-success" type="submit" style="width:100px">Buat</button>
                                </td>
                            </tr>
                        </table>
                        <?php }?>
            </div>
        </form>
    </div>
    <hr>
    <div id="cekjadwal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cek Jadwal</h4>
                </div>
                <div class="modal-body">
                    <form id="checkjadwal"  method="POST">
                        <div class="form-inline">
                            <label>Cari Tanggal : </label>                    
                            <input class="form-control" type="date" name="checkdate" required="" style="max-width: 200px" min="<?=date('Y-m-d')?>">
                            <input type="text" name="id" value="<?=$sianu_id?>" hidden>

                            <button class="btn btn-md btn-success" type="submit">Cek Tanggal</button>
                        </div>

                        <h3 class="text-center"></h3>
                        <hr>
                        <p class="text-center"><?=$this->session->flashdata('status');?></p>
                        <table  class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Jam</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="listjadwal">
                                
                            </tbody>
                        </table>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>