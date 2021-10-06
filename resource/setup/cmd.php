<div class="container-fluid mt-3">
    <div class="row">
        <form action="" method="POST" enctype="multipart/form-data">
        <div style="margin-bottom: 10px">
            <img src="<?= asset('setup/coding.png') ?>" style="max-width: 20px;" alt=""><span style="font-size: 20px;">Terminal</span>
        </div>
            <textarea class="mb-3 data-code-old"
                id="terminal"><?= file_get_contents('../controller/' . $data->file[0]) ?></textarea>
            <div class="card-body">
                <textarea style="display: none;" name="data_new_code" class="data-code" id="" cols="30"
                    rows="10"></textarea>
            </div>
        </form>
    </div>
</div>