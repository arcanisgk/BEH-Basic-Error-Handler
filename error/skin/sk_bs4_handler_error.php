<?php
/**
 * @var string $error_type
 * @var string $error_file
 * @var string $error_line
 * @var string $error_level
 * @var string $error_desc
 * @var string $error_trace_smg
 *
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $error_type; ?> | Error Control Software</title>
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
                <h2 class="text-danger"><b><?php echo $error_type; ?></b></h2>
                <div class="error-desc error-php">
                    <b>File:</b> <?php echo $error_file; ?><br>
                    <b>Line:</b> <?php echo $error_line; ?> <b>Level:</b> <?php echo $error_level; ?><br><br>
                    <b>Description:</b> <?php echo $error_desc; ?><br>
                    <b>BackTrace Log:</b><br><?php echo $error_trace_smg; ?><br>
                </div>
                <br>
                <button type="button" class="btn btn-info" id="return">Return to Home Page</button>
                <div class="error-desc">
                    <br>
                    <strong class="fo-copy">
                        <i class="fas fa-registered"></i>
                        Developed by:
                        <a href="#" class="text-decoration-none">Walter Nuñez </a>
                        and Powered by:
                        <a href="#" class="text-decoration-none">Last Hammer </a>
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