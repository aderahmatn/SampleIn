<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function role($role)
{
    switch ($role) {
        case 1:
            return "admin";
            break;
        case 2:
            return "sales";
            break;
        case 3:
            return "product-dev";
            break;
        case 4:
            return "eng - SS/SO";
            break;
        case 5:
            return "eng - PJM";
            break;
        case 6:
            return "eng - SS/ET";
            break;
        case 7:
            return "eng - ADR Shanghai";
            break;
    }
}
