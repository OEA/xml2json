<?php

include("../../class.xml2json.php");

$xmlparser = new XML2JSON();
$xmlparser->setRemote(true,true);
$xmlparser->setUrl("http://www.koeri.boun.edu.tr/sismo/zeqmap/xmlt/sonHafta.xml");
$xmlparser->start();

$json = $xmlparser->getJSON();

echo "<pre>";
print_r($json);