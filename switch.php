<?php

  $payloads = getopt('m:');

  $path = [
    'DESTINATION' => realpath(__DIR__ . '/../zincphp/composer.json'),
    'DEV' => __DIR__ . '/dev.composer.json',
    'PROD' => __DIR__ . '/prod.composer.json',
  ];

  if(isset($payloads['m'])) {
    $type = trim($payloads['m']);
    if($type === 'prod') {
      file_put_contents($path['DESTINATION'], file_get_contents($path['PROD']));
      echo 'ZincPHP composer.json file has been updated to production mood!';
    } else if ($type === 'dev') {
      file_put_contents($path['DESTINATION'], file_get_contents($path['DEV']));
      echo 'ZincPHP composer.json file has been updated to development mood!';
      echo "\n";
      echo '✋ Be careful while pushing data to GIT.';
    } else if ($type === 'copy') {
      $data = file_get_contents($path['DESTINATION']);
      file_put_contents($path['PROD'], $data);
      echo 'prod.composer.json file has been updated!';
    }
  } else {
    echo "Help:
      -m prod \t Will switch to production mood
      -m dev \t Will switch to local composer mood
      -m copy \t Will copy current composer.json file from ZincPHP directory
    ";
  }

echo "\n";