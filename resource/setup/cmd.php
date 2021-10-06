<div class="container-fluid mt-3">
    <div class="row">
        <form action="<?= controller('setup@ExecuteCmd') ?>" method="POST" enctype="multipart/form-data">
            <div style="margin-bottom: 10px">
                <img src="<?= asset('setup/coding.png') ?>" style="max-width: 20px;" alt=""><span
                    style="font-size: 20px;">Terminal</span>
            </div>
            <textarea class="mb-3 data-code-old"
                id="terminal" placeholder="<?= @$data->cmd[0] ?>"></textarea>
            <div class="card-body">
                <textarea style="display: none;" autofocus name="execute" class="data-code" id="" cols="30"
                    rows="10"></textarea>
            </div>
            <!-- for execute with moment jquery -->
            <button class="execute-cmd" style="display: none;" type="submit">Ex</button>
        </form>
    </div>
</div>