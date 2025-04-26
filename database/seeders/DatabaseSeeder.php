<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            ['id' => 1, 'name' => 'Super Admin'],
            ['id' => 2,'name' => 'Admin'],
            ['id' => 3,'name' => 'Member']
        ]);
    }
}
