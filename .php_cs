<?php

$header = "";

$rules = [
    '@PSR2' => true,

    'header_comment' => [
      'header' => $header,
      'location' => 'after_open'
    ],
];

$finder = PhpCsFixer\Finder::create()
    ->exclude(['vendor'])
    ->in(__DIR__);

return PhpCsFixer\Config::create()
    ->setRules($rules)
    ->setFinder($finder);