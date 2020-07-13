<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        Zheta Helper Log Output (<?php echo \App\Helpers\ZhtHelper\System\Helper_Environment::getApplicationDateTimeTZ(); ?>)
    </head>
    <body onload="load()">
        <p style="color:blue;font-size:8px;">
            <?php
            echo \App\Helpers\ZhtHelper\Logger\Helper_SystemLog::getLogOutput(000000);
            echo 
                "<script>".
                    "setTimeout(\"window.open(self.location, '_self');\", 1000); ".
                "</script>";
            ?>
        </p>
    </body>
</html>

