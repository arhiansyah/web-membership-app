<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard-g']);
        Permission::create(['name' => 'dashboard-m']);

        //create roles and assign existing permissions
        $guestRole = Role::create(['name' => 'guest']);
        $guestRole->givePermissionTo('dashboard-g');

        $memberRole = Role::create(['name' => 'member']);

        // create demo users
        $user = User::factory()->create([
            'name' => 'Guest',
            'email' => 'guest@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($guestRole);

        $user2 = User::factory()->create([
            'name' => 'Member',
            'email' => 'member@mail.com',
            'password' => bcrypt('12345678')
        ]);
        $user2->assignRole($memberRole);
        $day = 31;
        $customer = Customer::create([
            'name' => 'Rivan',
            'email' => $user2->email,
            'mobile_number' => '09131414121',
            'address' => 'Jl Ahmad yani',
            'register_duration' => Carbon::now(),
            'end_duration' => Carbon::now()->addMonths(),
            'user_id' => 2,
            'product_id' => 1
        ]);
    }
}
