<?php
namespace Clippy;
class CommandThanks extends Command
{
	static function instantiateIfMatches(string $in): ?Command
	{
		if(preg_match("/thanks? ?(".self::REGEX_YOU.")?/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return "You're welcome! :D";
	}
}
