<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Administration\Models\User;

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Admin User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->ask('Correo del admin');
        $password = $this->secret('Contraseña del admin');

        $user = User::firstOrCreate(['email' => $email], [
            'name' => 'Administrador',
            'password' => bcrypt($password),
        ]);

        $user->assignRole('Administrator');
        $this->info("Usuario administrador creado/actualizado.");
    }
}
