<?php
$look = ['one','two','three'];
echo gettype($look).'</br>';
echo gettype(JSON_ENCODE($look)).'</br>';
print (JSON_DECODE(JSON_ENCODE($look)))[1];
?>