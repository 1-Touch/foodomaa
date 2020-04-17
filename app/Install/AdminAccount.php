<?php

namespace App\Install;

use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Collection;

class AdminAccount
{
    public function setup($data)
    {
        //creating roles
        $roleAdmin = Role::create(['name' => 'Admin']);

        $roleDeliveryGuy = Role::create(['name' => 'Delivery Guy']);

        $roleRestaurantOwner = Role::create(['name' => 'Restaurant Owner']);

        $customer = Role::create(['name' => 'Customer']);

        //create admin account
        $admin = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $admin->assignRole("Admin");
    }
}
