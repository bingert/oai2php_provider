<?php

// Set the content type to be XML, so that the browser will   recognise it as XML.
header( "content-type: application/xml; charset=UTF-8" );

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
$xml_request->setAttribute( "verb", "Identify" );

//
// LEVEL 2 IDENTIFY
//
  $xml_identify = $xml->createElement( "Identify" );

  $xml_repositoryName = $xml->createElement( "repositoryName" , $config_repositoryName );
  $xml_identify->appendChild( $xml_repositoryName );

  $xml_baseURL = $xml->createElement( "baseURL" ,  $config_baseURL );
  $xml_identify->appendChild( $xml_baseURL );

  $xml_protocolVersion = $xml->createElement( "protocolVersion" , "2.0" );
  $xml_identify->appendChild( $xml_protocolVersion );

  $xml_adminEmail = $xml->createElement("adminEmail" , $config_adminEmail1 );
  $xml_identify->appendChild( $xml_adminEmail );

  $xml_adminEmail = $xml->createElement("adminEmail" , $config_adminEmail2 );
  $xml_identify->appendChild( $xml_adminEmail );

  $xml_earliestDatestamp = $xml->createElement("earliestDatestamp" , "2016-01-01T12:00:00Z");
  $xml_identify->appendChild( $xml_earliestDatestamp );

  $xml_deletedRecord = $xml->createElement("deletedRecord" , "transient");
  $xml_identify->appendChild( $xml_deletedRecord );

  $xml_granularity = $xml->createElement("granularity" , "YYYY-MM-DDThh:mm:ssZ");
  $xml_identify->appendChild( $xml_granularity );

  $xml_compression = $xml->createElement("compression" , "deflate");
  $xml_identify->appendChild( $xml_compression );
//
// LEVEL 3 DESCRIPTION
//
    $xml_description = $xml->createElement("description");
//
//  LEVEL 4 OAI-IDENTIFIER
//
      $xml_oai_identifier = $xml->createElement("oai-identifier");
      $xml_oai_identifier->setAttribute( "xmlns", "http://www.openarchives.org/OAI/2.0/oai-identifier" );
      $xml_oai_identifier->setAttribute( "xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance" );
      $xml_oai_identifier->setAttribute( "xsi:schemaLocation" , "http://www.openarchives.org/OAI/2.0/oai-identifier http://www.openarchives.org/OAI/2.0/oai-identifier.xsd" );

      $xml_scheme = $xml->createElement("scheme" ,"oai" );
      $xml_oai_identifier->appendChild( $xml_scheme );

      $xml_repositoryIdentifier = $xml->createElement("repositoryIdentifier" , $config_repositoryIdentifier );
      $xml_oai_identifier->appendChild( $xml_repositoryIdentifier );

      $xml_delimiter = $xml->createElement("delimiter" , ":"); 
      $xml_oai_identifier->appendChild( $xml_delimiter );

      $xml_sampleIdentifier = $xml->createElement("sampleIdentifier" , "oai:humanities-data-centre.de:21.11101/00000000" ); 
      $xml_oai_identifier->appendChild( $xml_sampleIdentifier );

      $xml_description->appendChild( $xml_oai_identifier );
//
// END LEVEL 4
    $xml_identify->appendChild( $xml_description );
// END LEVEL 3 
  $xml_OAI_PMH->appendChild( $xml_responseDate );
  $xml_OAI_PMH->appendChild( $xml_request );
  $xml_OAI_PMH->appendChild( $xml_identify );
// END LEVEL 2
$xml->appendChild( $xml_OAI_PMH );

echo $xml->saveXML();
?>