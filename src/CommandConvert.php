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
		$units = [];
		foreach(array_keys(static::CONVERSION) as $unit)
		{
			$units[$unit] = $unit;
		}
		foreach(static::NAME as $string_name => $english_name)
		{
			$units[strtolower($english_name)] = explode("_", $string_name)[0];
		}
		$units_regex = join("|", array_keys($units));
		if(preg_match("/".self::REGEX_WORD_BEGIN."(?'in_amount'".self::REGEX_FLOAT.") ?(?'in_unit'$units_regex) (in|to) ?(?'out_unit'$units_regex)".self::REGEX_WORD_END."/i", $in, $matches) === 1)
		{
			$in_amount = floatval($matches["in_amount"]);
			$in_unit = $units[strtolower($matches["in_unit"])];
			$out_unit = $units[strtolower($matches["out_unit"])];
			return new static(
				$in_amount,
				$in_unit,
				$in_amount * static::CONVERSION[$in_unit] / static::CONVERSION[$out_unit],
				$out_unit
			);
		}
		return null;
	}

	static function format(float $value, string $unit): string
	{
		return (is_float($value) ? number_format($value, static::PRECISION[$unit]) : $value)." ".($value == 1 ? static::NAME[$unit."_singular"] : static::NAME[$unit."_plural"]);
	}

	function getDefaultResponse(): string
	{
		return static::format($this->in_amount, $this->in_unit)." ".($this->in_amount == 1 ? "is" : "are")." about equal to ".static::format($this->out_amount, $this->out_unit).". :)";
	}
}
