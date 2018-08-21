<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php
        if (!empty($meta)) {
      ?>
                  <meta name="description" content="<?php echo $meta ?>">
      <?php
        }
      ?>

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



        <!-- tinymce -->
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script>
        tinymce.init({
            selector: '.editor',
            plugins: 'image code advlist emoticons lists textcolor colorpicker',
            toolbar: 'undo redo | image code | numlist bullist  forecolor backcolor emoticons',

            // without images_upload_url set, Upload tab won't show up
            images_upload_url: 'upload.php',

            // override default upload handler to simulate successful upload
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'upload.php');

                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
        </script>

    </body>
</html>
