<?php
namespace Clippy;
use InvalidArgumentException;
abstract class Command
{
	private static array $registered_commands = [];

	static function registerCommand(string $command): void
	{
		if(!is_subclass_of($command, self::class))
		{
			throw new InvalidArgumentException("$command doesn't extend ".self::class);
		}
		array_push(self::$registered_commands, $command);
	}

	static function registerCommands(array $commands): void
	{
		foreach($commands as $command)
		{
			self::registerCommand($command);
		}
	}

	static function getRegisteredCommands() : array
	{
		return self::$registered_commands;
	}

	/** @deprecated */
	static function getAllCommands() : array
	{
		return self::getRegisteredCommands();
	}

	abstract static function instantiateIfMatches(string $in) : ?Command;

	static function match(string $in) : Command
	{
		foreach(Command::getRegisteredCommands() as $command)
		{
			$ret = call_user_func($command.'::instantiateIfMatches', $in);
			if($ret instanceof Command)
			{
				return $ret;
			}
		}
		return new CommandDefault();
	}

	abstract function getDefaultResponse() : string;
}

Command::registerCommands([
	CommandDelete::class,
	CommandJokeProgramming::class,
	CommandJokeKnockKnock::class,
	CommandJokeGeneral::class,
	CommandOpinion::class,
	CommandThanks::class,
	CommandGreeting::class,
]);
