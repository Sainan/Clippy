<?php
namespace Clippy;
class CommandOpinion extends Command
{
	static function instantiateIfMatches(string $in): ?Command
	{
		if(preg_match("/(what )?do (yo)?u (like|think)/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return "I don't have an opinion on that. :)";
	}
}
