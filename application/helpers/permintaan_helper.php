<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function permintaan($data)
{
    $data = $data;
    $req = explode("/", $data);
    for ($i = 0; $i < count($req); $i++) {
        switch ($req[$i]) {
            case 1:
                return '<span class="badge badge-secondary mr-1">Gambar</span>';
                break;
            case 2:
                return '<span class="badge badge-secondary mr-1">MCC</span>';
                break;
            case 3:
                return '<span class="badge badge-secondary mr-1">FP3B</span>';
                break;
            case 4:
                return '<span class="badge badge-secondary mr-1">Test Lab</span>';
                break;
            case 5:
                return '<span class="badge badge-secondary mr-1">Sample</span>';
                break;
            case 6:
                return '<span class="badge badge-secondary mr-1">Compare</span>';
                break;
        }
    }
}
