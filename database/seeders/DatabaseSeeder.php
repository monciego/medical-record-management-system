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
            'name' => 'Dental',
            'email' => 'bartolomemb.570.stud@cdd.edu.ph',
            'password' => Hash::make('bartolomemb.570.stud@cdd.edu.ph'),
        ]);

         $adminUserThree->attachRole('nurse');

        $superadminUser = \App\Models\User::factory()->create([
            'name' => 'Doctor',
            'email' => 'mbartolome.lingayen@psu.edu.ph',
            'password' => Hash::make('mbartolome.lingayen@psu.edu.ph'),
        ]);

         $superadminUser->attachRole('superadministrator');
    }
}
