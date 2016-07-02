<?php

/*
 * LibreNMS Telco Systems OS discovery module
 *
 * Copyright (c) 2016 Chris A. Evans <thecityofguanyu@outlook.com>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */


if (!$os) {
    if (strstr($sysObjectId, '.1.3.6.1.4.1.738')) {
        $os = 'batm';
    }
}
