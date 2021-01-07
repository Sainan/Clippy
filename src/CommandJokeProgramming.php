<?php
namespace Clippy;
class CommandJokeProgramming extends CommandRandomised
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/programm(ing|er)".self::REGEX_SPACE_OPT."joke/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getResponse(): string
	{
		return \Sainan\Jokes\Programming::getRandom();
	}
}
