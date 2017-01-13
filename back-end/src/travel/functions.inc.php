<?php
/* Creative Commons BY, version 4.0 or (at your option) any later version.
 * https://creativecommons.org/licenses/by/4.0/
 */


	function check_format_coordonnee($coordonnee)
	{
        // TODO
		return true;
	}
	
	function check_format_heure($heure)
	{
        // TODO
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
		$donnees = utf8_decode_maison($donnees);
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
			array_push($voyages, $voyage);
		}
		return $voyages;
	}
	
	function utf8_decode_maison($str)
	{
		$utf8_ansi2 = array(
		"\u00c0" =>"À",
		"\u00c1" =>"Á",
		"\u00c2" =>"Â",
		"\u00c3" =>"Ã",
		"\u00c4" =>"Ä",
		"\u00c5" =>"Å",
		"\u00c6" =>"Æ",
		"\u00c7" =>"Ç",
		"\u00c8" =>"È",
		"\u00c9" =>"É",
		"\u00ca" =>"Ê",
		"\u00cb" =>"Ë",
		"\u00cc" =>"Ì",
		"\u00cd" =>"Í",
		"\u00ce" =>"Î",
		"\u00cf" =>"Ï",
		"\u00d1" =>"Ñ",
		"\u00d2" =>"Ò",
		"\u00d3" =>"Ó",
		"\u00d4" =>"Ô",
		"\u00d5" =>"Õ",
		"\u00d6" =>"Ö",
		"\u00d8" =>"Ø",
		"\u00d9" =>"Ù",
		"\u00da" =>"Ú",
		"\u00db" =>"Û",
		"\u00dc" =>"Ü",
		"\u00dd" =>"Ý",
		"\u00df" =>"ß",
		"\u00e0" =>"à",
		"\u00e1" =>"á",
		"\u00e2" =>"â",
		"\u00e3" =>"ã",
		"\u00e4" =>"ä",
		"\u00e5" =>"å",
		"\u00e6" =>"æ",
		"\u00e7" =>"ç",
		"\u00e8" =>"è",
		"\u00e9" =>"é",
		"\u00ea" =>"ê",
		"\u00eb" =>"ë",
		"\u00ec" =>"ì",
		"\u00ed" =>"í",
		"\u00ee" =>"î",
		"\u00ef" =>"ï",
		"\u00f0" =>"ð",
		"\u00f1" =>"ñ",
		"\u00f2" =>"ò",
		"\u00f3" =>"ó",
		"\u00f4" =>"ô",
		"\u00f5" =>"õ",
		"\u00f6" =>"ö",
		"\u00f8" =>"ø",
		"\u00f9" =>"ù",
		"\u00fa" =>"ú",
		"\u00fb" =>"û",
		"\u00fc" =>"ü",
		"\u00fd" =>"ý",
		"\u00ff" =>"ÿ");

		//echo strtr($str, $utf8_ansi2);
		return strtr($str, $utf8_ansi2);      
	}
	
	function fabriquer_url($gps_from_longitude = "",
                           $gps_from_latitude = "",
                           $gps_to_longitude = "",
                           $gps_to_latitude = "",
                           $handicap = "",
                           $horaire = "")
	{	
		$token = '43c3c947-637f-4a49-906a-adc05346c888';
		$url   = "https://" . $token . "@api.navitia.io/v1/journeys?from=". $gps_from_longitude .";". $gps_from_latitude ."&to=". $gps_to_longitude .";". $gps_to_latitude ."";
		$url   = $url . handicap($handicap); 
		$url   = $url . "&datetime=" . $horaire;
		//VOITURE VROUM VROUM
        $url   = $url . '&first_section_mode[]=car&last_section_mode[]=car';
		//$url = $url . '&first_section_mode[]=walking&last_section_mode[]=walking';
		return $url;
	}
	
	function get_content($url = "")
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
