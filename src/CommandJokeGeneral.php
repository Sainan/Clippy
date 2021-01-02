<?php
namespace Clippy;
class CommandJokeGeneral extends Command
{
	static function instantiateIfMatches(string $in): ?Command
	{
		if(str_contains($in, "joke"))
		{
			return new CommandJokeGeneral();
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return \Sainan\Jokes\General::getRandom();
	}
}
