<div class="container" style="margin-top:50px">
    <div class="row form-janjitemu">
        <form action="<?=base_url('home/beli/'.$id)?>" method="POST">
            <h3 class="text-center">Pembelian Desain</h3>
            <hr>
            
            <p class="text-center"><?=$this->session->flashdata('status');?></p>
            <div class="col-md-6 col-xs-12">
                    <h4>Order ID: <?=$orderid;?></h4>
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

            <div class="col-md-6 col-xs-12" style="border-left: 1px solid grey;">
                    <h4>Penerima</h4>
                    <?php foreach ($contents as $row) {?>

                        <input type="text" name="sianu_id" value="<?=$row['id_port']?>" hidden>
                        <table class="table table-hover">
                            <tr>
                                <td> <i class="fa fa-book"></i> ID Desain :
                                </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <a href="<?=$row['url']?>"><?=$row['id_port'];?></a> 
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td> <i class="fa fa-user"></i> Arsitek/Desainer </td>
                                <td>:</td>
                                <td>
                                    <p>
                                        <a href="<?=base_url('home/profile/'.$row['username'])?>"><?=ucwords($row['fname'] .' '. $row['lname']);?></a> 
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td>&nbsp;</td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>&nbsp;</td>
                                <td>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td></td>
                                <td class="text-right">
                                    <button class="btn btn-md btn-danger" type="reset" style="width:100px">Batal</button>

                                    <button class="btn btn-md btn-success" type="submit" style="width:100px">Beli</button>
                                </td>
                            </tr>
                        </table>
                        <?php }?>
            </div>
        </form>
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