<?php
   function checkVar($str)
   {
	  if(!empty($_POST[$str]))
	  {
		 echo $_POST[$str];
	  }
	  elseif(!empty($_GET[$str]))
	  {
		 echo $_GET[$str];
	  }
   }
?>
