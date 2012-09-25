<?php
   ini_set('display_startup_errors',1);
   ini_set('display_errors',1);

   error_reporting(-1);

   setlocale(LC_ALL,'fr_FR.UTF-8');
   include 'php_dir/global/bdd_oci.php';
   $conn = oci_connect('ETU2_XX', 'Mon mdp','info');
   include_once 'php_dir/global/function.php';

?>
