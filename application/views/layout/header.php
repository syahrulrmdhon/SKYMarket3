<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-envelope"></i>admin@saidky.com</a></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?php echo base_url('Home')?>"><img width="250px" src="<?php echo base_url()?>assets/images/home/logo2.png" alt="" /></a>
                        </div>

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="<?php echo base_url()?>Editprofile/update/<?php echo ucfirst($this->session->userdata('id_user'));?>"> <?php
                                if ($this->session->userdata('email') == '') {
                                    echo " ";
                                } else {
                                    echo "<i class='fa fa-user'></i> ";
                                    echo ucfirst($this->session->userdata('nama_lengkap'));
                                }
                                ?> </a></li>
                                <li><a href="<?php echo base_url('wishlist')?>"><?php
                                if ($this->session->userdata('email') == '') {
                                    echo " ";
                                } else {
                                    $id_user = $this->session->userdata('id_user');
                                    $i = count($this->c->getwishlist($id_user));
                                    echo "<i class='fa fa-star'></i> Wishlist ($i)";
                                }
                                ?></a></li>
                                <li><a href="<?php echo base_url('Checkout')?>"><?php
                                if ($this->session->userdata('email') == '') {
                                    echo " ";
                                } else {
                                    echo "<i class='fa fa-crosshairs'></i> Checkhout";
                                }
                                ?></a></li>
                                <li><a href="<?php echo base_url('Cart')?>"><?php
                                if ($this->session->userdata('email') == '') {
                                    echo " ";
                                } else {
                                    $id_user = $this->session->userdata('id_user');
                                    $i = count($this->c->getcart($id_user));
                                    echo "<i class='fa fa-shopping-cart'></i> Keranjang ($i)";
                                }
                                ?></a></li>
                                <li><a href="<?php echo base_url('Login/logout') ?>" title="Logout"><i class="fa fa-lock"></i>
                                    <?php
                                    if ($this->session->userdata('email') == '') {
                                        echo "Masuk/Daftar";
                                    } else {
                                        echo "Keluar";
                                    }?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?php echo base_url('Home')?>" class="">Beranda</a></li>
                                <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                                                            <?php foreach ($this->c->getkategori() as $key) { ?>
                                        <li><a href="<?php echo base_url()?>kategori/per_kategori/<?php echo ($key->id_kategori)?>"><?php echo ($key->nama_kategori);?></a></li>
                                                                            <?php }?>
                                    </ul>
                                </li>
                                <li><a href="<?php echo base_url('Contact')?>">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <form action="<?php echo base_url()?>Home/cari" method="post">
                            <input type="text"  name="cari" placeholder="Search"/>
                            <button class="cart"type="submit" name="submit">Search</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
