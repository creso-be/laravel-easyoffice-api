<?php

namespace Creso\LaravelEasyofficeApi\Commands;

use Illuminate\Console\Command;

class LaravelEasyofficeApiCommand extends Command
{
    public $signature = 'laravel-easyoffice-api';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
