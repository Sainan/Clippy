<?php
namespace Clippy;
class CommandGreeting extends Command
{
	static function instantiateIfMatches(string $in): ?Command
	{
		if(preg_match("/(^| )(hi|hello|greetings|how (are|r) (yo)?u)($| |\.|!|\?)/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return "Hello!";
	}
}
