<?php
namespace Clippy;
abstract class CommandImplementable extends Command
{
	function getResponse() : string
	{
		return self::translate("implementable");
	}
}
