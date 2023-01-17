<?php
error_reporting(E_ALL);
$p = 1;
while ($p>0){
    $i = random_int(0, 10**15);
    $code = base_convert($i, 10, 36);
    $select = $conn->prepare("select id from mailing where code=?");
    $select->execute(array($code));
    $p = $select->rowCount();
}

