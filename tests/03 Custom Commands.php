<?php
namespace Clippy;
use Nose;
require "vendor/autoload.php";

function testCustomCommand()
{
	class CommandCustomTest extends Command
	{
		static function instantiateIfMatches(string $in): ?Command
		{
			return str_contains($in, "test") ? new self : null;
		}

		function getResponse(): string
		{
			return "";
		}
	}

	Nose::assert(Command::match("test") instanceof CommandDefault);

	Command::registerCommand(CommandCustomTest::class);

	Nose::assert(Command::match("test") instanceof CommandCustomTest);
}
