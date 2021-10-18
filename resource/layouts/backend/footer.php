            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright © 2014-2020<a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->
<script src="<?php asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php asset('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?php asset('plugins/chart.js/Chart.min.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php asset('plugins/sparklines/sparkline.js') ?>"></script>
<!-- JQVMap -->
<script src="<?php asset('plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?php asset('plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php asset('plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php asset('plugins/moment/moment.min.js') ?>"></script>
<script src="<?php asset('plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?php asset('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php asset('dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php asset('dist/js/demo.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php asset('dist/js/pages/dashboard.js') ?>"></script>
<!-- Datatable -->
<script src="<?php asset('plugins/jquery.dataTables.min.js') ?>"></script>
<script src="<?php asset('plugins/dataTables.bootstrap4.min.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="<?php asset('plugins/sweetalert2@11') ?>"></script>
<script>
   // Ketika halaman sudah siap (sudah selesai di load)    

      $('.data-table').DataTable({
        "language": {
            "url": "http://cdn.datatables.net/plug-ins/1.10.9/i18n/Indonesian.json",
            "sEmptyTable": "Tidak ada data di database"
        }
      });

      $('.js-example-basic-single').select2();

      $("#check-all").click(function(){ // Ketika user men-cek checkbox all      

        if($(this).is(":checked")) // Jika checkbox all diceklis        
          $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"      
        else // Jika checkbox all tidak diceklis        
          $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"    

      });
      
      $("#btn-delete").click(function(){ // Ketika user mengklik tombol delete      

          Swal.fire({
            title: 'Apakah Anda Yakin?',
            text: "Data akan terhapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya'
          }).then((result) => {
            if (result.isConfirmed) {
              $("#form-delete").submit();
            }
          })

        }); 

        // $.each($('.layout'), function(k,v){


        //   var data = $(this).attr('href');
        //   console.log(data);


        //   var dir    = $(this).attr('href');
        //   dir        = dir.split('/');
        //   var path   = window.location.pathname;
        //   var result = path.split('/');
          
        //   console.log(result[2]+"/"+result[3]+"/"+result[4]);

        //   if (data == result[2]+"/"+result[3]+"/"+result[4] || data == result[3]+"/"+result[4]) {
        //     $(this).removeAttr('href');
        //   }
          
        //   if (result[3] == dir[1]) {
        //     $(this).addClass('active');
        //   }
          
        // });

</script>

<?php
  if (isset($_SESSION["alert"] )) {
    $msg = $_SESSION["alert"];
  ?>
    <script>
      Swal.fire(
          'Berhasil!',
          '<?= $msg ?>',
          'success'
        );
    </script>
  <?php
    unset($_SESSION["alert"]);
  }
?>

<?php
if (isset($_SESSION["title_alert"])) {

    $title      = $_SESSION["title_alert"];
    $alert      = $_SESSION["message_alert"];
    $type_alert = $_SESSION["type_alert"];

    ?>
    <script>
        
        Swal.fire(
          '<?= $title ?>',
          '<?= $alert ?>',
          '<?= $type_alert ?>'
        );
    </script>

    <?php
        if ($type_alert == "error") {
            ?>
        <script>
            var x = document.getElementById("myAudioError");
            x.play();
        </script>
    <?php
        } else {
            ?>
        <script>
            var x = document.getElementById("myAudioSuccess");
            x.play();
        </script>
    <?php
        }
        ?>

<?php
}
unset($_SESSION["title_alert"]);
unset($_SESSION["message_alert"]);
unset($_SESSION["type_alert"]);

if(!empty($_SESSION["data"])){
  $nama_array = array_keys($_SESSION["data"]);
  if(!empty($_SESSION["data"][$nama_array[0]]["url"])){
      if($_SESSION["data"][$nama_array[0]]["url"] != this_url()){
        ?>
        <script>
          location.reload();
        </script>
        <?php
          unset($_SESSION["data"]);
      }
  }
}
?>

</body>
</html>