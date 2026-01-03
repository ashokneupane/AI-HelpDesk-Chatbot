<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data  = [
        [
            'intent' => 'password_reset',
            'account_type' => 'email',
            'answer' => 'Reset your email password at https://reset.company.com',
        ],
         [
            'intent' => 'password_reset',
            'account_type' => 'vpn',
            'answer' => 'Reset VPN password via IT portal',
        ],
         [
            'intent' => 'account_locked',
            'account_type' => null,
            'answer' => 'Wait 15 minutes or contact IT',
        ],
    ];

        Faq::insert($data);
    }
}
