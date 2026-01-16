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
            'category' => 'password',
            'issue_type' => 'reset',
            'system' => 'email',
            'platform' => 'outlook',
            'response_text' => 'Reset your email password at https://reset.company.com',
        ],
    ];

        Faq::insert($data);
    }
}
