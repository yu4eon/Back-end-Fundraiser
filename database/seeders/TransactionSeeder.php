<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transaction = new Transaction();
        $transaction->montant = 45.99;
        $transaction->user_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->montant = 50.99;
        $transaction->user_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->montant = 22.50;
        $transaction->user_id = 1;
        $transaction->save();
    }
}
