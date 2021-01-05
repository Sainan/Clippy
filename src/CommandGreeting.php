<?php
namespace Clippy;
class CommandGreeting extends Command
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/".self::REGEX_WORD_BEGIN."(hi|hello|greetings|how (are|r) ".self::REGEX_YOU.")".self::REGEX_WORD_END."/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getDefaultResponse(): string
	{
		return self::$out_lang["greeting"];
	}
}
