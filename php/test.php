<?php

include(__DIR__.'/session.php');

$session = new JSinJSON\Session(
  json_decode('{"_":{"code":"","module":"true;"},"Test":{"code":"console.log(1)","module":"console.log(Math.random())","dependencies":[]}}')
);

$session->add('Test');
echo $session->flush();
echo "\n";
$session->add('Test');
echo $session->flush();
echo "\n";

?>