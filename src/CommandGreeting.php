<?php
namespace Clippy;
class CommandGreeting extends Command
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/".self::REGEX_WORD_BEGIN."(hi|hello|greetings|how".self::REGEX_SPACE_OPT."(are|r)".self::REGEX_SPACE_OPT.self::REGEX_YOU.")".self::REGEX_WORD_END."/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getResponse(): string
	{
		return self::translate("greeting");
	}
}
