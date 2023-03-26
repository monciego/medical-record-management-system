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
            'name' => 'Nurse 2',
            'email' => 'snurse2@psu.edu.ph',
            'password' => Hash::make('snurse2@psu.edu.ph'),
        ]);

        $adminUser->attachRole('administrator');

        $adminUserTwo = \App\Models\User::factory()->create([
            'name' => 'Nurse 1',
            'email' => 'snurse1@psu.edu.ph',
            'password' => Hash::make('snurse1@psu.edu.ph'),
        ]);

         $adminUserTwo->attachRole('administrator');

        $adminUserThree = \App\Models\User::factory()->create([
            'name' => 'Dental',
            'email' => 'sdentist@psu.edu.ph',
            'password' => Hash::make('sdentist@psu.edu.ph'),
        ]);

         $adminUserThree->attachRole('nurse');

        $superadminUser = \App\Models\User::factory()->create([
            'name' => 'Doctor',
            'email' => 'sdoctor@psu.edu.ph',
            'password' => Hash::make('sdoctor@psu.edu.ph'),
        ]);

         $superadminUser->attachRole('superadministrator');
    }
}
