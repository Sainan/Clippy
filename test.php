<?php
namespace Clippy;
require "vendor/autoload.php";

function testCommandDelete()
{
	$inst = Command::match("Delete the last 10 messages");
	\Nose::assert($inst instanceof CommandDelete);
	\Nose::assertEquals($inst->amount, 10);
}
