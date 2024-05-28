<?php

namespace Database\Seeders;

use App\Models\AdminBankAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminBankAccountTableSeeder extends Seeder
{
    public function run()
    {
        $bank = [
            [
                'id'    => 1,
                'bank_type' => 'KBZ Banking',
            ],
            [
                'id'    => 2,
                'bank_type' => 'KBZ Pay',
            ],
            [
                'id'    => 3,
                'bank_type' => 'AYA Pay',
            ],
            [
                'id'    => 4,
                'bank_type' => 'AYA Bank',
            ],
            [
                'id'    => 5,
                'bank_type' => 'Wave Money',
            ],
        ];

        AdminBankAccount::insert($bank);
    }
}
