<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            Role::create(['name' => 'Customer']);
        } catch (Exception $e) {
            echo "Customer role already present.";
        }
        $user1 = User::create([
            'name' => 'Benjamin Spencer',
            'email' => 'demouser1@demo.com',
            'password' => Hash::make('password'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user2 = User::create([
            'name' => 'Matthew Carter',
            'email' => 'demouser2@demo.com',
            'password' => Hash::make('demouser2'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user3 = User::create([
            'name' => 'Beverly Garcia',
            'email' => 'demouser3@demo.com',
            'password' => Hash::make('demouser3'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);
        $user4 = User::create([
            'name' => 'Betty Porter',
            'email' => 'demouser4@demo.com',
            'password' => Hash::make('demouser4'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user5 = User::create([
            'name' => 'Michael Carr',
            'email' => 'demouser5@demo.com',
            'password' => Hash::make('demouser5'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user6 = User::create([
            'name' => 'Crystal Thomas',
            'email' => 'demouser6@demo.com',
            'password' => Hash::make('demouser6'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user7 = User::create([
            'name' => 'Rebecca Daniels',
            'email' => 'demouser7@demo.com',
            'password' => Hash::make('demouser7'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user8 = User::create([
            'name' => 'Gerald Lane',
            'email' => 'demouser8@demo.com',
            'password' => Hash::make('demouser8'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user9 = User::create([
            'name' => 'Matthew Murphy',
            'email' => 'demouser9@demo.com',
            'password' => Hash::make('demouser9'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user10 = User::create([
            'name' => 'Donald Nguyen',
            'email' => 'demouser10@demo.com',
            'password' => Hash::make('demouser10'),
            'remember_token' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'phone' => '0123456789',
            'default_address_id' => '0',
            'delivery_pin' => strtoupper(str_random(5)),
        ]);

        $user1->assignRole("Customer");
        $user2->assignRole("Customer");
        $user3->assignRole("Customer");
        $user4->assignRole("Customer");
        $user5->assignRole("Customer");
        $user6->assignRole("Customer");
        $user7->assignRole("Customer");
        $user8->assignRole("Customer");
        $user9->assignRole("Customer");
        $user10->assignRole("Customer");
    }
}
