<?php
namespace Clippy;
use Matex\Exception;
class CommandArithmetics extends Command
{
	function __construct(
		public string $in,
		public string $out,
	) {}

	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/\d+ ?[+\-*\/] ?\d+/i", $in) === 1)
		{
			try
			{
				$evaluator = new \Matex\Evaluator();
				return new self(
					$in,
					self::stringify($evaluator->execute($in)),
				);
			}
			catch(Exception $e)
			{
			}

		}
		return null;
	}

	function getResponse(): string
	{
		return sprintf(self::translate("arithmetics"), $this->out);
	}
}
