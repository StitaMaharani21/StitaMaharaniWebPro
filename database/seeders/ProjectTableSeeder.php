<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'title' => 'barang',
                'description' => 'foto gambar barang',
                'image_url' => 'contohurl',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
        ]);
    }
}
