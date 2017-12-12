<?php
  include_once('layout/wrapper.php');
 ?>
 <?php
// Proteksi halaman
    $this->simple_login->cek_login();
  ?>
  <?php
    include_once('layout/sidebar.php');
   ?>
   <div class="col-sm-4">
     <div class="signup-form"><!--sign up form-->
       <h2>Editprofile</h2>

            <form role="form" enctype="multipart/form-data" action="<?php echo site_url('Editprofile/aksi_update')?>" method="post">
                        <?php $result = $ups->result();?>
                        <div class="form-group">
                          <a align="center" href="#">
                            <?php $id = $this->session->userdata('id_user');
                            foreach($this->M_editprofile->per_id($id) as $q){
                              $gambar = $q->profile_picture;
                            }
                            ?>
                              <img class="media-object" style="width:250px" src="<?php echo base_url('fotouser').'/'.$gambar?>" alt="">
                          </a>
                          <input type="file" class="form-control" rows="1" name="profile_picture" value="<?php $id = ucfirst($this->session->userdata('id_user'));
                          foreach($this->M_editprofile->per_id($id) as $q){
                            echo $q->profile_picture;
                          } ?>"></input>
                            <br><label for="nama">Nama</label>
                            <input type="text" class="form-control" rows="1" name="nama_lengkap"
                            value="<?php $id = ucfirst($this->session->userdata('id_user'));
                            foreach($this->M_editprofile->per_id($id) as $q){
                              echo $q->nama_lengkap;
                            } ?>"></input><br>
                            <label for="email">email</label>
                            <input type="text" class="form-control" name="email" rows="10"
                            value="<?php $id = ucfirst($this->session->userdata('id_user'));
                            foreach($this->M_editprofile->per_id($id) as $q){
                              echo $q->email;
                            } ?>"></input><br>
                            <input type="hidden" name="id_user" value="<?php echo ucfirst($this->session->userdata('id_user')); ?>"></input><br>
                        </div>
                        <input type="submit" name="postingf" placeholder="Kirim" class="btn btn-primary"></input>
                    </form>
                  </div>
                </div>
                </section>
                <?php
                  include_once('layout/footer.php');
                 ?>
