<?php

declare(strict_types=1);

namespace App\Command;

use sklwebdev\Console\Command\Command as BaseCommand;
use sklwebdev\Console\Input;
use sklwebdev\Console\Output;

class CustomCommand extends BaseCommand
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'custom';
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(): string
    {
        return 'Custom command to show passed arguments and options';
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(Input\InputInterface $input, Output\OutputInterface $output)
    {
        $output->writeln();
        $output->writeln(sprintf('Command name: %s', $this->getName()));
        $output->writeln();

        if ($input->countArguments()) {
            $output->writeln('Arguments:');
            foreach ($input->getArguments() as $value) {
                $output->writeln(sprintf("\t- %s", $value));
            }
            $output->writeln();
        }

        if ($input->countOptions()) {
            $output->writeln('Options:');
            foreach ($input->getOptions() as $name => $value) {
                $output->writeln(sprintf("\t- %s", $name));

                if (is_array($value)) {
                    foreach ($value as $item) {
                        $output->writeln(sprintf("\t\t- %s", $item));
                    }

                    continue;
                }

                $output->writeln(sprintf("\t\t- %s", $value));
            }
            $output->writeln();
        }
    }
}
