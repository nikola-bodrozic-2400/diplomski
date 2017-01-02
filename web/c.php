<?php
$r = file_get_contents('test.txt');
$r = $r . "\n" . date('h-i-s');
file_put_contents("test.txt",$r);