<?php
namespace Clippy;
class CommandDelete extends CommandImplementable
{
	function __construct(
		public int $amount,
	) {}

	static function instantiateIfMatches(string $in) : ?self
	{
		if(preg_match("/(delete|erase)(".self::REGEX_SPACE_OPT."the)?(".self::REGEX_SPACE_OPT."last)?".self::REGEX_SPACE_OPT."(?'amount'\d+)".self::REGEX_SPACE_OPT."me?s?sa?ge?s?/i", $in, $matches) === 1)
		{
			return new self($matches["amount"]);
		}
		return null;
	}
}
