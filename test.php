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

function testCommandThanks()
{
	$inst = Command::match("Thank you");
	Nose::assert($inst instanceof CommandThanks);
}

function testCommandGreeting()
{
	$inst = Command::match("Hello");
	Nose::assert($inst instanceof CommandGreeting);
}

function testCommandFarewell()
{
	$inst = Command::match("Goodbye");
	Nose::assert($inst instanceof CommandFarewell);
}

function testCommandConvertDistance()
{
	$inst = Command::match("What's 100 yards in metres?");
	Nose::assert($inst instanceof CommandConvertDistance);
	Nose::assertEquals($inst->out_amount, 91.44);

	$inst = Command::match("What's 1 metre in meters?");
	Nose::assert($inst instanceof CommandConvertDistance);
	Nose::assertEquals($inst->out_amount, 1.0);
}

function testCommandConvertWeight()
{
	$inst = Command::match("What's 1 metric ton in US tons?");
	Nose::assert($inst instanceof CommandConvertWeight);
	Nose::assert($inst->out_amount >= 1.102 && $inst->out_amount < 1.103);

	$inst = Command::match("1.5 kilos in grams");
	Nose::assert($inst instanceof CommandConvertWeight);
	Nose::assertEquals($inst->out_amount, 1500.0);
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
