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

?>
