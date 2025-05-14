<div class="card-body">
    <div class="row" style="margin: .6rem 0rem; gap: 1rem;">
        <div class="col-12 text-bold p-0" style="line-height: 14px;">
            File Attachment
        </div>
        <div class="col-12 p-0">
            <?php if ($dataHeader['fileID']) { ?>
                <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1" style="display:none">
                <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
                    $varAPIWebToken,
                    'dataInput_Log_FileUpload_1',
                    null,
                    'dataInput_Return'
                    ).
                ''; ?>
            <?php } else { ?>
                <div>-</div>
            <?php } ?>
        </div>
    </div>
</div>