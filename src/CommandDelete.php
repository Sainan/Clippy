<?php
namespace Clippy;
class CommandDelete extends CommandImplementable
{
	function __construct(
		public int $amount,
	) {}

	static function instantiate_if_matches(string $in) : ?CommandDelete
	{
		if(preg_match("/(delete|erase)( the)?( last)? ?(?'amount'\d+) ?me?s?sa?ge?s?/i", $in, $matches) === 1)
		{
			return new CommandDelete($matches["amount"]);
		}
		return null;
	}
}
