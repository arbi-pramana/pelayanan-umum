<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;

class ModelAddCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert new record for given model';

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
        $model = $this->argument('model');
        $model = str_replace("/", "\\", $model);

        if (!class_exists($model)) {
            $this->error('Model '.$model.' doesn\'t exists.');
            exit;
        }

        $instance = new $model;

        if ($instance instanceof Model === false) {
            $this->error('Model "'.$model.'" is not eloquent model.');
            exit;
        }

        $fillables = $instance->getFillable();
        $hiddens = $instance->getHidden();

        foreach ($fillables as $key) {
            if ($key === 'password') {
                $instance->{$key} = bcrypt($this->secret($key));
            } elseif (in_array($key, $hiddens)) {
                $instance->{$key} = $this->secret($key);
            } else {
                $instance->{$key} = $this->ask($key);
            }
        }

        $instance->save();

        dd($instance->toArray());
    }
}
