<?php
namespace Clippy;
class CommandJokeKnockKnock extends CommandRandomised
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/knock([- ]?knock)? joke/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return \Sainan\Jokes\KnockKnock::getRandom();
	}
}
