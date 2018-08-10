<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <!-- css -->
        <link href="public/css/base.css" rel="stylesheet" />
        <link href="public/css/layout.css" rel="stylesheet" />
        <link href="public/css/theme.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview/dist/file-upload-with-preview.min.css">

        <!-- font awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <!-- font -->
        <link href='https://fonts.googleapis.com/css?family=Dekko' rel='stylesheet'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
        <!-- favicon -->
        <link rel="icon" type="image/png" href="public/img/logo.png" />

    </head>

    <body>

        <?= $content ?>

                <script type="text/javascript" src="public/js/instafeed.min.js"></script>
                <script type="text/javascript" src="public/js/instafeed.js"></script>
        <!-- tinymce -->
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'.editor' });</script>



    </body>
</html>
