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

	const NAME = [
		"g_singular" => "gram",
		"g_plural" => "grams",
		"kg_singular" => "kilogram",
		"kg_plural" => "kilograms",
		"ounces_singular" => "ounce",
		"ounces_plural" => "ounces",
		"pounds_singular" => "pound",
		"pounds_plural" => "pounds",
		"stones_singular" => "stone",
		"stones_plural" => "stones",
		"hundredweights_singular" => "hundredweight",
		"hundredweights_plural" => "hundredweights",
		"ustons_singular" => "US ton",
		"ustons_plural" => "US tons",
		"metrictons_singular" => "metric ton",
		"metrictons_plural" => "metric tons",
		"imperialtons_singular" => "imperial ton",
		"imperialtons_plural" => "imperial tons",
	];
}
