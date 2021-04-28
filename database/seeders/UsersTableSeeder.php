<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $authorRole = Role::where('name','author')->first();
        $userRole = Role::where('name','user')->first();

        $admin = User::create([
            'name'=> 'admin',
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'provinces' => 'Albay',
            'password' => Hash::make('qwerqwer'),
            'date_of_birth' => Carbon::create('2000', '01', '01'),
        ]);

        
        $author = User::create([
            'name'=> 'author',
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'author@author.com',
            'provinces' => 'Albay',
            'password' => Hash::make('qwerqwer'),
            'date_of_birth' => Carbon::create('2000', '01', '01'),
        ]);

        
        $user = User::create([
            'name'=> 'user',
            'first_name' => 'Admin',
            'middle_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'user@user.com',
            'provinces' => 'Albay',
            'password' => Hash::make('qwerqwer'),
            'date_of_birth' => Carbon::create('2000', '01', '01'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);

    }
}
