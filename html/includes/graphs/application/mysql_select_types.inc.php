<?php

require 'includes/graphs/common.inc.php';

$rrd_filename = rrd_name($device['hostname'], array('app', 'mysql', $app['app_id']));

$array = array(
          'SFJn'  => 'Full Join',
          'SFRJn' => 'Full Range',
          'SRe'   => 'Range',
          'SRCk'  => 'Range Check',
          'SSn'   => 'Scan',
         );

$i = 0;
if (rrdtool_check_rrd_exists($rrd_filename)) {
    foreach ($array as $ds => $vars) {
        $rrd_list[$i]['filename'] = $rrd_filename;
        if (is_array($vars)) {
            $rrd_list[$i]['descr'] = $vars['descr'];
        } else {
            $rrd_list[$i]['descr'] = $vars;
        }

        $rrd_list[$i]['ds'] = $ds;
        $i++;
    }
} else {
    echo "file missing: $file";
}

$colours   = 'mixed';
$nototal   = 0;
$unit_text = 'Queries';

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';
