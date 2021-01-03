# Clippy

A framework for bots that take human commands.

- [Talk to Clippy](https://clippy.chat/)

## An Example

> "Delete the last 10 messages"

will generate the equivalent of

```PHP
new CommandDelete(/* amount = */ 10)
```

you can either implement a case for this, or just use `->getDefaultResponse()`, which in this case would be:

> "I'm sorry, I can't do that in this form."

You can find a list of all commands [here](https://sainan.github.io/Clippy/inherits.html).

## Getting Started

> `composer require sainan/clippy`

Have a look at [example.php](https://github.com/Sainan/Clippy/blob/senpai/example.php) for an example on how to integrate Clippy.
