<?php

namespace Database\Seeders;

use App\Models\Hospital;
use App\Models\Psychologist;
use Illuminate\Database\Seeder;

class PsychologistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Psychologist::create([
            'name' => 'Dr. Karel Karsten Himawan',
            'image' => 'psychologist-Karel.png',
            'email' => 'karel@experiencing-life.com',
            'password' => 'Karel123',
            'rating' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit sit assumenda molestias, molestiae quam natus eum fugiat unde aspernatur, accusamus non, rem eveniet sapiente voluptatum pariatur nobis corporis qui possimus.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Eunike M. Himawan',
            'image' => 'psychologist-Eunike.png',
            'email' => 'eunike@experiencing-life.com',
            'password' => 'Eunike2122',
            'rating' => 4,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit sit assumenda molestias, molestiae quam natus eum fugiat unde aspernatur, accusamus non, rem eveniet sapiente voluptatum pariatur nobis corporis qui possimus.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Ratih Zulhaqqi',
            'image' => 'psychologist-Ratih.png',
            'email' => 'ratih.zulhaqqi@raqqiconsulting.com',
            'password' => 'Ratih234',
            'rating' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit sit assumenda molestias, molestiae quam natus eum fugiat unde aspernatur, accusamus non, rem eveniet sapiente voluptatum pariatur nobis corporis qui possimus.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Maria Yulinda Ayu',
            'image' => 'psychologist-Maria.png',
            'email' => 'maria.yulinda@kinderhuette.com',
            'password' => 'Maria2323',
            'rating' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit sit assumenda molestias, molestiae quam natus eum fugiat unde aspernatur, accusamus non, rem eveniet sapiente voluptatum pariatur nobis corporis qui possimus.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Nadia Emanuellala Gideon',
            'image' => 'psychologist-Nadia.png',
            'email' => 'jcdcpartner@gmail.com',
            'password' => 'Nadia0987',
            'rating' => 5,
            'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Impedit sit assumenda molestias, molestiae quam natus eum fugiat unde aspernatur, accusamus non, rem eveniet sapiente voluptatum pariatur nobis corporis qui possimus.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);
    }
}
