<?php
namespace Clippy;
abstract class CommandImplementable extends Command
{
	function getDefaultResponse() : string
	{
		return self::$out_lang["implementable"];
	}
}
