<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SKY Market</title>
    <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/responsive.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/star-rating.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/css/star-rating.min.css" rel="stylesheet">

  <link href="<?php echo base_url()?>assets/css/style3.css" rel="stylesheet">
  <!--    <script src="<?php echo base_url()?>assets/js/html5shiv.js"></script> -->
  <!--  <script src="<?php echo base_url()?>assets/js/respond.min.js"></script> -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/sweetalert/sweetalert.css">

<script type="text/javascript" src="<?php echo base_url()?>assets/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed"
    href="<?php echo base_url()?>assets/images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->


        <div class="login-form">
         <img width="150px" src="<?php echo base_url()?>assets/images/home/logo2.png" alt="" />
         <?php
  // Cetak session
 if($this->session->flashdata('sukses')) {
   echo '<p class="warning" style="margin: 10px 20px;">'.$this->session->flashdata('sukses').'</p>';
 }
 // Cetak error
 echo validation_errors('<p class="warning" style="margin: 10px 20px;">','</p>');
 ?>
    	 <form id="regis"  action="<?php echo base_url('Register') ?>" method="post">
         <input type="hidden" name="id_user" value="<?php
         $kode = uniqid();
         $kode2="U".str_pad($kode,3,"0",STR_PAD_LEFT);
         echo $kode2;?>" placeholder="<?php echo $kode?>"/>
         <p>
         <div class="form-group ">
           <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama " id="nama_lengkap">
           <i class="fa fa-user"></i>
         </div>
         <div class="form-group ">
           <input type="text" name="email" class="form-control" placeholder="Email " id="email">
           <i class="fa fa-envelope-o fa-fw"></i>
         </div>
         <div class="form-group log-status">
           <input type="password" class="form-control" placeholder="Password" id="password" name="password">
           <i class="fa fa-lock"></i>
           <br>
           <div class="progress password-meter" id="passwordMeter">
                <div class="progress-bar"></div>
         </div>
         <div class="form-group log-status">
           <input type="password" class="form-control" placeholder="Konfirmasi Password" id="password_conf" name="password_conf">
           <i class="fa fa-lock"></i>
         </div>
          <span class="alert">Invalid Credentials</span>
          <input type="hidden" name="level" value="Member" placeholder="Member"/>
          <input type="hidden" name="profile_picture" value="akun.png" placeholder="Member"/>
          <input type="hidden" name="tanggal_daftar" value="<?php echo date('Y-m-d H:i:s');?>" placeholder="<?php echo date('Y-m-d H:i:s');?>"/>
          <a class="link" href="<?php echo base_url('Login')?>">Sudah punya akun? Masuk</a>
    	  <input type="submit"  id="btn-submit" value="Daftar" class="btn btn-default" ></input>
    	 </form>
      </section>






      <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

      <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.scrollUp.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/price-range.js"></script>
      <script src="<?php echo base_url()?>assets/js/jquery.prettyPhoto.js"></script>
      <script src="<?php echo base_url()?>assets/js/main.js"></script>
      <script src="<?php echo base_url()?>assets/js/formValidation.min.js"></script>
      <script src="<?php echo base_url()?>assets/js/framework/bootstrap.min.js"></script>
      <script>
     $('#btn-submit').on('click',function(e){
        e.preventDefault();
        var form = $(this).parents('#regis');
        swal({
        title: "Pendaftaran berhasil",
        text: "Cek email anda untuk aktivasi akun anda!",
        type: "success",
        showCancelButton: false,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oke!",
        closeOnConfirm: false
      }, function(isConfirm){
        if (isConfirm) form.submit();
      });
    });
      </script>
      <script>
  $(document).ready(function() {
      $('#regis').formValidation({
          framework: 'bootstrap',
          icon: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          err: {
              // You can set it to popover
              // The message then will be shown in Bootstrap popover
              container: 'tooltip'
          },
          fields: {
              nama_lengkap: {
                  validators: {
                      notEmpty: {
                          message: 'The Full name is required'
                      },
                      stringLength: {
                          min: 2,
                          max: 30,
                          message: 'Nama lengkap dibutuhkan'
                        }
                  }
              },
              email: {
                  validators: {
                      notEmpty: {
                          message: 'The email address is required'
                      },
                      emailAddress: {
                          message: 'The input is not a valid email address'
                      },
                      stringLength: {
                          min: 6,
                          max: 30,
                          message: 'The email must be more than 6 and less than 30 characters long'
                        },
                      remote: {
                        message: 'The email is alrady taken',
                        url: '<?php echo base_url('Register/register_email_exists')?>',
                        type: 'POST',
                        delay: 1000
                    }
                  }
              },
              password: {
                  validators: {
                      notEmpty: {
                          message: 'The password is required'
                        },
                        stringLength: {
                            min: 6,
                            max: 30,
                            message: 'The email must be more than 6 and less than 30 characters long'
                          },
                        callback: {
                            callback: function(value, validator, $field) {
                                var score = 0;

                                if (value === '') {
                                    return {
                                        valid: true,
                                        score: null
                                    };
                                }

                                // Check the password strength
                                score += ((value.length >= 8) ? 1 : -1);

                                // The password contains uppercase character
                                if (/[A-Z]/.test(value)) {
                                    score += 1;
                                }

                                // The password contains uppercase character
                                if (/[a-z]/.test(value)) {
                                    score += 1;
                                }

                                // The password contains number
                                if (/[0-9]/.test(value)) {
                                    score += 1;
                                }

                                // The password contains special characters
                                if (/[!#$%&^~*_]/.test(value)) {
                                    score += 1;
                                }

                                return {
                                    valid: true,
                                    score: score    // We will get the score later
                                };
                            }
                          }
                  }
              },
              password_conf: {
                  validators: {
                      notEmpty: {
                          message: 'The Confirm password is required'
                      },
                      identical: {
                          field: 'password',
                          message: 'Not Valid'
                      }
                  }
              }

          }
      })
      .on('success.validator.fv', function(e, data) {
          // The password passes the callback validator
          if (data.field === 'password' && data.validator === 'callback') {
              // Get the score
              var score = data.result.score,
                  $bar  = $('#passwordMeter').find('.progress-bar');

              switch (true) {
                  case (score === null):
                      $bar.html('').css('width', '0%').removeClass().addClass('progress-bar');
                      break;

                  case (score <= 0):
                      $bar.html('Lemah').css('width', '25%').removeClass().addClass('progress-bar progress-bar-danger');
                      break;

                  case (score > 0 && score <= 2):
                      $bar.html('Lemah').css('width', '50%').removeClass().addClass('progress-bar progress-bar-warning');
                      break;

                  case (score > 2 && score <= 4):
                      $bar.html('Sedang').css('width', '75%').removeClass().addClass('progress-bar progress-bar-info');
                      break;

                  case (score > 4):
                      $bar.html('Kuat').css('width', '100%').removeClass().addClass('progress-bar progress-bar-success');
                      break;

                  default:
                      break;
              }
          }
      });
  });
  </script>

      </body>
      </html>
