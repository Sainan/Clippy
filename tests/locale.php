<?php
namespace Clippy;
use Nose;
require "vendor/autoload.php";

function testGetOutputLocales()
{
	Nose::assertTrue(in_array("en-GB", Command::getOutputLocales()));
}

function initCommandConvertDistance(): CommandConvertDistance
{
	$inst = Command::match("What's 1 metre in meters?");
	Nose::assert($inst instanceof CommandConvertDistance);
	Nose::assertEquals($inst->out_amount, 1.0);
	return $inst;
}

function testDefaultENGB()
{
	Nose::assertEquals(initCommandConvertDistance()->getDefaultResponse(), "1 metre is about equal to 1 metre. :)");
}

function testENGB()
{
	Command::setOutputLocale("en-GB");
	testDefaultENGB();
}

function testENUS()
{
	Command::setOutputLocale("en-US");
	Nose::assertEquals(initCommandConvertDistance()->getDefaultResponse(), "1 meter is about equal to 1 meter. :)");
}

function testENAU()
{
	Command::setOutputLocale("en-AU");
	$inst = Command::match("Hi");
	Nose::assert($inst instanceof CommandGreeting);
	Nose::assertEquals($inst->getDefaultResponse(), "G'day!");
}
