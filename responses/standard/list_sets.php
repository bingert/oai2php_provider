<?php
// Set the content type to be XML, so that the browser will   recognise it as XML.
header( "content-type: application/xml; charset=ISO-8859-15" );

// "Create" the document.
$xml = new DOMDocument( "1.0", "UTF-8" );

// 
// LEVEL 1 OAI_PMH
//
$xml_OAI_PMH = $xml->createElement( "OAI-PMH" );
$xml_OAI_PMH->setAttribute( "xmlns", "http://www.openarchives.org/OAI/2.0/" );
$xml_OAI_PMH->setAttribute( "xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance" );
$xml_OAI_PMH->setAttribute( "xsi:schemaLocation" , "http://www.openarchives.org/OAI/2.0/ http://www.openarchives.org/OAI/2.0/OAI-PMH.xsd");

$xml_responseDate = $xml->createElement( "responseDate", date('c') );

$xml_request = $xml->createElement( "request", $config_baseURL );
$xml_request->setAttribute( "verb", "ListSets" );


$xml_ListSets = $xml->createElement( "ListSets" );

$xml_Set = $xml->createElement( "Set");
$xml_SetSpec = $xml->createElement( "SetSpec" , "good");
$xml_Set->appendChild( $xml_SetSpec );
$xml_SetName = $xml->createElement( "SetName" , "good");
$xml_Set->appendChild( $xml_SetName );
$xml_ListSets->appendChild( $xml_Set);


$xml_Set = $xml->createElement( "Set");
$xml_SetSpec = $xml->createElement( "SetSpec" , "deleted");
$xml_Set->appendChild( $xml_SetSpec );
$xml_SetName = $xml->createElement( "SetName" , "deleted");
$xml_Set->appendChild( $xml_SetName );
$xml_ListSets->appendChild( $xml_Set);

$xml_Set = $xml->createElement( "Set");
$xml_SetSpec = $xml->createElement( "SetSpec" , "10rec");
$xml_Set->appendChild( $xml_SetSpec );
$xml_SetName = $xml->createElement( "SetName" , "10rec");
$xml_Set->appendChild( $xml_SetName );
$xml_ListSets->appendChild( $xml_Set);

$xml_Set = $xml->createElement( "Set");
$xml_SetSpec = $xml->createElement( "SetSpec" , "10rec2");
$xml_Set->appendChild( $xml_SetSpec );
$xml_SetName = $xml->createElement( "SetName" , "10rec2");
$xml_Set->appendChild( $xml_SetName );
$xml_ListSets->appendChild( $xml_Set);

$xml_Set = $xml->createElement( "Set");
$xml_SetSpec = $xml->createElement( "SetSpec" , "accents");
$xml_Set->appendChild( $xml_SetSpec );
$xml_SetName = $xml->createElement( "SetName" , "accents");
$xml_Set->appendChild( $xml_SetName );
$xml_ListSets->appendChild( $xml_Set);

$xml_OAI_PMH->appendChild( $xml_responseDate );
$xml_OAI_PMH->appendChild( $xml_request );
$xml_OAI_PMH->appendChild( $xml_ListSets );

$xml->appendChild( $xml_OAI_PMH );

echo $xml->saveXML();

?>