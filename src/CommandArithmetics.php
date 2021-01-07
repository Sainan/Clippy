<?php
namespace Clippy;
use Matex\Exception;
class CommandArithmetics extends Command
{
	function __construct(
		public string $in,
		public string $out,
	) {}

	static function mod_impl($left, $right)
	{
		return $left % $right;
	}

	static function instantiateIfMatches(string $in): ?self
	{
		if(preg_match("/\d+".self::REGEX_SPACE_OPT."[+\-*\/]".self::REGEX_SPACE_OPT."\d+/i", $in) === 1)
		{
			try
			{
				$evaluator = new \Matex\Evaluator();
				$evaluator->functions = [
					"mod" => [
						"ref" => self::class."::mod_impl",
						"arc" => 2,
					],
				];
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
