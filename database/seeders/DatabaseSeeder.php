<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(LaratrustSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(UserPatientSeeder::class);

        $adminUser = \App\Models\User::factory()->create([
            'name' => 'Nurse',
            'email' => 'admin.clinic@psu.edu',
            'password' => Hash::make('admin.clinic@psu.edu'),
        ]);

        $adminUser->attachRole('administrator');

        $adminUserTwo = \App\Models\User::factory()->create([
            'name' => 'Nurse',
            'email' => 'bartolomejrm@gmail.com',
            'password' => Hash::make('bartolomejrm@gmail.com'),
        ]);

         $adminUserTwo->attachRole('administrator');

        $adminUserThree = \App\Models\User::factory()->create([
            'name' => 'Nurse',
            'email' => 'jerichobantiquete@gmail.com',
            'password' => Hash::make('jerichobantiquete@gmail.com'),
        ]);

         $adminUserThree->attachRole('nurse');

        $superadminUser = \App\Models\User::factory()->create([
            'name' => 'Doctor',
            'email' => 'superadmin.clinic@psu.edu',
            'password' => Hash::make('superadmin.clinic@psu.edu'),
        ]);

         $superadminUser->attachRole('superadministrator');
    }
}
