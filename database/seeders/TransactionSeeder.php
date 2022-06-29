<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\PaymentType;
use App\Models\Transaction;
use App\Models\Psychologist;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Transaction::create([
            'user_id' => User::all()->random()->id,
            'psychologist_id' => Psychologist::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'price' => 100000,
            'detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, illum optio. Enim autem iste qui voluptatem eum beatae suscipit mollitia ipsum nam molestiae ex, sint culpa porro provident rerum dolor?',
            'status' => 'done',
            'time' => '28-06-2022'
        ]);

        Transaction::create([
            'user_id' => User::all()->random()->id,
            'psychologist_id' => Psychologist::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'price' => 200000,
            'detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, illum optio. Enim autem iste qui voluptatem eum beatae suscipit mollitia ipsum nam molestiae ex, sint culpa porro provident rerum dolor?',
            'status' => 'done',
            'time' => '29-06-2022'
        ]);

        Transaction::create([
            'user_id' => User::all()->random()->id,
            'psychologist_id' => Psychologist::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'price' => 200000,
            'detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, illum optio. Enim autem iste qui voluptatem eum beatae suscipit mollitia ipsum nam molestiae ex, sint culpa porro provident rerum dolor?',
            'status' => 'done',
            'time' => '28-05-2022'
        ]);

        Transaction::create([
            'user_id' => User::all()->random()->id,
            'psychologist_id' => Psychologist::all()->random()->id,
            'payment_type_id' => PaymentType::all()->random()->id,
            'price' => 100000,
            'detail' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, illum optio. Enim autem iste qui voluptatem eum beatae suscipit mollitia ipsum nam molestiae ex, sint culpa porro provident rerum dolor?',
            'status' => 'done',
            'time' => '27-06-2022'
        ]);
    }
}
