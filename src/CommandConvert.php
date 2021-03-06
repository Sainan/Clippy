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
		if(preg_match("/".self::REGEX_WORD_BEGIN."(?'in_amount'".self::REGEX_FLOAT.")".self::REGEX_SPACE_OPT."(?'in_unit'$units_regex)".self::REGEX_SPACE_OPT."(in|to)".self::REGEX_SPACE_OPT."(?'out_unit'$units_regex)".self::REGEX_WORD_END."/i", $in, $matches) === 1)
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

	static function format(float $value, string $unit): string
	{
		return self::stringify($value)." ".self::translate($value == 1 ? $unit."_singular" : $unit."_plural");
	}

	function getResponse(): string
	{
		return sprintf(
			self::translate($this->in_amount == 1 ? "convert_singular" : "convert_plural"),
			self::format($this->in_amount, $this->in_unit),
			self::format($this->out_amount, $this->out_unit)
		);
	}
}
