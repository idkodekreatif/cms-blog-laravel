<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Config::insert([
            [
                'name' => 'logo',
                'value' => 'logo.png'
            ],
            [
                'name' => 'address',
                'value' => 'Sidoarjo, Jawa Timur'
            ],
            [
                'name' => 'blogname',
                'value' => 'Code Creative'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to Blog Home!'
            ],
            [
                'name' => 'caption',
                'value' => 'A Bootstrap 5 starter layout for your next blog homepage'
            ],
            [
                'name' => 'title',
                'value' => 'Welcome to Blog Home!'
            ],
            [
                'name' => 'phone',
                'value' => '097722'
            ],
            [
                'name' => 'email',
                'value' => 'ar.agusbaha@gmail.com'
            ],
            [
                'name' => 'footer',
                'value' => 'Agus Baha'
            ],
        ]);
    }
}
