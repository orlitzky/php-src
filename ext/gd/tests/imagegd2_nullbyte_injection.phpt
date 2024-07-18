--TEST--
Testing null byte injection in imagegd2
--EXTENSIONS--
gd
--FILE--
<?php
$image = imagecreate(1,1);// 1px image
try {
    imagegd2($image, "./foo\0bar");
} catch (ValueError $e) {
    echo $e->getMessage(), "\n";
}
?>
--EXPECT--
imagegd2(): Argument #2 ($file) must not contain any null bytes
