
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php foreach ($this->c->getkategori() as $key) {
								?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#<?php echo ($key->id_kategori)?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<a href="<?php echo base_url()?>kategori/per_kategori/<?php echo ($key->id_kategori)?>"><?php echo ($key->nama_kategori)?></a>
										</a>
									</h4>
								</div>
								<div id="<?php echo ($key->id_kategori)?>" class="panel-collapse collapse">
								<?php
								$ki = ($key->id_kategori);
								 foreach ($this->c->getsubkategori($ki) as $ky) {
									 	$ko = ($ky->id_kategori);
								 }

								 if ($ko == $ki) {?>
									 <div class="panel-body">
										 <?php foreach ($this->c->getsubkategori($ki) as $ky) {
											 ?>
										 <ul>
											 <li><a href="<?php echo base_url()?>kategori/per_subkategori/<?php echo ($ky->id_sub_kategori)?>"><?php echo ($ky->nama_sub_kategori);?></a></li>
										 </ul>
										 <?php } ?>
									 </div>
								<?php }
									else if($ki != $ko){
										?>
										<div class="panel-body">
											<?php foreach ($this->c->getsubkategori($ki) as $ky) {
												?>
											<ul>
												<li><a href="<?php echo base_url()?>kategori/per_kategori/<?php echo ($ky->id_sub_kategori)?>"><?php echo ($ky->nama_sub_kategori);?></a></li>
											</ul>
											<?php } ?>
										</div>
								<?php	}
								?>
							 </div>
							</div>
							<?php } ?>
						</div><!--/category-products-->

						<div class="shipping text-center">
							<!--<img src="<?php echo base_url()?>assets/images/home/2poster.jpg" width="270px" height="329px" alt="" />-->
							<form method="get" action="http://www.cekresi.com" target="_BLANK">
								<input type="text" placeholder="Masukkan no resi..." name="noresi" /><br><br>
								<input type="submit" value="cek resi" />
								<br /><a href="http://www.cekresi.com" target="_BLANK">www.cekresi.com</a>
							</form>
						</div>
						<br>
						<h2>Periksa Ongkir</h2>
				    <div data-theme="light" id="rajaongkir-widget"></div>
					</div>
				</div>
