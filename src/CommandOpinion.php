<?php
namespace Clippy;
class CommandOpinion extends Command
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/(what".self::REGEX_SPACE_OPT.")?do".self::REGEX_SPACE_OPT.self::REGEX_YOU.self::REGEX_SPACE_OPT."(like|think)/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getResponse(): string
	{
		return self::translate("opinion");
	}
}
