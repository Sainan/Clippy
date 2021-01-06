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

	/** @since 0.1.8 */
	static array $config = [
		"out_lang" => "en-GB",
	];

	static array $out_langs = [];

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
			if($file != "." && $file != ".." && is_dir(self::DIR_LANG.$file))
			{
				array_push($locales, $file);
			}
		}
		return $locales;
	}

	static function setOutputLocale(string $name) : void
	{
		self::$config["out_lang"] = $name;
	}

	abstract static function instantiateIfMatches(string $in) : ?self;

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

	/** @since 0.1.8 */
	abstract function getResponse() : string;

	/** @deprecated */
	function getDefaultResponse(): string
	{
		return $this->getResponse();
	}

	static function translate(string $key): string
	{
		if(!array_key_exists(self::$config["out_lang"], self::$out_langs))
		{
			self::$out_langs[self::$config["out_lang"]] = require __DIR__."/../lang/".self::$config["out_lang"]."/output.php";
		}
		return self::$out_langs[self::$config["out_lang"]][$key] ?? $key;
	}

	static function stringify($value): string
	{
		if(is_float($value))
		{
			for($i = 6; $i > 1; $i--)
			{
				$str = number_format($value, 6);
				if(substr($str, -1) != "0")
				{
					return $str;
				}
			}
		}
		if(is_bool($value))
		{
			return $value ? "true" : "false";
		}
		return (string)$value;
	}
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
	CommandArithmetics::class,
]);
