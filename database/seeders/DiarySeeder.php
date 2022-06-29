<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Diary;
use Illuminate\Database\Seeder;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Diary::create([
            'user_id' => User::all()->random()->id,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur nihil provident ipsam sapiente ad ab eum eaque ea, alias quae quisquam facere corporis suscipit veritatis? Magni fugiat optio labore facere!',
            'date' => '20-6-2002'
        ]);
    }
}
