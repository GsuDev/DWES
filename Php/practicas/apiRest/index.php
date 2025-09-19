<?php

$people = [
  "1A" => "Victor",
  "2B" => "Ana",
  "3C" => "Luis",
  "4D" => "Marta"
];

header('HTTP/1.1 200 OK');
echo json_encode($people);