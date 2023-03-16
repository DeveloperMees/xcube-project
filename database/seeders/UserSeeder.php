<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        // User::factory()->count(1)->create([
        //     'name' => 'Customer',
        //     'email' => 'customer@test.com',
        //     'password' => bcrypt('1234')
        // ])
		// ->each(function (User $user) {
		// 	$user->assignRole('customer');
		// });
        // User::factory()->count(1)->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@test.com',
        //     'password' => bcrypt('1234')
        // ])
		// ->each(function (User $user) {
		// 	$user->assignRole('admin');
		// });
		User::factory()->count(50)->create()->each(function (User $user) {$user->assignRole('customer');});
    }
}
