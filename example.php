<?php
namespace Clippy;
require "vendor/autoload.php";

if(empty($argv[1]))
{
	die("Syntax: php {$argv[0]} <message>\n");
}

$command = Command::match($argv[1]);

switch($command::class)
{
	case CommandDelete::class:
	echo "Delete!";
	break;

	default:
	echo $command->getDefaultResponse();
}
echo "\n";
