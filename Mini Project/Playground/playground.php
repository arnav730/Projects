<?php

    date_default_timezone_set('Asia/Kolkata');
    $t = time();
    $time = localtime($t,true);
    print_r($time);

    $dod = 2160000;
    $nt = $t + $dod;

    $del_time = localtime($nt,true);
    echo "             ";
    print_r($del_time);
    $date = date('d-m-Y',$nt);
    echo $date;

?>

<div id="cost">
<h1>Total cost:<td><input class="w3-input w3 animate-input" type="text" style="width:100px"><td></h1>
</div>

