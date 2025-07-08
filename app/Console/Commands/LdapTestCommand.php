<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Adldap\Laravel\Facades\Adldap;

class LdapTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ldap:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testing LDAP connection';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            $ldap = Adldap::getProvider('default');
            $ldap->connect();

            $this->info('Successfully connected to the LDAP server.');
        } catch (\Exception $e) {
            Log::error('LDAP Test Error: ' . $e->getMessage());
            $this->error('Failed to connect to the LDAP server. Check the logs for more details.');
        }
    }
}
