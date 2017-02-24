<?php
require 'includes/graphs/common.inc.php';
$scale_min     = 0;
$colours       = 'mixed';
$unit_text     = ' ';
$unitlen       = 10;
$bigdescrlen   = 10;
$smalldescrlen = 10;
$dostack       = 0;
$printtotal    = 0;
$addarea       = 1;
$transparency  = 15;

$rrd_filename = rrd_name($device['hostname'], array('app', $app['app_type'], $app['app_id'], $vars['jail']));
if (rrdtool_check_rrd_exists($rrd_filename)) {
    $rrd_list = array(
        array(
            'filename' => $rrd_filename,
            'descr'    => 'Banned IPs',
            'ds'       => 'banned',
            'colour'   => '582A72'
        )
    );
} else {
    echo "file missing: $rrd_filename";
}

require 'includes/graphs/generic_v3_multiline.inc.php';
