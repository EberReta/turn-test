<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name'=>"Juan Manuel",
            'lastName' => "",
            'company'=>"Company",
            'email'=>"admin@mail.com",
            'password'=>bcrypt("123123123"),
            'phone'=>"123123123",
            'discount'=>"0",
            'businessName'=>"BusinessName",
            'cfdi'=>"Uso general",
            'rfc'=>"JMSD961025HZ4",
            'type'=>"Fisico",
            'location'=>"Bodega GDL",
            'role'=>"Administrador",
            'status'=>1,
        ]);

        User::create([
            'name'=>"Mayorista",
            'lastName' => "",
            'company'=>"Company Mayorista",
            'email'=>"mayorista@gmail.com",
            'password'=>bcrypt("123123123"),
            'phone'=>"123123123",
            'discount'=>"0",
            'businessName'=>"BusinessName Mayorista",
            'cfdi'=>"Uso general",
            'rfc'=>"MAYO951232D24",
            'type'=>"Fisico",
            'location'=>"Bodega GDL",
            'role'=>"Mayorista",
            'status'=>1,
        ]);

        User::factory(20)->create();
    }
}
