<?php
namespace Clippy;
class CommandOpinion extends Command
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/(what )?do ".self::REGEX_YOU." (like|think)/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return self::$out_lang["opinion"];
	}
}
