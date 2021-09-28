
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
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
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
<script src="../resource/assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../resource/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../resource/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../resource/assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../resource/assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../resource/assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../resource/assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../resource/assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<!-- <script src="../resource/assets/plugins/moment/moment.min.js"></script> -->
<script src="../resource/assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../resource/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../resource/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../resource/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../resource/assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../resource/assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../resource/assets/dist/js/pages/dashboard.js"></script>
<!-- Datatable -->
<script src="../resource/assets/plugins/jquery.dataTables.min.js"></script>
<script src="../resource/assets/plugins/dataTables.bootstrap4.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

        $.each($('.layout'), function(k,v){

          var dir    = $(this).attr('href');
          dir        = dir.split('/');
          var path   = window.location.pathname;
          var result = path.split('/');

          if (result[2] == dir[1]) {
            $(this).addClass('active');
          }
          
        });

</script>
</body>
</html>