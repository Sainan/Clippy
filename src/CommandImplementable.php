<?php
namespace Clippy;
abstract class CommandImplementable extends Command
{
	function getDefaultResponse() : string
	{
		return "I'm sorry, I can't do that in this form.";
	}
}
