<?php

namespace Titonova\ShockComponents\Commands;

use Illuminate\Console\Command;

class ShockComponentsCommand extends Command
{
    public $signature = 'shock-components';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
