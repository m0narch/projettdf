<?php
   ini_set('display_startup_errors',1);
   ini_set('display_errors',1);

   error_reporting(-1);

   setlocale(LC_ALL,'fr_FR.UTF-8');
   $login_bdd='ETU2_42';
   include 'php_dir/global/bdd_oci.php';
   $monMdpBDD='m0narchCyberpunk';
   $monMdpBDD_presalt= 'Bw2135';
   $monMdpBDD_postsalt= '34Eazd';
   $md5PASS=md5($monMdpBDD_presalt.$monMdpBDD.$monMdpBDD_postsalt);
   $monMDPMD5=$monMdpBDD_presalt.$monMdpBDD.$monMdpBDD_postsalt;
   $conn = oci_connect($login_bdd,$monMDPMD5 ,'info');
   include_once 'php_dir/global/function.php';
   define("TDF_ABANDON",'tdf_abandon2');
   define("TDF_COUREUR",'tdf_coureur2');
   define("TDF_PARTICIPATION",'tdf_participation2');
   define("TDF_ORDREQUI",'tdf_equipe2');
   define("TDF_TYPEABAN",'tdf_typeaban2');
   define("TDF_ANNEE",'tdf_annee2');
   define("TDF_SPONSOR",'tdf_sponsor2');
   define("TDF_TEMPS_DIFFERENCE",'tdf_temps_difference2');
   define("TDF_TEMPS",'tdf_temps2');
   define("TDF_EPREUVE",'tdf_epreuve2');
   define("TDF_EQUIPE_ANNEE",'tdf_equipe_annee2');
   define("TDF_EQUIPE",'tdf_equipe2');
   define("TDF_DIRECTEUR",'tdf_directeur2');
   define("TDF_PAYS",'tdf_pays2');

?>
