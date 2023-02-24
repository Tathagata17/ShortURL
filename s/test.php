<?php
$text="hello";
echo $text;
$hash=password_hash($text,PASSWORD_DEFAULT);
echo $hash;

?>