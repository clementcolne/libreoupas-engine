<?php
  /* this file contains all the constants used on /libreoupas-engine/main.php */

  // URL is the URL where we can get the datas about the rooms, update this value depending your university
  define('URL', 'https://planning.univ-lorraine.fr/jsp/custom/modules/plannings/anonymous_cal.jsp?resources=24298&projectId=9&calType=ical&nbWeeks=1');

  // ROOMS is the arrays which contains the name of the rooms and its type (Windows or Linux), update this array depending your university
  define('ROOMS', array(
     "HP 301" => "Windows",
     "HP 302" => "Windows",
     "HP 303" => "Linux",
     "HP 306" => "Windows",
     "HP 307" => "Windows",
     "HP 309" => "Linux",
     "HP 310" => "Linux",
     "HP 311" => "Linux",
     "HP 312" => "Linux",
     "HP 315" => "Linux",
     "HP 316" => "Windows",
     "HP 318" => "Windows",
     "HP 319" => "Linux",
     "HP 320" => "Windows"
   ));

   // IGNORED_ROOMS contains all the rooms that needs to be ignored, update this array depending your university
   define('IGNORED_ROOMS', array(
     "HP 12",
     "VG SC",
     "VG 321"
   ));
