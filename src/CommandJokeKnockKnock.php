<?php
namespace Clippy;
class CommandJokeKnockKnock extends Command
{
	static function instantiateIfMatches(string $in): ?Command
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
