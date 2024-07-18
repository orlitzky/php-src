--TEST--
Bug #73869 (Signed Integer Overflow gd_io.c)
--EXTENSIONS--
gd
--SKIPIF--
<?php
if (!function_exists("imagecreatefromgd2")) {
    die('skip imagecreatefromgd2() not available');
}
?>
--FILE--
<?php
var_dump(imagecreatefromgd2(__DIR__ . DIRECTORY_SEPARATOR . 'bug73869a.gd2'));
var_dump(imagecreatefromgd2(__DIR__ . DIRECTORY_SEPARATOR . 'bug73869b.gd2'));
?>
--EXPECTF--
%r(Warning: imagecreatefromgd2\(\): product of memory allocation multiplication would exceed INT_MAX, failing operation gracefully
 in %s on line %d

)?%rWarning: imagecreatefromgd2(): "%s" is not a valid GD2 file in %s on line %d
bool(false)

%r(Warning: imagecreatefromgd2\(\): one parameter to a memory allocation multiplication is negative or zero, failing operation gracefully
 in %s on line %d

)?%rWarning: imagecreatefromgd2(): "%s" is not a valid GD2 file in %s on line %d
bool(false)
