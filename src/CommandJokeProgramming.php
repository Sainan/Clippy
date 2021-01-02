<?php
namespace Clippy;
class CommandJokeProgramming extends Command
{
	static function instantiateIfMatches(string $in): ?Command
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
