</div>
</div>
<!-- Core theme JS-->
<script type="text/javascript" src="<?= asset('setup/js/scripts.js') ?>"></script>
</body>

</html>
<!-- jQuery -->
<script type="text/javascript" src="<?= asset('plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script type="text/javascript" src="<?= asset('plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script type="text/javascript" type="text/javascript">
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script type="text/javascript" src="<?= asset('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>


<!-- AdminLTE App -->
<script type="text/javascript" src="<?= asset('dist/js/adminlte.js') ?>"></script>
<script type="text/javascript" src="<?= asset('dist/js/pages/dashboard.js') ?>"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="<?php asset('plugins/sweetalert2@11') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/lib/codemirror.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/mode/php/php.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/mode/htmlmixed/htmlmixed.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/mode/xml/xml.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/mode/clike/clike.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/mode/css/css.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/addon/display/autorefresh.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/keymap/sublime.js') ?>"></script>
<script type="text/javascript" src="<?= asset('codemirror/addon/edit/closetag.js') ?>"></script>

<script type="text/javascript">
<?php
    if (isset($_SESSION["title_alert"])) {

        $title      = $_SESSION["title_alert"];
        $alert      = $_SESSION["message_alert"];
        $type_alert = $_SESSION["type_alert"];

        ?>

        Swal.fire({
            position: 'top-right',
            icon: '<?= $type_alert ?>',
            toast: true,
            title: '<?= $title ?>',
            showConfirmButton: false,
            timer: 2000
        });

        <?php
            unset($_SESSION["data"]);
            ?>

        <?php
            if ($type_alert == "error") {
                ?>
            var x = document.getElementById("myAudioError");
            x.play();
        <?php
            } else {
                ?>
            var x = document.getElementById("myAudioSuccess");
            x.play();
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
    $(document).ready(function() {
        $('.preview').click(function() {
            var datacode = $('.data-code-old').text();
            $('.result-preview').html(datacode);
        });
        $('.js-example-basic-single').select2({
            width: 'resolve' // need to override the changed default
        });
        jQuery(document).bind("keydown", function(e) {
            if (e.ctrlKey && e.keyCode == 80) {
                e.preventDefault();
                $(".preview").first().trigger("click");
                return false;
            }
        });

        jQuery(document).bind("keydown", function(e) {
            if (e.ctrlKey && e.keyCode == 66) {
                e.preventDefault();
                $(".sidebarHide").first().trigger("click");
                return false;
            }
        });

        $(".pandora-fade").click(function() {
            $(this).fadeIn(3000);
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

        $('.link-database').click(function() {
            window.location.replace("setup/database");
        });
        $('.sidebarT').hide();
    });

    $('.name-folder').on('keyup keypress',function() {
        $('.exist_folder').val('');
        $('.append-folder-name').html($(this).val());
    });

    $('.exist_folder').on('change', function() {
        $('.name-folder').val('');
        $('.name-folder').removeAttr('required');
        $('.append-folder-name').html($(this).val());
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
                                                    <option <?php echo ($listTypeData['type_data'] == strtoupper($dataType)) ? "selected" : ""; ?> value="<?= $listTypeData['type_data'] ?>-<?= $listTypeData['name_data'] ?>"><?= $listTypeData['name_data'] ?></option>
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

    $("input[name='primary_key']").change(function() {
        $("input[name='primary_key']").val($(this).parents('tr').find("input.name_column").val());
    });

    $("input[name='auto_increment']").change(function() {
        $("input[name='auto_increment']").val($(this).parents('tr').find("input.name_column").val());
    });

    $('body').on('click', '.delete-column', function() {
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

    
    $(document).keydown(function(e) {

        var key = undefined;
        var possible = [e.key, e.keyIdentifier, e.keyCode, e.which];

        while (key === undefined && possible.length > 0) {
            key = possible.pop();
        }

        if (key && (key == '115' || key == '83') && (e.ctrlKey || e.metaKey) && !(e.altKey)) {
            e.preventDefault();
            $(".save-file").first().trigger("click");
            return false;
        }
        return true;
    });

    


    <?php
    if (strpos($_SERVER['REQUEST_URI'], 'setup/backend-detail-file') !== false || strpos($_SERVER['REQUEST_URI'], 'setup/detail-file') !== false) {
        ?>


        $('.menu-sidebar').css("display", "none");
        $('.show-hide').click(function() {
            // $('.remove-display').show();
            $('.first-sidebar').toggle();
        });

    <?php

    } else {
    ?>
        $('.remove-display').css("display", "none");
        $('.show-hide').css("display", "none");
    <?php
    }
    ?>

    

    <?php
    foreach (glob("../controller/*") as $key => $see) {

        $explode = explode("/", $see);
        ?>
        var editor = CodeMirror.fromTextArea(document.getElementById('<?= $explode[2] ?>'), {
            keyMap: "sublime",
            autoCloseBrackets: true,
            lineNumbers: true,
            matchBrackets: true,
            mode: "application/x-httpd-php",
            indentUnit: 4,
            indentWithTabs: true,
            autoRefresh: true,
            theme: "material-darker",
            matchBrackets: true,
            showCursorWhenSelecting: true,
            tabSize: 2,
            autoCloseTags: true
        });

        editor.on('change', editor => {
            console.log(editor.getValue());
            $('.data-code').text(editor.getValue());
        });

        $('.data-code').text($('.data-code-old').text());

        editor.setSize(null, 1000);
    <?php } ?>
</script>

<script>
    var editor = CodeMirror.fromTextArea(document.getElementById('code-mirror'), {
        keyMap: "sublime",
        autoCloseBrackets: true,
        lineNumbers: true,
        matchBrackets: true,
        mode: "application/x-httpd-php",
        indentUnit: 4,
        indentWithTabs: true,
        autoRefresh: true,
        theme: "material-darker",
        matchBrackets: true,
        showCursorWhenSelecting: true,
        tabSize: 2,
        autoCloseTags: true
    });

    editor.on('change', editor => {
        console.log(editor.getValue());
        $('.data-code').text(editor.getValue());
    });

    $('.data-code').text($('.data-code-old').text());

    editor.setSize(null, 1000);
</script>