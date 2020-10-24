<?php
/**
 * @var string $error_text
 * @var integer $code
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $code; ?> Error | Server Error Control</title>
    <link rel="shortcut icon" href="/error/skin/src/favicon.ico"/>
    <link rel="icon" href="/error/skin/src/favicon.png" type="image/png"/>
    <link rel="stylesheet" href="/error/skin/src/reset.css">
    <link rel="stylesheet" href="/error/skin/src/destyle.css">
    <link rel="stylesheet" href="/error/skin/src/bootstrap.css">
    <link rel="stylesheet" href="/error/skin/src/all.min.css">
    <link rel="stylesheet" href="/error/skin/src/animate.css">
    <link rel="stylesheet" href="/error/skin/src/error.css">
</head>

<body>
<div class="container">
    <div class="row" style="margin-top: 10%;">
        <div class="offset-lg-3 col-lg-6">
            <div class="middle-box text-center animated fadeInDown">
                <h1 class="text-danger">
                    <?php echo $code; ?>
                </h1>
                <h3 class="font-bold">
                    <?php echo $error_text; ?>
                </h3>
                <div class="error-desc">
                    Sorry, but the page you are looking for is not available.<br>Try checking the URL for errors, then press the update button on your browser or try to find help from the technical service.
                </div>
                <button type="button" class="btn btn-info" id="return">Refresh to Home</button>
                <div class="error-desc">
                    <br>
                    <strong class="fo-copy">
                        <i class="fas fa-registered"></i>
                        Developed by:
                        <a href="http://www.icaros.live/" class="text-decoration-none">Icaros Net S.A </a>
                        and Powered by:
                        <a href="https://github.com/arcanisgk/Last-Hammer" class="text-decoration-none">Last Hammer </a>
                        <i class="fas fa-copyright"></i>
                    </strong>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JS Files -->
<script defer src="/error/skin/src/jquery.min.js"></script>
<script defer src="/error/skin/src/popper.min.js"></script>
<script defer src="/error/skin/src/bootstrap.js"></script>
<!-- Return Home Script -->
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function () {
        function refresh() {
            document.location.href = "/";
        }

        document.getElementById("return").addEventListener("click", function () {
            refresh();
        });
    });
</script>
</body>
</html>
