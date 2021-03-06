<?php
namespace Clippy;
class CommandFarewell extends Command
{
	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/".self::REGEX_WORD_BEGIN."((good)?bye|see".self::REGEX_SPACE_OPT.self::REGEX_YOU."|farewell)".self::REGEX_WORD_END."/i", $in) === 1)
		{
			return new self;
		}
		return null;
	}

	function getResponse(): string
	{
		return self::translate("farewell");
	}
}
