<?php
namespace Clippy;
abstract class Command
{
	static function getAllCommands() : array
	{
		return [
			CommandDelete::class,
		];
	}

	abstract static function instantiateIfMatches(string $in) : ?Command;

	static function match(string $in) : Command
	{
		foreach(Command::getAllCommands() as $command)
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
