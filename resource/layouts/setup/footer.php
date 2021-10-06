<!-- Footer -->
</div>
<!-- <footer <?= $attrForSideBar ?> class="text-center text-lg-start bg-light text-muted" style="bottom: 0;position: absolute;width:100%"> -->
  <!-- Copyright -->
  <!-- <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
    © <?= date('Y') ?> Copyright:
    <a class="text-reset fw-bold">PANDORADEV</a>
  </div> -->
  <!-- Copyright -->
<!-- </footer> -->
</div>
<!-- Footer -->
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
<script src="<?= asset('codemirror/keymap/sublime.js') ?>"></script>
<script src="<?= asset('codemirror/addon/edit/closetag.js') ?>"></script>
<script src="<?= asset('codemirror/addon/display/placeholder.js') ?>"></script>
<script>
    var editorTerminal = CodeMirror.fromTextArea(document.getElementById('terminal'), {
        keyMap                 : "sublime",
        autoCloseBrackets      : true,
        matchBrackets          : true,
        mode                   : "application/x-httpd-php",
        indentUnit             : 4,
        indentWithTabs         : true,
        autoRefresh            : true,
        theme                  : "the-matrix",
        matchBrackets          : true,
        showCursorWhenSelecting: true,
        tabSize                : 2,
        autoCloseTags          : true
    });

    editorTerminal.on('change', editor => {
        console.log(editorTerminal.getValue());
        $('.data-code').text(editorTerminal.getValue());
    });

    $('.data-code').text($('.data-code-old').text());

    editorTerminal.setSize(null, 350);

    editorTerminal.focus();
</script>
<?php
if (isset($_SESSION["title_alert"])) {

    $title      = $_SESSION["title_alert"];
    $alert      = $_SESSION["message_alert"];
    $type_alert = $_SESSION["type_alert"];

    ?>
    <script>

        Swal.fire({
            position         : 'top-right',
            icon             : '<?= $type_alert ?>',
            toast            : true,
            title            : '<?= $title ?>',
            showConfirmButton: false,
            timer            : 2000
        });

        <?php
            unset($_SESSION["data"]);    
        ?>
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
unset($_SESSION["data"]); 
?>
<script>
    $('.preview').click(function(){
            var datacode = $('.data-code-old').text();
            $('.result-preview').html(datacode);
        });
        $('.js-example-basic-single').select2({
            width: 'resolve' // need to override the changed default
        });

        setTimeout(function() {
            $('.button-trigger-pandorasetup').trigger("click");
        }, 10);

        setTimeout(function() {
            $('.button-trigger-pandorasetup-second').trigger("click");
        }, 2800);

        setTimeout(function() {
            $('.button-trigger-pandorasetup-third').trigger("click");
        }, 5500);

        setTimeout(function() {
            $('.button-trigger-pandorasetup-four').trigger("click");
        }, 5500);

        setTimeout(function() {
            $(".link-database").first().trigger("click");
        }, 9300);

        $(".button-trigger-pandorasetup").click(function() {
            $(".pandora-fade").fadeIn(2000);
            $(".pandora-fade").fadeOut();
        });

        $(".button-trigger-pandorasetup-second").click(function() {
            $(".pandora-fade-second").fadeIn(2000);
            $(".pandora-fade-second").fadeOut();
        });

        $(".button-trigger-pandorasetup-third").click(function() {
            $(".pandora-fade-third").fadeIn(3000);
            $(".pandora-fade-third").fadeOut();
        });
        
        $(".button-trigger-pandorasetup-four").click(function() {
            $(".pandora-fade-four").fadeIn(3000);
            $(".pandora-fade-four").fadeOut();
        });

        $('.link-database').click(function() {
            window.location.replace("setup/database");
        });
        jQuery(document).bind("keydown", function(e){
            if(e.ctrlKey && e.keyCode == 80){
                e.preventDefault();
                $( ".preview" ).first().trigger( "click" );
                return false;
            }
        });

        jQuery(document).bind("keydown", function(e){
            if(e.ctrlKey && e.keyCode == 66){
                e.preventDefault();
                $( ".sidebarHide" ).first().trigger( "click" );
                return false;
            }
        });
    var editorCode = CodeMirror.fromTextArea(document.getElementById('code-mirror'), {
        keyMap                 : "sublime",
        autoCloseBrackets      : true,
        lineNumbers            : true,
        matchBrackets          : true,
        mode                   : "application/x-httpd-php",
        indentUnit             : 4,
        indentWithTabs         : true,
        autoRefresh            : true,
        theme                  : "material-darker",
        matchBrackets          : true,
        showCursorWhenSelecting: true,
        tabSize                : 2,
        autoCloseTags          : true
    });

    editorCode.on('change', editor => {
        console.log(editorCode.getValue());
        $('.data-code').text(editorCode.getValue());
    });

    $('.data-code').text($('.data-code-old').text());

    editorCode.setSize(null, 1000);

</script>
<?php
    if (strpos($_SERVER['REQUEST_URI'], 'setup/backend-detail-file') !== false || strpos($_SERVER['REQUEST_URI'], 'setup/detail-file') !== false || strpos($_SERVER['REQUEST_URI'], 'setup/backend-menu') !== false) {
        ?>

        <script type="text/javascript">
            $(document).keydown(function(e) {
                
                var key = undefined;
                var possible = [ e.key, e.keyIdentifier, e.keyCode, e.which ];

                while (key === undefined && possible.length > 0)
                {
                    key = possible.pop();
                }

                if (key && (key == '115' || key == '83' ) && (e.ctrlKey || e.metaKey) && !(e.altKey))
                {
                    e.preventDefault();
                    $( ".save-file" ).first().trigger( "click" );
                    return false;
                }
                return true;
                }); 
        </script>

        <?php
        
    }
?>

<?php
if (strpos($_SERVER['REQUEST_URI'], 'setup/cmd') !== false ) {
    ?>

    <script type="text/javascript">
        $(document).keydown(function(e) {
            
            var key = undefined;
            var possible = [ e.key, e.keyIdentifier, e.keyCode, e.which ];

            while (key === undefined && possible.length > 0)
            {
                key = possible.pop();
            }

            if (key == '13')
            {
                e.preventDefault();
                $( ".execute-cmd" ).first().trigger( "click" );
                const Toast = Swal.mixin({
                toast: true,
                position: 'top',
                showConfirmButton: false,
                timer: 4400,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                })

                Toast.fire({
                icon: 'info',
                title: 'Tunggu sebentar...'
                })
                return false;
            }
            return true;
            }); 
    </script>

    <?php
    
}

?>

<?php
    if (strpos($_SERVER['REQUEST_URI'], 'setup/backend-detail-file') !== false || strpos($_SERVER['REQUEST_URI'], 'setup/detail-file') !== false) {
        ?>

        <script type="text/javascript">
            
            $('.menu-sidebar').css("display","none");
            $('.show-hide').click(function(){
                // $('.remove-display').show();
                $('.first-sidebar').toggle();
            });
        </script>

        <?php
        
    }else{
        ?>
        <script>
            $('.remove-display').css("display","none");
            $('.show-hide').css("display","none");
        </script>
        <?php
    }
    
    
?>

<script>
    $(document).ready(function() {
        

        $('.sidebarT').hide();
    });

    $('.add-column').click(function() {

        var row = null;

        row += `<tr>`;
            row += `<td><input tabindex="2" type="text" name="name_column[]" required class="form-control"></td>`;
            row += `<td>
                        <select tabindex="4" name="type_data[]" id="" class="form-control js-example-basic-single">
                        <?php
                                                    $type_data = $host->query("SELECT * FROM type_data");
                                                    while ($listTypeData = mysqli_fetch_assoc($type_data)) {
                                                ?>
                                                    <option <?php echo ($listTypeData['type_data'] == strtoupper($dataType)) ? "selected" : "";?> value="<?= $listTypeData['type_data'] ?>-<?= $listTypeData['name_data'] ?>"><?= $listTypeData['name_data'] ?></option>
                                                <?php
                                                    }
                                                ?>
                        </select>
                    </td>`;
            row += `<td><input tabindex="5" name="length[]" required type="text" class="form-control"></td>`;
            row += `<td><center><input tabindex="6" name="auto_increment" type="radio"></center></td>`;
            row += `<td><center><input tabindex="7" name="primary_key" type="radio"></center></td>`;
            row += `<td>
                        <center><a class="btn btn-danger btn-sm delete-column"><i class="fa fa-trash"></i></a></center>
                    </td>`;
            row += `<input name="total_column[]" type="hidden" value="">`;
            row += `<input name="new_data[]" type="hidden" value="yes">`;
        row += `</tr>`;

        $('tbody').append(row);
    });

    $("input[name='primary_key']").change(function(){
        $("input[name='primary_key']").val($(this).parents('tr').find("input.name_column").val());
    });
    
    $("input[name='auto_increment']").change(function(){
        $("input[name='auto_increment']").val($(this).parents('tr').find("input.name_column").val());
    });

    $('body').on('click','.delete-column',function(){
        $(this).parents('tr').hide();
        
        var x = $(this).parents('tr').find('input.deleted').val("true");
        var x = $(this).parents('tr').find('td > .input-table').removeAttr("required");
        console.log(x);
    });

    $('.delete-table').click(function(el) {
        el.preventDefault();

        var url = $(this).data('url');
        var table = $(this).data('table');

        console.log(url);
        Swal.fire({
            title: 'Apakah anda yakin ingin menghapus ' + table + '?',
            showDenyButton: true,
            confirmButtonText: 'Hapus',
            denyButtonText: `Batal`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location = url;
            } else if (result.isDenied) {
                Swal.fire('Gagal menghapus ' + table, '', 'info')
            }
        })
    });
</script>


<script>

    $('.name-folder').keyup(function() {
        $('.exist_folder').val('');
        $('.append-folder-name').html($(this).val());
    });

    $('.exist_folder').on('change', function() {
        $('.name-folder').val('');
        $('.name-folder').removeAttr('required');
        $('.append-folder-name').html($(this).val());
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
}
unset($_SESSION["alert_delete_table"]);
?>



<?php
foreach (glob("../controller/*") as $key => $see) {

    $explode = explode("/", $see);
    ?>
    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById('<?= $explode[2] ?>'), {
            keyMap                 : "sublime",
            autoCloseBrackets      : true,
            lineNumbers            : true,
            matchBrackets          : true,
            mode                   : "application/x-httpd-php",
            indentUnit             : 4,
            indentWithTabs         : true,
            autoRefresh            : true,
            theme                  : "material-darker",
            matchBrackets          : true,
            showCursorWhenSelecting: true,
            tabSize                : 2,
            autoCloseTags          : true
        });

        editor.on('change', editor => {
            console.log(editor.getValue());
            $('.data-code').text(editor.getValue());
        });

        $('.data-code').text($('.data-code-old').text());

        editor.setSize(null, 1000);
    </script>
<?php } ?>


