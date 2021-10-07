<div class="container-fluid mt-3">
    <div class="row">
        <form action="<?= controller('setup@ExecuteCmd') ?>" method="POST" enctype="multipart/form-data">
            <div style="margin-bottom: 10px">
                <img src="<?= asset('setup/coding.png') ?>" style="max-width: 20px;" alt=""><span
                    style="font-size: 20px;">Terminal</span>
            </div>
            <input class="form-control" style="background-color: #0a3d62;color: #78e08f;" name="execute">
            
            <?= @$data->cmd[0]; ?>

            <button class="execute-cmd" style="display: none;" type="submit">Ex</button>
        </form>
    </div>
</div>