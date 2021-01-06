<?php
namespace Clippy;
class CommandDefault extends Command
{
	static function instantiateIfMatches(string $in) : ?self
	{
		return null;
	}

	function getResponse() : string
	{
		return self::translate("default");
	}
}
