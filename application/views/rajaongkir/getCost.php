<?php

  $curl = curl_init();
  //  http://localhost:8080/SKYMarket3/Cart/getCost?origin=154&destination=22&courier=jne&_=1494783971872

  curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=$origin&destination=$destination&weight=$berat&courier=$courier",
    CURLOPT_HTTPHEADER => array(
      "content-type: application/x-www-form-urlencoded",
      "key: 37975cf3eb34758b467ba447b7980692"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
      echo "cURL Error #:" . $err;
    } else {
        //echo $response;
        $data = json_decode($response, true);
        //echo json_encode($k['rajaongkir']['results']);

        /*
        for ($k=0; $k < count($data['rajaongkir']['results']); $k++){


        echo "<li='".$data['rajaongkir']['results'][$k]['code']."'>".$data['rajaongkir']['results'][$k]['service']."</li>";
        //echo $data['rajaongkir']['results'][$k]['code'];
        }
        */
        //echo $data['rajaongkir']['results']['costs']['service'];
  }
    ?>

    <?php echo $data['rajaongkir']['origin_details']['city_name'];?> To <?php echo $data['rajaongkir']['destination_details']['city_name'];?> @<?php echo $berat;?>gram Courier : <?php  echo strtoupper($courier); ?>

    <?php
    for ($k=0; $k < count($data['rajaongkir']['results']); $k++) {
        ?>
     <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']);?>" style="padding:10px">
         <table class="table table-striped">
             <tr>
                 <th>Chose</th>
           <th></th>
                 <th>Name Service</th>
                 <th>ETD</th>
                 <th>Cost</th>
             </tr>
             <?php
                $a = count($data['rajaongkir']['results'][$k]['costs']);
                for ($l=0; $l < $a; $l++) {
                    ?>
             <tr>
                 <td><input type="radio" name="idongkir" id="idongkir<?php echo $l;?>" value="<?php echo $l;?>"></td>
           <td><input type="hidden" id="jp" value="<?php echo $a;?>"></input></td>
                 <td>
                     <div style="font:bold 16px Arial" >
                    <?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service'];?></div>
                     <div style="font:normal 11px Arial" id="kurire<?php echo $l;?>"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description'];?></div>
                 </td>
                 <td align="center">&nbsp;<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd'];?> days</td>
                 <td align="right" id="ongkire<?php echo $l;?>"><?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value'];?></td>
             </tr>
                    <?php
                }
                ?>
         </table>
     </div>


        <?php
    }
    ?>
      <script src="<?php echo base_url()?>assets/js/jQuery.min.js"></script>
      <script>
      $(document).ready(function() {
        $('#okee').attr('disabled',true);
        $(document).on("change","#idongkir7",function () {
          if ($('#ongkir').val() == "") {
            $('#okee').attr('disabled',true);
          }
          else {
            $('#okee').attr('disabled',false);
          }
      })
      $(document).on("change","#idongkir6",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      $(document).on("change","#idongkir5",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      $(document).on("change","#idongkir4",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      $(document).on("change","#idongkir3",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      $(document).on("change","#idongkir2",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      $(document).on("change","#idongkir1",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      $(document).on("change","#idongkir0",function () {
        if ($('#ongkir').val() == "") {
          $('#okee').attr('disabled',true);
        }
        else {
          $('#okee').attr('disabled',false);
        }
      })
      });
      </script>

      <script>
                        function tampil_data(act){
                              var w = $('#origin').val();
                              var x = $('#destination').val();
                              var y = $('#berat').val();
                              var z = $('#courier').val();

                              $.ajax({
                                  url: "<?php echo base_url()?>Cart/getCost",
                                  type: "GET",
                                  data : {origin: w, destination: x, berat: y, courier: z},
                                  success: function (ajaxData){
                                      $("#hasil").html(ajaxData);
                                $(document).on("change","#idongkir0",function () {
                                    var k = $("#kurire0").text();
                                    var o = $("#ongkire0").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir1",function () {
                                    var k = $("#kurire1").text();
                                    var o = $("#ongkire1").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir2",function () {
                                    var k = $("#kurire2").text();
                                    var o = $("#ongkire2").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir3",function () {
                                    var k = $("#kurire3").text();
                                    var o = $("#ongkire3").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir4",function () {
                                    var k = $("#kurire4").text();
                                    var o = $("#ongkire4").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir4",function () {
                                    var k = $("#kurire4").text();
                                    var o = $("#ongkire4").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir5",function () {
                                    var k = $("#kurire5").text();
                                    var o = $("#ongkire5").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir6",function () {
                                    var k = $("#kurire6").text();
                                    var o = $("#ongkire6").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                                $(document).on("change","#idongkir7",function () {
                                    var k = $("#kurire7").text();
                                    var o = $("#ongkire7").text();
                                    $("#kurir").val(k);
                                    $("#ongkir").val(o);
                                    var a = parseInt($('input[name=ongkir]').val());
                                    var b = parseInt($('input[name=total]').val());
                                    var total = a+b;
                                    $('#total_tagihan').val(a+b);
                                })
                              }
                              });
                          };
                    </script>
