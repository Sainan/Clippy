<?php
namespace Clippy;
class CommandDefault extends Command
{
	static function instantiateIfMatches(string $in) : ?self
	{
		return null;
	}

	function getDefaultResponse() : string
	{
		return "I'm sorry, I don't understand. :/";
	}
}
