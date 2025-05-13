<div class="card-body">
    <div class="row text-bold" style="line-height: 14px;">
        File Attachment :
    </div>
    <div class="row py-2">
        <input type="text" id="dataInput_Log_FileUpload_1" name="dataInput_Log_FileUpload_1" style="display:none">
        <?php echo \App\Helpers\ZhtHelper\General\Helper_JavaScript::getSyntaxCreateDOM_DivCustom_InputFile(\App\Helpers\ZhtHelper\System\Helper_Environment::getUserSessionID_System(),
            $varAPIWebToken,
            'dataInput_Log_FileUpload_1',
            null,
            'dataInput_Return'
            ).
        ''; ?>
    </div>
</div>