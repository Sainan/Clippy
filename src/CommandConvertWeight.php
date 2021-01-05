<?php
namespace Clippy;
class CommandConvertWeight extends CommandConvert
{
	const CONVERSION = [
		"g" => 0.001,
		"kg" => 1,
		"ounces" => 0.02835,
		"pounds" => 0.454,
		"stones" => 6.356,
		"hundredweights" => 50.8,
		"ustons" => 907.185,
		"metrictons" => 1000,
		"imperialtons" => 1016.05
	];

	const PRECISION = [
		"g" => 2,
		"kg" => 3,
		"ounces" => 2,
		"pounds" => 2,
		"stones" => 2,
		"hundredweights" => 3,
		"ustons" => 3,
		"metrictons" => 3,
		"imperialtons" => 3
	];

	const IN_NAME = [
		"g" => "g",
		"kg" => "kg",
		"ustons" => "ustons",
		"metrictons" => "metrictons",
		"imperialtons" => "imperialtons",
		"gram" => "g",
		"grams" => "g",
		"kilogram" => "kg",
		"kilograms" => "kg",
		"kilo" => "kg",
		"kilos" => "kg",
		"ounce" => "ounces",
		"ounces" => "ounces",
		"pound" => "pounds",
		"pounds" => "pounds",
		"stone" => "stones",
		"stones" => "stones",
		"hundredweight" => "hundredweights",
		"hundredweights" => "hundredweights",
		"us ton" => "ustons",
		"us tons" => "ustons",
		"metric ton" => "metrictons",
		"metric tons" => "metrictons",
		"imperial ton" => "imperialtons",
		"imperial tons" => "imperialtons",
	];
}
