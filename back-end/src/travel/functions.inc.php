<?php

	function check_format_coordonnee($coordonnee)
	{
		return true;
	}
	
	function check_format_heure($heure)
	{
		return true;
	}
	
	function requete($donnees_entree)
	{
		$json = $donnees_entree;
		//$json = file_get_contents("bouchon_entree.txt"); //REMOVE
		$data = json_decode($json);
		
		//Coordonnees
		$depart_latitude   = $data->beginning->latitude;
		$depart_longitude  = $data->beginning->longitude;
		$arrivee_latitude  = $data->ending->latitude;
		$arrivee_longitude = $data->ending->longitude;
		
		//Verification
		//if(!check_format_coordonnee($depart_latitude) || !check_format_coordonnee($depart_longitude) 
		//   !check_format_coordonnee($arrivee_latitude) || !check_format_coordonnee($arrivee_longitude))
		
		//Heure
		$date = $data->datetime_beginning->date;
		$time = $data->datetime_beginning->time;
		$horaire = $date->year . $date->month . $date->day . "T" . $time->hour . $time->minute; //datetime=20140425T1337
		
		//Handicap
		$disability = $data->disability;
		
		$url = fabriquer_url($depart_longitude, $depart_latitude, $arrivee_longitude, $arrivee_latitude, $disability, $horaire);
		$donnees = get_content($url);
		//$donnees = utf8_decode_maison($donnees);
		//$donnees = utf8_encode ( $donnees );
		$decoded_json = json_decode($donnees);
		
		return $decoded_json;
	}
	
	function recuperer_voyages($resultat_requete)
	{
		$obj = $resultat_requete;

		$journey = $obj->{'journeys'};
		$voyages = array();

		foreach($journey as $journ) 
		{
			$voyage = new Journey();
			$voyage->initTrajet();
			
			$sections = $journ->{'sections'};
			foreach($sections as $sec)
			{
				$segment = new Path();
				$type = $sec->{'type'};
				$segment->setMode($type);
			
				if($type=='street_network' || $type=='transfer')
				{
				}
				
				if($type=='public_transport')
				{
					$infosTransport = $sec->{'display_informations'};

					$info = new infoTransport();
					$info->setLine($infosTransport->{'code'});
					$info->setDirection($infosTransport->{'direction'});
					$info->setBeginningStop($sec->{'from'}->{'stop_point'}->{'label'});
					$info->setEndingStop($sec->{'to'}->{'stop_point'}->{'label'});
					$info->setModeTransport($infosTransport->{'commercial_mode'});
					
					$segment->setInfos($info);

				}
				
				if($type!='waiting')
				{

					$points = $sec->{'geojson'}->{'coordinates'};
					
					//Copie des points
					$segment->initTraceCoordonnees();
					foreach($points as $p)
					{
						$coord_add = new Coordinates();
						$coord_add->setLongitude($p[0]);
						$coord_add->setLatitude ($p[1]);
						$segment->ajouterTraceCoordonnees($coord_add);
						
					}
					
					//Point Départ 
					$coordDep = new Coordinates();
					$coordD = $points[0];
					$coordDep->setLongitude($coordD[0]);
					$coordDep->setLatitude($coordD[1]);
					
					$pointDep = new Point();
					$pointDep->setAdress($sec->{'from'}->{'name'});
					$pointDep->setTime($sec->{'departure_date_time'});
					$pointDep->setCoordinates($coordDep);
					
					//Point arrivé
					$coordAriv = new Coordinates();
					$coordA = $points[count($points) - 1];
					$coordAriv->setLongitude($coordA[0]);
					$coordAriv->setLatitude($coordA[1]);
					
					$pointAriv = new Point();
					$pointAriv->setAdress($sec->{'to'}->{'name'});
					$pointAriv->setTime($sec->{'arrival_date_time'});
					$pointAriv->setCoordinates($coordAriv);
					
			
					$segment->setBeginning($pointDep);
					$segment->setFin($pointAriv);
				}
				
				//array_push($voyage->trajet,$segment);
				$voyage->addTrajet($segment);
				
			}
			array_push($voyages,$voyage);
		}
		return $voyages;
	}
	
	function utf8_decode_maison($str)
	{
		$str = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
		return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
	}, $str);
		return $str;
	}
	
	function fabriquer_url($gps_from_longitude = "", $gps_from_latitude = "", 
	$gps_to_longitude = "", $gps_to_latitude = "", $handicap = "", $horaire = "")
	{	
		$token = '43c3c947-637f-4a49-906a-adc05346c888';
		$url   = "https://" . $token . "@api.navitia.io/v1/journeys?from=". $gps_from_longitude .";". $gps_from_latitude ."&to=". $gps_to_longitude .";". $gps_to_latitude ."";
		$url   = $url . handicap($handicap); 
		$url   = $url . "&datetime=" . $horaire;
		return $url;
	}
	
	function get_content($url="")
	{
		$json = @file_get_contents($url);
		if($json === FALSE)
		{
			return "{}";
		}
		//$json = file_get_contents("https://43c3c947-637f-4a49-906a-adc05346c888@api.navitia.io/v1/journeys?from=-0.646756;44.864228&to=-0.564828;44.870601");
		//$json = file_get_contents("bouchon_online.txt");
		return $json;
	}
	
	function handicap($handicap)
	{
		$url_handi = "";
		
		if($handicap == "AUCUN")
		{
			$url_handi = "";
		}
		else if($handicap == "WHEELCHAIR")
		{
			$url_handi = "&wheelchair=TRUE";
		}
		else if($handicap == "VISUALY_IMPAIRED")
		{
			$url_handi = "";
		}
		else if($handicap == "HEARING_IMPAIRED")
		{
			$url_handi = "";
		}
		
		return $url_handi;
	}


?>
