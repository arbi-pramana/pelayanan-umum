<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('spell:reset', function() {
    $deletes = [
        'app',
        'database',
        'public',
        'resources',
        'routes'
    ];

    $dbConfig = DB::connection()->getConfig();
    print('> Re-create database '.$dbConfig['database'].' ... ');
    $pdo = DB::connection()->getPdo();
    $pdo->query('drop database '.$dbConfig['database']);
    $pdo->query('create database '.$dbConfig['database']);
    print('OK'.PHP_EOL);

    foreach ($deletes as $dir) {
        print('> Delete directory \''.$dir.'\' ... ');
        shell_exec("rm -rf ".base_path($dir));
        print('OK'.PHP_EOL);
    }

    $backupDir = base_path('.dev/reset');

    // restore backups
    foreach (glob($backupDir.'/*') as $dir) {
        print('> Restore directory \''.str_replace($backupDir.'/', '', $dir).'\' ... ');
        shell_exec("cp -R ".$dir." ".base_path());
        print('OK'.PHP_EOL);
    }

    echo shell_exec("composer du");
});
