<?php

declare(strict_types=1);

namespace App\Registry;

use App\Command\CustomCommand;
use sklwebdev\Console\Registry;

class ManualLoader implements Registry\LoaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(): Registry\Registry
    {
        $registry = new Registry\Registry();
        $registry
            ->add(new CustomCommand());

        return $registry;
    }
}
