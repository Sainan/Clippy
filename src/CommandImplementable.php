<?php
namespace Clippy;
class CommandImplementable extends Command
{
	static function instantiate_if_matches(string $in) : ?CommandImplementable
	{
		return new CommandImplementable();
	}

	function getDefaultResponse() : string
	{
		return "I'm sorry, I can't do that in this form.";
	}
}
