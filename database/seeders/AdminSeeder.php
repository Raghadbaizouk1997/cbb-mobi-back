<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'email' => 'raghadbaizouk1997@gmail.com',
                'password' => bcrypt('raghad123'),
                'name' => 'raghad baizouk' ,
                'mobile' => '0551397990'
            ]
        ];
        foreach($admins as $admin){
            Admin::create($admin);        
        }
    }
}
