<?php
namespace Clippy;
use InvalidArgumentException;
abstract class Command
{
	const DIR_LANG = __DIR__."/../lang/";

	const REGEX_WORD_BEGIN = "(^| )";
	const REGEX_WORD_END = "($| |\.|!|\?)";
	const REGEX_YOU = "(you|ya|u)";
	const REGEX_FLOAT = "(\d+(\.\d+)?)";

	private static array $registered_commands = [];

	static array $out_lang = [];

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

	static function getOutputLocales(): array
	{
		$locales = [];
		foreach(scandir(self::DIR_LANG) as $file)
		{
			if($file != "." && $file != ".." && $file != "README.md")
			{
				array_push($locales, $file);
			}
		}
		return $locales;
	}

	static function setOutputLocale(string $name) : void
	{
		self::$out_lang = require __DIR__."/../lang/{$name}/output.php";
	}

	abstract static function instantiateIfMatches(string $in) : ?self;

	static function match(string $in) : Command
	{
		if(empty(self::$out_lang))
		{
			self::setOutputLocale("en-GB");
		}
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
	CommandFarewell::class,
	CommandConvertDistance::class,
	CommandConvertWeight::class,
]);
