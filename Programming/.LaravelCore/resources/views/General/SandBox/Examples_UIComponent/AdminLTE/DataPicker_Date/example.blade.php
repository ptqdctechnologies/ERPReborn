<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <?php
        echo \App\Helpers\ZhtHelper\UserInterface\Helper_AdminLTE::initHead_CSSAndJS();
        ?>
    </head>
    <body>
        <?php
        echo \App\Helpers\ZhtHelper\UserInterface\Helper_AdminLTE::initBody_CSSAndJS();
        echo "xxxxxxxxx";
        ?>
    </body>
</html>