<?php

require __DIR__ . '/../include.php';

$result = openldbs_client('zend')
    ->setWSDL(__DIR__ .  '/../../wsdl/reference.wsdl')
    ->call('GetTOCList', []);

foreach ($result->GetTOCListResult as $toc) {
    var_dump($toc);
}
