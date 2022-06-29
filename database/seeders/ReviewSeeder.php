<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Review::create([
            'transaction_id' => Transaction::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, necessitatibus ut similique inventore libero molestias ducimus doloremque dignissimos exercitationem ratione omnis asperiores rem repellat at soluta temporibus facilis quae! Eos.', 
            'rating' => 4
        ]);

        Review::create([
            'transaction_id' => Transaction::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, necessitatibus ut similique inventore libero molestias ducimus doloremque dignissimos exercitationem ratione omnis asperiores rem repellat at soluta temporibus facilis quae! Eos.', 
            'rating' => 5
        ]);

        Review::create([
            'transaction_id' => Transaction::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, necessitatibus ut similique inventore libero molestias ducimus doloremque dignissimos exercitationem ratione omnis asperiores rem repellat at soluta temporibus facilis quae! Eos.', 
            'rating' => 3
        ]);
    }
}
