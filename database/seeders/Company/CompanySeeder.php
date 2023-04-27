<?php

namespace Database\Seeders\Company;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <=50; $i++)
        {
            $name  = "name teste ".$i;
            $phone = rand(11111111111,99999999999);
            DB::table('companies')->insert([
                'category_id'   => 1,
                'uuid'          => Str::uuid(),
                'name'          => $name,
                'url'           => Str::slug($name,"-"),
                'phone'         => $phone,
                'whatsapp'      => $phone,
                'email'         => "teste".$i."@gmail.com",
                'created_at'    =>now(),
                'updated_at'    =>now(),
            ]);
        }
    }
}
