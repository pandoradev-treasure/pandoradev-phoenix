</div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="<?= asset('setup/js/scripts.js') ?>"></script>
    </body>
</html>
<!-- jQuery -->
<script src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= asset('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

<!-- JQVMap -->
<script src="<?= asset('plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= asset('plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= asset('plugins/jquery-knob/jquery.knob.min.js') ?>"></script>

<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= asset('plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= asset('dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= asset('dist/js/demo.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= asset('dist/js/pages/dashboard.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: 'resolve' // need to override the changed default
        });

        $('.sidebarT').hide();
    });
    
    $('.add-column').click(function(){

        var row = null;

        row += `<tr>`;
            row += `<td><input type="text" name="name_column[]" required class="form-control"></td>`;
            row += `<td>
                        <select name="type_data[]" id="" class="form-control">
                            <option value="INT">INT</option>
                            <option value="VARCHAR">VARCHAR</option>
                            <option value="TEXT">TEXT</option>
                            <option value="DATE">DATE</option>
                        </select>
                    </td>`;
            row += `<td><input name="lenght[]" required type="text" class="form-control"></td>`;
            row += `<td><center><input name="auto_increment[]" type="radio"></center></td>`;
            row += `<td><center><input name="primary_key[]" type="radio"></center></td>`;
            row += `<td>
                        <center><a class="btn btn-danger btn-sm delete-column"><i class="fa fa-trash"></i></a></center>
                    </td>`;
        row += `</tr>`;

        $('tbody').append(row);
    });

    $('body').on('click','.delete-column',function(){
        $(this).parents('tr').remove();
    });



</script>