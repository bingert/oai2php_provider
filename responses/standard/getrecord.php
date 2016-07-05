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

$xml_request = $xml->createElement( "request",  "oai:humanities-data-centre.de:21.11101/00000000" );
$xml_request->setAttribute( "verb", "GetRecord" );
$xml_request->setAttribute( "identifier", "oai:humanities-data-centre.de:21.11101/00000000" );
$xml_request->setAttribute( " metadataPrefix", "oai_dc" );

//
// LEVEL 2 GETRECORD
//

$xml_GetRecord = $xml->createElement( "GetRecord" );

$xml_record = $xml->createElement( "record" );

$xml_header = $xml->createElement( "header" );

$xml_identifier = $xml->createElement( "identifier" , "oai:humanities-data-centre.de:21.11101/00000000" );
$xml_header->appendChild( $xml_identifier );
$xml_datestamp = $xml->createElement( "datestamp" , "2016-01-01" );
$xml_header->appendChild( $xml_datestamp );
$xml_setSpec = $xml->createElement( "setSpec" , "application conservation" );
$xml_header->appendChild( $xml_setSpec );

$xml_metadata = $xml->createElement( "metadata" );

$xml_oai_dc = $xml->createElement( "oai_dc:dc" );
$xml_oai_dc->setAttribute( "xmlns:oai_dc" , "http://www.openarchives.org/OAI/2.0/oai_dc/");
$xml_oai_dc->setAttribute( "xmlns:dc" , "http://purl.org/dc/elements/1.1/" );
$xml_oai_dc->setAttribute( "xmlns:xsi" , "http://www.w3.org/2001/XMLSchema-instance" );
$xml_oai_dc->setAttribute( "xsi:schemaLocation" , "http://www.openarchives.org/OAI/2.0/ http://www.openarchives.org/OAI/2.0/OAI-PMH.xsd");

$xml_dc_title = $xml->createElement( "dc:title" , "Migration Flow");
$xml_oai_dc->appendChild( $xml_dc_title);
$xml_dc_creator = $xml->createElement( "dc:creator" , "A. Matveev"); 
$xml_oai_dc->appendChild( $xml_dc_creator);
$xml_dc_subject = $xml->createElement( "dc:subject" , "International Migration"); 
$xml_oai_dc->appendChild( $xml_dc_subject);
$xml_dc_description = $xml->createElement( "dc:description" , "Here we should put a lengthly description"); 
$xml_oai_dc->appendChild( $xml_dc_description);
$xml_dc_date = $xml->createElement( "dc:date" , "2016-01-01"); 
$xml_oai_dc->appendChild( $xml_dc_date);

$xml_metadata->appendChild( $xml_oai_dc );
$xml_record->appendChild( $xml_metadata );
$xml_GetRecord->appendChild( $xml_record );
$xml_OAI_PMH->appendChild( $xml_GetRecord );
$xml->appendChild( $xml_OAI_PMH );

echo $xml->saveXML();
?>
