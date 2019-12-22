<div class="container" style="margin-top:50px">
    <div class="row form-janjitemu">
            <h3 class="text-center">Detail Invoice</h3>
            <hr>
            
            <p class="text-center"><?=$this->session->flashdata('status');?></p>
            <div class="col-md-6 col-xs-12">
                    <h5><b style="width: 100px;display: inline-block;">No. Invoice </b>: <a href="<?=base_url('home/invoice/'.$noinvoice);?>"><?=$noinvoice;?></a></h5>
                    <h5><b style="width: 100px;display: inline-block;">Tanggal Invoice </b>: <?=date('D, d M y',strtotime(substr($noinvoice, 0,8)));?></h5>
                    <hr>
                    <?php foreach ($userdata as $row) {?>
                        <input type="text" name="id_user" value="<?=$row['id']?>" hidden>
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

            <div class="col-md-6 col-xs-12" style="border-left: 1px solid grey;">
                    <h4>Penerima</h4>
                    <?php foreach ($contents as $row) {?>                    
                        <table class="table table-hover">
                            <tr>
                                <td><i class="fa fa-book"></i> ID Desain :
                                </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <a href="<?=$row['url']?>"><?=$row['id_port'];?></a> 
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-user"></i> Arsitek/Desainer </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <a href="<?=base_url('home/profile/'.$row['username'])?>"><?=ucwords($row['fname'] .' '. $row['lname']);?></a> 
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-money"></i>  Harga</td>
                                <td>:</td>
                                <td>
                                   <p><?= "Rp " . number_format($row['harga'],2,',','.');?></p>
                                </td>
                            </tr>
                            <tr>
                                <td><i class="fa fa-warning"></i> Status : </td>
                                <td>:</td>
                                <td>
                                    <p><?= ($row['status']==1)? '<b style="color:green">Dibayar</b>': '<b style="color:red">Belum Dibayar</b>';?></p>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td></td>
                                <td class="text-right">
                                    <p><?= ($row['status']==1)? '': '<a href="'.base_url('home/konfirmasi/'.$noinvoice).'"><button class="btn btn-md btn-warning" type="button" style="width:100px">Bayar</button></a>';?></p>

                                    
                                </td>
                            </tr>
                        </table>
                        <?php }?>
            </div>
    </div>
    <hr>
    <div class="row form-janjitemu">
        <div class="col-xs-6 bs-callout bs-callout-danger">
            <h3>Catatan : </h3>
            <p style="font-size: 16px">
                Data Order akan dikirim ke e-mail Anda setelah Anda melakukan Pembelian.
            Segera lakukan pembayaran sesuai harga desain di atas.
            Kirim ke rekening developer <b>Griya Bangun Asri 555 222 906 1667 (BRI)</b>, lalu upload bukti transfer Anda pada menu Pembelian yang ada di halaman profil Anda. Apabila Anda tidak melakukan pembayaran dalam 3 hari, maka transaksi dianggap batal.</p>
        </div>
        
    </div>    
    

</div>