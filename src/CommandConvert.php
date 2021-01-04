<?php
namespace Clippy;
abstract class CommandConvert extends Command
{
	function __construct(
		public float $in_amount,
		public string $in_unit,
		public float $out_amount,
		public string $out_unit,
	) {}

	static function instantiateIfMatches(string $in): ?static
	{
		$units_regex = join("|", array_keys(static::IN_NAME));
		if(preg_match("/".self::REGEX_WORD_BEGIN."(?'in_amount'".self::REGEX_FLOAT.") ?(?'in_unit'$units_regex) (in|to) ?(?'out_unit'$units_regex)".self::REGEX_WORD_END."/i", $in, $matches) === 1)
		{
			$in_amount = floatval($matches["in_amount"]);
			$in_unit = static::IN_NAME[strtolower($matches["in_unit"])];
			$out_unit = static::IN_NAME[strtolower($matches["out_unit"])];
			return new static(
				$in_amount,
				$in_unit,
				$in_amount * static::CONVERSION[$in_unit] / static::CONVERSION[$out_unit],
				$out_unit
			);
		}
		return null;
	}

	static function format(float $value, ?string $unit = null): string
	{
		if($unit !== null)
		{
			return self::format($value)." ".($value == 1 ? static::OUT_NAME[$unit."_singular"] : static::OUT_NAME[$unit."_plural"]);
		}
		if(!is_float($value))
		{
			return $value;
		}
		for($i = 6; $i > 1; $i--)
		{
			$str = number_format($value, 6);
			if(substr($str, -1) != "0")
			{
				return $str;
			}
		}
		return $value;
	}

	function getDefaultResponse(): string
	{
		return self::format($this->in_amount, $this->in_unit)." ".($this->in_amount == 1 ? "is" : "are")." about equal to ".self::format($this->out_amount, $this->out_unit).". :)";
	}
}
