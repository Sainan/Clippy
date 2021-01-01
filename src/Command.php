<?php
namespace Clippy;
abstract class Command
{
	static function get_all_commands() : array
	{
		return [
			CommandDelete::class,
		];
	}

	abstract static function instantiate_if_matches(string $in) : ?Command;

	static function match(string $in) : Command
	{
		foreach(Command::get_all_commands() as $command)
		{
			$ret = call_user_func($command.'::instantiate_if_matches', $in);
			if($ret instanceof Command)
			{
				return $ret;
			}
		}
		return new CommandDefault();
	}

	abstract function getDefaultResponse() : string;
}
