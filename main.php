<?php

	/**
		Ce fichier est le moteur de libreoupas.
		Il récupère les données des salles informatiques via un fichier .ics
		Il parcours le fichier afin de récupérer les informations des salles
		du jour, et remplit un tableau contenant les informations de chaque
		salle.
	**/

	// including all the constants
	include_once('libreoupas-engine/constants.php');

  // If no file or not recently updated (4h)
	if (!(file_exists("libreoupas-engine/ics/agenda.ics") && (time() - filemtime('libreoupas-engine/ics/agenda.ics')) < 14400)) {
    // University's file
		$file = fopen('libreoupas-engine/ics/agenda.ics', 'w+');

		// Local's copy
		$content = file_get_contents(URL, true);
		fwrite($file, $content);
		fclose($file);
	}

	$data = fopen('libreoupas-engine/ics/agenda.ics', 'r');
	$today = date('d');
	$hour = date('H') + (date('i') / 60.0);

	foreach (ROOMS as $room => $roomType) {
		$edt[$room] = array();
    $type[$room] = $roomType;
		$free[$room] = 1;
	}

	$hourOffset = 2; // = 1 en heure d'hiver, = 2 en heur d'été
	while (($line = fgets($data)) !== false) {
		$key = substr($line, 0, 7);

    if ($key == "DTSTART") {
      $day = substr($line, 14, 2);
	    // Event's start
			$startHour = intval(substr($line, 17, 2)) + $hourOffset;
			$startMin  = intval(substr($line, 19, 2));

	    // Event's end
			$line = fgets($data);
			$endHour = intval(substr($line, 15, 2)) + $hourOffset;
			$endMin  = intval(substr($line, 17, 2));

			// Trash location + Event's name
			fgets($data);
			$line = fgets($data);

			// cas spécifique pour les cours dont le nom est sur plusieurs lignes
			if(substr($line, 0, 8) != "LOCATION") {
				$line = fgets($data);
			}

			$name = substr($line, 9, 2);
			if ($day == $today && $name !== false && strlen($name) == 2 && !in_array($name, IGNORED_ROOMS)) {
				$index = count($edt[$name]); // index du cours dans cette salle
				$edt[$name][$index]['start'] = $startHour + ($startMin / 60.0); // ex 10h15 = 10.25
				$edt[$name][$index]['end'] = $endHour + ($endMin / 60.0);

				$text = ($startHour < 10 ? '0' : '') . $startHour . ':'
					   .($startMin  < 10 ? '0' : '') . $startMin  . '<br/>'
					   .($endHour   < 10 ? '0' : '') . $endHour   . ':'
					   .($endMin    < 10 ? '0' : '') . $endMin;
				$edt[$name][$index]['text'] = $text;
			}
		}

    foreach ($edt as $name => $roomEdt) {
      foreach ($roomEdt as $range) {
				if ($hour > intval($range['start']) && $hour < $range['end']) {
					$free[$name] = 0;
					$maybeFree = true;
					foreach ($roomEdt as $tmpRange) {
						if ($hour + 0.5 >= intval($tmpRange['start']) && $hour + 0.5 <= $tmpRange['end']) {
							$maybeFree = false;
						}
					}
					if ($maybeFree) {
						$free[$name] = 2;
					}
				}
      }
    }

	}

	fclose($data);
