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
</head>

<body>
<h3><b><?php echo $error_type; ?></b></h3>
<div>
    <b>File:</b> <?php echo $error_file; ?><br>
    <b>Line:</b> <?php echo $error_line; ?> <b>Level:</b> <?php echo $error_level; ?><br><br>
    <b>Description:</b> <?php echo $error_desc; ?><br>
    <b>BackTrace Log:</b><br><?php echo $error_trace_smg; ?><br>
</div>
<br>
<button type="button" id="return">Return to Home Page</button>
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