<?php
namespace Clippy;
class CommandJokeProgramming extends CommandRandomised
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/programm(ing|er) joke/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return \Sainan\Jokes\Programming::getRandom();
	}
}
