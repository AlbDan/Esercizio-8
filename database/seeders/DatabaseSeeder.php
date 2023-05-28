<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
    * Seed the application's database.
    */
    public function run(): void
    {
        
        // $tags = ['Final Fantasy', 'Zidane', 'Sephiroth', 'Kingdom Hearts', 'Squall', 'Cloud', 'Steiner', 'Garnet', 'Tidus'];
        
        // foreach ($tags as $tag) {
        //     DB::table('tags')->insert([
        //         'name' => $tag,
        //         'created_at' => Carbon::now(),
        //         'updated_at' => Carbon::now()
        //     ]);
        // }
        $roles = ['admin', 'user'];
        
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);        
        }
        
    }
}
