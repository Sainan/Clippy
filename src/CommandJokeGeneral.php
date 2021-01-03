<?php
namespace Clippy;
class CommandJokeGeneral extends CommandRandomised
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(str_contains($in, "joke"))
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return \Sainan\Jokes\General::getRandom();
	}
}
