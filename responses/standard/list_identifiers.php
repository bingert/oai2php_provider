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
$xml_request->setAttribute( "verb", "ListIdentifiers" );
$xml_request->setAttribute( "metadataPrefix", "oai_dc" );

$xml_ListIdentifiers = $xml->createElement( "ListIdentifiers" );

$xml_header = $xml->createElement( "header" );
$xml_identifier = $xml->createElement( "identifier" , "oai:humanities-data-centre.de:21.11101/00000000-A" );
$xml_header->appendChild( $xml_identifier );
$xml_datestamp = $xml->createElement( "datestamp" , "2016-01-01" );
$xml_header->appendChild( $xml_datestamp );
$xml_ListIdentifiers->appendChild( $xml_header );

$xml_header = $xml->createElement( "header" );
$xml_identifier = $xml->createElement( "identifier" , "oai:humanities-data-centre.de:21.11101/00000000-B" );
$xml_header->appendChild( $xml_identifier );
$xml_datestamp = $xml->createElement( "datestamp" , "2015-01-01" );
$xml_header->appendChild( $xml_datestamp );
$xml_ListIdentifiers->appendChild( $xml_header );

$xml_OAI_PMH->appendChild( $xml_identify );
$xml->appendChild( $xml_OAI_PMH );

echo $xml->saveXML();
?>
