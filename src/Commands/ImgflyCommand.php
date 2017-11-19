<?php

namespace ShawnSandy\ImgFly\Commands;

use Illuminate\Console\Command;

class ImgflyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'imgfly:info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows the imgfly package information';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('Package created using Bootpack.');
    }
}
