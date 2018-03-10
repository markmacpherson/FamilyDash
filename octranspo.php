<html>
<head>
<link rel="stylesheet" type="text/css" href="templated-theory/main.css">
<link rel="stylesheet" type="text/css" href="templated-theory/font-awesome.min.css">
</head>
<body>
<section id="one" class="wrapper">
<div class="inner">
<div class="flex flex-3">
<article>
<?php
$mySoapResponse=file_get_contents('https://api.octranspo1.com/v1.2/GetNextTripsForStop?appID=fcea873f&apiKey=32b94e5f0edd8361cf826b9089d3fe29&routeNo=61&stopNo=9085');
$clean_xml = str_ireplace(['SOAP-ENV:', 'SOAP:','soap:'], '', $mySoapResponse);
$xml = simplexml_load_string($clean_xml);

//print_r($xml);


// Grabs the trips
$arrTrips = $xml->Body->GetNextTripsForStopResponse->GetNextTripsForStopResult->Route->RouteDirection->Trips->Trip;
//print_r($arrTrips);

//Grabs the route info
$routeInfo=$xml->Body->GetNextTripsForStopResponse->GetNextTripsForStopResult->Route->RouteDirection;

echo '<H1>Route ' . $routeInfo->RouteNo . ' ' . $routeInfo->RouteLabel . ' ' . $routeInfo->Direction . '</H1>';
echo '<h2>Next Trips</h2>';
// Take the posts and generate some markup
$i=1;
foreach ($arrTrips as $trip)
{

	echo '<p> ' . $i . '. Arrives in ' . $trip->AdjustedScheduleTime . ' minutes</p>';
	$i=$i+1;
}

?>
</div>
</div>
</article>
</section>
</body>
</html>
