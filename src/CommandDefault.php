<?php
namespace Clippy;
class CommandDefault extends Command
{
	static function instantiate_if_matches(string $in) : ?CommandDefault
	{
		return new CommandDefault();
	}

	function getDefaultResponse() : string
	{
		return "I'm sorry, I don't understand. :/";
	}
}
