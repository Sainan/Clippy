<?php
$og_output = file_get_contents("en-GB/output.php");
foreach(scandir(".") as $lang)
{
	if($lang != "." && $lang != ".." && $lang != "en-GB" && is_dir($lang))
	{
		if(file_get_contents("$lang/output.php") == $og_output)
		{
			unlink("$lang/output.php");
			rmdir($lang);
		}
	}
}
