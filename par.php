#! /usr/bin/env php
<?php

function par($ret, $s) {
//echo "fun $s\n";
    $l = strlen($s);

    if ($l == 0)
        return ($ret);

//echo "zz$s\n";

    //now remove paired
    $x = str_replace("()", "", $s);
    $l = strlen($x);

//echo "xx$x\n";


    if ($l == 1)
        return (-1);

    if ($x[0] == ')') {
        $ret++;
    }

    if ($x[$l - 1] == '(') {
        $ret++;
    }

//echo "yy$x\n";

    $x = substr($x, 1, $l - 2);
//echo "ww$x\n";


    // repeat and wash again
    return (par($ret, $x));
}




    if ($argc < 2) {
        echo "usage: par 'input'\n";
        exit(2);
    }

    $s = $argv[1];

    $l = strlen($s);

    $res = par(0, $s);


    //debug
    //echo "res: $res\n";

    if ($res < 0) {
        echo "out: -1\n";
        exit(1);
    }

    echo "out: " . $res . "\n"

?>