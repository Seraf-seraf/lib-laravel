<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Output\ConsoleOutput;

class ShowWarning extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'show:warning';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Все персонажи вымышлены, все совпадения случайны';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->outputFramedMessage($this->description);
    }

    private function outputFramedMessage($message): void
    {
        $length = mb_strlen($message) + 4;
        $border = str_repeat('-', $length);

        $output = new ConsoleOutput();

        $output->writeln("<fg=red;bg=yellow>$border</>");
        $output->writeln("<fg=red>- $message -</>");
        $output->writeln("<fg=red;bg=yellow>$border</>");
    }
}
