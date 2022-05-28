<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('companies')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'logo' => Str::random(10),
            'website' => Str::random(10)
        ]);
    }
}
