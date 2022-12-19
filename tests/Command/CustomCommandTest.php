<?php

declare(strict_types=1);

namespace App\Tests\Command;

use App\Command;
use App\Registry;
use PHPUnit\Framework\TestCase;
use sklwebdev\Console\Application;
use sklwebdev\Console\Input;
use sklwebdev\Console\Output;

class CustomCommandTest extends TestCase
{
    public function test()
    {
        $command = new Command\CustomCommand();

        $input = new Input\ArgvInput([
            'file.php',
            $command->getName(),
            '{verbose,overwrite}',
            '[log_file=app.log]',
            '{unlimited}',
            '[methods={create,update,delete}]',
            '[paginate=50]',
            '{log}'
        ]);
        $output = new Output\ConsoleOutput();

        $loader = new Registry\ManualLoader();

        $str = "\n\rCommand name: %s\n\r\n\r";
        $str .= "Arguments:\n\r\t- verbose\n\r\t- overwrite\n\r\t- unlimited\n\r\t- log\n\r\n\r";
        $str .= "Options:\n\r\t- log_file\n\r\t\t- app.log\n\r\t- methods\n\r\t\t- create\n\r\t\t- update\n\r\t\t- delete\n\r\t- paginate\n\r\t\t- 50\n\r\n\r";

        $this->expectOutputString(sprintf($str, $command->getName()));
        $app = new Application($loader);
        $app->run($input, $output);
    }

    public function testHelp()
    {
        $command = new Command\CustomCommand();

        $input = new Input\ArgvInput(['file.php', $command->getName(), '{help}']);
        $output = new Output\ConsoleOutput();

        $loader = new Registry\ManualLoader();

        $this->expectOutputString(sprintf("\n\r%s\n\r\n\r", $command->getDescription()));
        $app = new Application($loader);
        $app->run($input, $output);
    }
}
