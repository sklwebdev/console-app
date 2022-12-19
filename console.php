<?php

declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use App\Registry;
use sklwebdev\Console\Application;
use sklwebdev\Console\Input;
use sklwebdev\Console\Output;

$input = new Input\ArgvInput($argv);
$output = new Output\ConsoleOutput();

$loader = new Registry\ManualLoader();

$app = new Application($loader);
$app->run($input, $output);
