<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ClearUsersCache extends Command
{
    protected $signature = 'cache:users-clear';
    protected $description = 'Limpa o cache da lista de usuários';

    public function handle()
    {
        Cache::store('redis')->forget('users:list');

        $this->info('Cache de usuários limpo com sucesso');

        Log::channel('cache_users')->info('Cache de usuários limpo com sucesso');

        return Command::SUCCESS;
    }
}