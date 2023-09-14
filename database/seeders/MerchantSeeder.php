<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $merchants = [
            ['name' => 'Merchant 1', 'website' => 'https://merchant1.com'],
            ['name' => 'Merchant 2', 'website' => 'https://merchant2.com'],
            ['name' => 'Merchant 3', 'website' => 'https://merchant3.com'],
            ['name' => 'Merchant 4', 'website' => 'https://merchant4.com'],
        ];

        foreach ($merchants as $merchant) {
            Merchant::create($merchant);
        }
    }
}
