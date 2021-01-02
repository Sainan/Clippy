<?php
namespace Clippy;
use Nose;
require "vendor/autoload.php";

function testCommandDelete()
{
	$inst = Command::match("Delete the last 10 messages");
	Nose::assert($inst instanceof CommandDelete);
	Nose::assertEquals($inst->amount, 10);
}

function testCommandJokeGeneral()
{
	$inst = Command::match("tell me a joke");
	Nose::assert($inst instanceof CommandJokeGeneral);
}

function testCommandJokeProgramming()
{
	$inst = Command::match("I wanna hear a programming joke!");
	Nose::assert($inst instanceof CommandJokeProgramming);
	$inst = Command::match("Give me a programmer joke!");
	Nose::assert($inst instanceof CommandJokeProgramming);
}

function testCommandJokeKnockKnock()
{
	$inst = Command::match("Can you tell me a knock-knock joke?");
	Nose::assert($inst instanceof CommandJokeKnockKnock);
}

function testCommandOpinion()
{
	$inst = Command::match("What do you think about PHP?");
	Nose::assert($inst instanceof CommandOpinion);
}

function testCustomCommand()
{
	class CommandCustomTest extends Command
	{
		static function instantiateIfMatches(string $in): ?Command
		{
			return str_contains($in, "test") ? new self : null;
		}

		function getDefaultResponse(): string
		{
			return "";
		}
	}

	Nose::assert(Command::match("test") instanceof CommandDefault);

	Command::registerCommand(CommandCustomTest::class);

	Nose::assert(Command::match("test") instanceof CommandCustomTest);
}
