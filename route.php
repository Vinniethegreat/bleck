<?php

	$my_var = file_get_contents("http://info.vroute.net/vatsim-data.txt");
	$pieces = explode("\n", $my_var);
	$findme = "Hayden Spires";
	$output = "";

	foreach ($pieces as $s) {
     	$pos = strpos($s, $findme);

     	if ($pos == true)
     	{
     		$record = explode(":", $s);
			$output = $output . "DEP: " . $record[getPos("planned_depairport")] . " | ";
			$output = $output . "ARR: " . $record[getPos("planned_destairport")] . " | ";
			$output = $output . "ROUTE: " . $record[getPos("planned_route")] . " | ";
     	}
 	}

	echo $output;

	function getPos($field)
	{
		$fields = explode(":", "callsign:cid:realname:clienttype:frequency:latitude:longitude:altitude:groundspeed:planned_aircraft:planned_tascruise:planned_depairport:planned_altitude:planned_destairport:server:protrevision:rating:transponder:facilitytype:visualrange:planned_revision:planned_flighttype:planned_deptime:planned_actdeptime:planned_hrsenroute:planned_minenroute:planned_hrsfuel:planned_minfuel:planned_altairport:planned_remarks:planned_route:planned_depairport_lat:planned_depairport_lon:planned_destairport_lat:planned_destairport_lon:atis_message:time_last_atis_received:time_logon:heading:QNH_iHg:QNH_Mb:");
		$max = sizeof($fields);
		$ret = 0;

		for ($i = 0; $i<$max; $i++)
		{
			if ($fields[$i] == $field)
			{
				$ret = $i;
			}
		}
		return $ret;
	}

?>