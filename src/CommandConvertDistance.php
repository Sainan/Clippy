<?php
namespace Clippy;
class CommandConvertDistance extends CommandConvert
{
	const CONVERSION = [
		"cm" => 0.01,
		"m" => 1,
		"km" => 1000,
		"in" => 0.0254,
		"ft" => 0.3048,
		"yards" => 0.9144,
		"rods" => 5.029,
		"chains" => 20.117,
		"furlongs" => 201.17,
		"mi" => 1609.344
	];

	const PRECISION = [
		"cm" => 2,
		"m" => 2,
		"km" => 3,
		"in" => 2,
		"ft" => 2,
		"yards" => 3,
		"rods" => 2,
		"chains" => 2,
		"furlongs" => 2,
		"mi" => 3,
	];

	const IN_NAME = [
		"cm" => "cm",
		"m" => "m",
		"km" => "km",
		"in" => "in",
		"ft" => "ft",
		"mi" => "mi",
		"centimetre" => "cm",
		"centimetres" => "cm",
		"metre" => "m",
		"metres" => "m",
		"kilometre" => "km",
		"kilometres" => "km",
		"centimeter" => "cm",
		"centimeters" => "cm",
		"meter" => "m",
		"meters" => "m",
		"kilometer" => "km",
		"kilometers" => "km",
		"inch" => "in",
		"inches" => "in",
		"foot" => "ft",
		"feet" => "ft",
		"yard" => "yards",
		"yards" => "yards",
		"rod" => "rods",
		"rods" => "rods",
		"chain" => "chains",
		"chains" => "chains",
		"furlong" => "furlongs",
		"furlongs" => "furlongs",
		"mile" => "mi",
		"miles" => "mi",
	];

	const OUT_NAME = [
		"cm_singular" => "centimetre",
		"cm_plural" => "centimetres",
		"m_singular" => "metre",
		"m_plural" => "metres",
		"km_singular" => "kilometre",
		"km_plural" => "kilometres",
		"in_singular" => "inch",
		"in_plural" => "inches",
		"ft_singular" => "foot",
		"ft_plural" => "feet",
		"yards_singular" => "yard",
		"yards_plural" => "yards",
		"rods_singular" => "rod",
		"rods_plural" => "rods",
		"chains_singular" => "chain",
		"chains_plural" => "chains",
		"furlongs_singular" => "furlong",
		"furlongs_plural" => "furlongs",
		"mi_singular" => "mile",
		"mi_plural" => "miles",
	];
}
