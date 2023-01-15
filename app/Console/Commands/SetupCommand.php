<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;

class SetupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup application env and create database if not exists.';

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
        $data['DB_DATABASE'] = $this->ask('Database name', env('DB_DATABASE'));
        $data['DB_USERNAME'] = $this->ask('Database username', env('DB_USERNAME') ?: 'root');
        $data['DB_PASSWORD'] = $this->ask('Database password', env('DB_PASSWORD') ?: '');
        $data['APP_URL'] = $this->ask('APP URL', env('APP_URL') ?: 'http://localhost');

        $this->createDatabaseIfNotExists($data);
        $this->writeEnv($data);

        $this->call('key:generate');
    }

    protected function createDatabaseIfNotExists(array $data)
    {
        $pdo = new PDO("mysql:host=localhost", $data['DB_USERNAME'], $data['DB_PASSWORD']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // phpcs:ignore
        $stmt = $pdo->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '{$data['DB_DATABASE']}'");
        $result = $stmt->fetchColumn();

        if ($result == "0") {
            $pdo->query("create database if not exists ".$data['DB_DATABASE']);
            $this->info('Database "'.$data['DB_DATABASE'].'" created.');
        }
    }

    protected function writeEnv(array $data)
    {
        $newEnv = false;
        $envFile = base_path('.env');
        $envExampleFile = base_path('.env.example');
        if (!file_exists($envFile)) {
            copy($envExampleFile, $envFile);
            $newEnv = true;
        }
        $env = file_get_contents($envFile);
        foreach ($data as $key => $value) {
            $env = preg_replace("/{$key}=[^\n]+/", "{$key}={$value}", $env);
        }

        $saved = file_put_contents($envFile, $env);
        $this->info($newEnv ? "Environment file created" : "Environment file updated");
    }
}
