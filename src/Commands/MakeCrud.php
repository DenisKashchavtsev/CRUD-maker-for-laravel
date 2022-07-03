<?php

namespace DKart\CrudMaker\Commands;

use DKart\CrudMaker\Maker\Maker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new CRUD';

    /**
     * @var array
     */
    private array $data;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->data['entity'] = $this->ask('Entity:', 'Product');
        $this->data['entityPlural'] = $this->ask('Entity plural:', 'Products');
        $this->data['generateTests'] = $this->ask('Do you want to generate tests for the controller?. [Experimental] (yes/no) [no]:', 'no');
        $this->data['templateName'] = $this->ask('[Default] (yes/no) [no]:', 'Default');

        App::make(Maker::class)->make($this->data);
    }
}

