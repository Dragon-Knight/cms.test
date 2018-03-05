<?php

foreach( glob("pages/class.*.php") as $filename)
{
	require_once($filename);
}

class Pages
{
	
}

?>