<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function company($com)
{
    switch ($com) {
        case 4:
            return "SS/SO";
            break;
        case 5:
            return "PJM";
            break;
        case 6:
            return "SS/ET";
            break;
        case 7:
            return "ADR Shanghai";
            break;
    }
}
