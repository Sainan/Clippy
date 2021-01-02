<?php
namespace Clippy;
class CommandJokeProgramming extends Command
{
	static function instantiateIfMatches(string $in): ?Command
	{
		if(str_contains($in, "programming joke"))
		{
			return new CommandJokeProgramming();
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return \Sainan\Jokes\Programming::getRandom();
	}
}
