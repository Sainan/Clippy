<?php
namespace Clippy;
class CommandThanks extends Command
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/thanks?".self::REGEX_SPACE_OPT."(".self::REGEX_YOU.")?/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getResponse(): string
	{
		return self::translate("thanks");
	}
}
