<?php

declare(strict_types=1);

namespace BombenProdukt\Passage\Commands;

use Illuminate\Console\Command;

final class PassageCommand extends Command
{
    public $signature = 'laravel-passage';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
