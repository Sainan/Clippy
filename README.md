# Clippy [![Build Status](https://travis-ci.com/Sainan/Clippy.svg?branch=senpai)](https://travis-ci.com/Sainan/Clippy)

A framework for bots that take human commands.

## An Example

> "Delete the last 10 messages"

will generate the equivalent of

```PHP
new CommandDelete(/* amount = */ 10)
```

you can either implement a case for this, or just use `->getDefaultResponse()`, which in this case would be:

> "I'm sorry, I can't do that in this form."

## Getting Started

> `composer require sainan/clippy:dev-senpai`

Have a look at [example.php](https://github.com/Sainan/Clippy/blob/senpai/example.php) for an example on how to integrate it.

---

Stay tuned for more.
