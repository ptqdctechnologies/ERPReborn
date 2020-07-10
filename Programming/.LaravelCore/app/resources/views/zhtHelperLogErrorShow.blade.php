<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        Zheta Helper Log Error (<?php echo \App\Helpers\ZhtHelper\System\Environment::getApplicationDateTimeTZ(); ?>)
    </head>
    <body onload="load()">
        <p style="color:blue;font-size:10px;">
            <?php
            echo \App\Helpers\ZhtHelper\Logger\SystemLog::getLogError(000000);
            echo 
                "<script>".
                    "setTimeout(\"window.open(self.location, '_self');\", 1000); ".
                "</script>";
            ?>
        </p>
    </body>
</html>

