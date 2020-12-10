<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function permintaan($index)
{
    // 1/5
    $data = explode("/", $index);
    // return
    for ($i = 0; $i < count($data); $i++) {
        return $data[$i];
    };

    // return var_dump($data);
}
