<?php
ob_start();
# error Example:
require_once 'test.php';
$test = new Test();
$test->testMethod();
echo '<br>No problem Detected.<br>Go to test.php and uncomment examples in test Method';