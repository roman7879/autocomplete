
<?php

$csv = array_map('str_getcsv', file('https://storage.googleapis.com/weighty-smoke-142717/www/dataArr.csv'));
 array_walk($csv, function(&$a) use ($csv) {
      $a = array_combine($csv[0], $a);
    });

?>
