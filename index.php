<?php
header('Content-Type: text/xml;charset=UTF-8');

// Get paramter and split into array
//
$idArray = explode('&',$_SERVER["QUERY_STRING"]);
foreach ($idArray as $index => $avPair)
{
  list($ignore, $value) = explode("=", $avPair);
  $id[$index] = $value;
}
//
//
//
$verb = $id[0];
//
switch($verb) {
case 'Identify' :
    if (count($idArray) == 1){
        //readfile('responses/standard/identify.xml');
        include 'responses/standard/identify.php';
    } else {
        readfile('responses/standard/error_badargument.xml');
    }
    break;
    
case 'ListSets' :
    readfile('responses/standard/list_sets.xml');
    break;
    
case 'ListMetadataFormats' :
    readfile('responses/standard/list_metadata_formats.xml');
    break;
    
case 'ListIdentifiers' :
    readfile('responses/standard/list_identifiers.xml');
    break;

case 'ListRecords' :
    if (isset($_GET['set'])) {
        $set = $_GET['set'];
    }
    elseif (file_exists($SESSION_STORAGE)) {
        $set = file_get_contents($SESSION_STORAGE);
    }
    else {
        $set = 'good';
    }

    if ($set == 'good') {
        readfile('responses/list_records_good.xml');
    }
    else if ($set == 'deleted') {
        readfile('responses/list_records_deleted.xml');
    }
    else if ($set == '10rec') {
        readfile('responses/list_records_10rec-step2.xml');
    }
    else if ($set == '10rec2') {
        readfile('responses/10-test-phase2-02.xml');
    }
    else if ($set == 'accents') {
        readfile('responses/accents.xml');
    }
    break;
default:
    readfile('responses/standard/error.xml');
    break;
}