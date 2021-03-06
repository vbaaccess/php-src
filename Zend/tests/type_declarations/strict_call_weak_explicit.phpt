--TEST--
strict_types=1 code calling explicitly strict_types=0 code
--FILE--
<?php

declare(strict_types=1);

// file that's explicitly weak
require 'strict_call_weak_explicit_2.inc';

// Will succeed: Function was declared in weak mode, but that does not matter
// This file uses strict mode, so the call is strict, and float denied for int
function_declared_in_weak_mode(1.0);
?>
--EXPECTF--
Fatal error: Uncaught TypeError: Argument 1 passed to function_declared_in_weak_mode() must be of the type int, float given, called in %sstrict_call_weak_explicit.php on line 10 and defined in %sstrict_call_weak_explicit_2.inc:5
Stack trace:
#0 %s(%d): function_declared_in_weak_mode(1)
#1 {main}
  thrown in %sstrict_call_weak_explicit_2.inc on line 5
