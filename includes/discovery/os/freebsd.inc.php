<?php

if (!$os) {
    if (strstr($sysDescr, 'Voswall')) {
        $os = 'voswall';
    } //end if
    else if (strstr($sysDescr, 'm0n0wall')) {
        $os = 'monowall';
    } // Ditto
    else if (strstr($sysDescr, 'pfSense')) {
        $os = 'pfsense';
    }
    else if (strstr($sysDescr, 'FreeBSD')) {
        $os = 'freebsd';
    } // It's FreeBSD!
}
