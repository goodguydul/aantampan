<body class="home">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
           <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#headnav">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Griya Bangun Asri</a>
            </div>
            <div class="collapse navbar-collapse" id="headnav">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?=base_url('home')?>">Beranda</a></li>
                    <li><a href="<?=base_url('home/about')?>">Tentang</a></li>
                    <li><a href="#">Harga & Prosedur</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Karir</a></li>
                    <li><hr class="hr"></li>

                    <?php if($this->session->userdata('username') == ''){?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Masuk</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?=base_url('login/register')?>"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
                            <li><a href="<?=base_url('login')?>"><span class="glyphicon glyphicon-log-in"></span> Masuk</a></li>
                        </ul>
                    </li>
                    <?php }else {?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Hello, <?=$this->session->userdata('username')?></a>
                        <ul class="dropdown-menu">
                            <?php if($this->session->userdata('roles')=='0'){?>
                                <li><a href="<?=base_url('admin')?>"><span class="glyphicon glyphicon-folder-close"></span>  Admin Dashboard</a></li>
                            <?php } ?>

                            <li><a href="<?=base_url('dashboard/profile')?>"><span class="glyphicon glyphicon-user"></span>  Profile</a></li>
                            <li><a href="<?=base_url('login/logout')?>"><span class="glyphicon glyphicon-log-in"></span>  Keluar</a></li>
                        </ul>
                    </li>

                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav> 
    <div class="container">
