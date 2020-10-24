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
</head>

<body>
<h3><?php echo $code; ?> - <?php echo $error_text; ?></h3>
<div>
    Sorry, but the page you are looking for is not available.<br>Try checking the URL for errors, then press the update button on your browser or try to find help from the technical service.
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