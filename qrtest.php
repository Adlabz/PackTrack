<?php

    include('phpqrcode/qrlib.php');
    include('config.php');

    // how to build raw content - QRCode to call phone number

    $tempDir = EXAMPLE_TMP_SERVERPATH;

    // here our data
    $url = 'http://192.168.1.104:8888/products.php?tag=5ec2_1515911184';

    // we building raw data
    $codeContents = 'url:'.$url;

    // generating
    QRcode::png($codeContents, 'QRCodes/test3', QR_ECLEVEL_L, 3);

    // displaying
    echo '<img src="020.png" />';
