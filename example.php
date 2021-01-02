<?php
namespace Clippy;
require "vendor/autoload.php";

if(empty($argv[1]))
{
	die("Syntax: php {$argv[0]} <message>\n");
}

class CommandCustomExample extends Command
{
	static function instantiateIfMatches(string $in): ?Command
	{
		return str_contains($in, "example") ? new self : null;
	}

	function getDefaultResponse(): string
	{
		return "This is indeed an example!";
	}
}

Command::registerCommand(CommandCustomExample::class);

$command = Command::match($argv[1]);

switch($command::class)
{
	case CommandDelete::class:
	echo "What's wrong with the last {$command->amount} messages?";
	break;

	default:
	echo $command->getDefaultResponse();
}
echo "\n";
