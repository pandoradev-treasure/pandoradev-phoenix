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
<script src="<?php asset('plugins/sweetalert2@11') ?>"></script>
<script src="<?= asset('codemirror/lib/codemirror.js') ?>"></script>
<script src="<?= asset('codemirror/mode/php/php.js') ?>"></script>
<script src="<?= asset('codemirror/mode/htmlmixed/htmlmixed.js') ?>"></script>
<script src="<?= asset('codemirror/mode/xml/xml.js') ?>"></script>
<script src="<?= asset('codemirror/mode/clike/clike.js') ?>"></script>
<script src="<?= asset('codemirror/mode/css/css.js') ?>"></script>
<script src="<?= asset('codemirror/addon/display/autorefresh.js') ?>"></script>
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
            row += `<td><input tabindex="2" type="text" name="name_column[]" required class="form-control"></td>`;
            row += `<td>
                        <select tabindex="4" name="type_data[]" id="" class="form-control">
                            <option value="INT">INT</option>
                            <option value="VARCHAR">VARCHAR</option>
                            <option value="TEXT">TEXT</option>
                            <option value="DATE">DATE</option>
                        </select>
                    </td>`;
            row += `<td><input tabindex="5" name="lenght[]" required type="text" class="form-control"></td>`;
            row += `<td><center><input tabindex="6" name="auto_increment[]" type="radio"></center></td>`;
            row += `<td><center><input tabindex="7" name="primary_key[]" type="radio"></center></td>`;
            row += `<td>
                        <center><a class="btn btn-danger btn-sm delete-column"><i class="fa fa-trash"></i></a></center>
                    </td>`;
        row += `</tr>`;

        $('tbody').append(row);
    });

    $('body').on('click','.delete-column',function(){
        $(this).parents('tr').remove();
    });

    $('.delete-table').click(function(el){
        el.preventDefault();

        var url   = $(this).data('url');
        var table = $(this).data('table');

        console.log(url);
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus table '+table+'?',
            showDenyButton: true,
            confirmButtonText: 'Hapus',
            denyButtonText: `Batal`,
            }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = url;
            } else if (result.isDenied) {
                Swal.fire('Gagal menghapus table '+table, '', 'info')
            }
        })
    });
</script>

<?php
    if (isset($_SESSION["alert_delete_table"])) {
        ?>
            <script>
            Swal.fire(
                'Berhasil Dihapus!',
                'Table berhasil dihapus!',
                'success'
                )
            </script>
        <?php
    } unset($_SESSION["alert_delete_table"]);
?>

<?php
    if (isset($_SESSION["alert"])) {
        $alert = $_SESSION["alert"];
        ?>
            <script>
            Swal.fire(
                'Berhasil!',
                '<?= $alert ?>',
                'success'
                )
            </script>
        <?php
    } unset($_SESSION["alert"]);
?>

<!-- FOR CODE MIRROR -->
<!-- <script>
    //  CodeMirror.fromTextArea(document.getElementById('code'), {
    //     lineNumbers: true,
    //     mode: 'application/x-httpd-php',
    // }).on('change', editor => {
    //     console.log(editor.getValue());
    // });

    $(document).ready(function(){
        var code = $('.codemirror-textarea')[0];
        var editor = CodeMirror.fromTextArea(code, {
            lineNumbers: true,
            matchBrackets: true,
            mode: "application/x-httpd-php",
            indentUnit: 4,
            indentWithTabs: true,
            theme : "material-darker"
        });
    });
</script>

 -->




 <?php
    foreach (glob("../controller/*") as $key => $see) {
    
    $explode = explode("/",$see);
?>
<script>

    var editor = CodeMirror.fromTextArea(document.getElementById('<?= $explode[2] ?>'), {
            lineNumbers: true,
            matchBrackets: true,
            mode: "application/x-httpd-php",
            indentUnit: 4,
            indentWithTabs: true,
            autoRefresh: true,
            theme : "material-darker"
        });

        editor.on('change', editor => {
            console.log(editor.getValue());
            $('.data-code').text(editor.getValue());
        });

        $('.data-code').text($('.data-code-old').text());

        editor.setSize(null, 1000);
</script>
<?php } ?>