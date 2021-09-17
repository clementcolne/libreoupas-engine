<?php
  /* this file contains all the constants used on /libreoupas-engine/main.php */

  // URL is the URL where we can get the datas about the rooms, update this value depending your university
  define('URL', 'https://adecons.unistra.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=30688&projectId=8&calType=ical&nbWeeks=1');

  // ROOMS is the arrays which contains the name of the rooms and its type (Windows or Linux), update this array depending your university
  define('ROOMS', array(
     "J0" => "Linux",
     "J1" => "Linux",
     "J2" => "Linux",
     "J3" => "Linux",
     "J4" => "Linux",
     "J5" => "Linux"
   ));

   // IGNORED_ROOMS contains all the rooms that needs to be ignored, update this array depending your university
   define('IGNORED_ROOMS', array(
     "P-"
   ));
