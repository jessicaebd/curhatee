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
            'phone' => '089689011801',
            'password' => bcrypt('Karel123'),
            'rating' => 5,
            'fee' => 10000,
            'description' => 'Karel Karsten Himawan, M.Psi., Ph.D. adalah Dosen Program Studi Psikologi. Ia mengajar mata kuliah Psikologi Sosial, Kode Etik Psikologi, dan Psikologi Abnormal.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Eunike M. Himawan',
            'image' => 'psychologist-Eunike.png',
            'email' => 'eunike@experiencing-life.com',
            'phone' => '089689011801',
            'password' => bcrypt('Eunike2122'),
            'rating' => 4,
            'fee' => 10000,
            'description' => 'Bagi Eunike, hidup selalu muda! Dia senang membantu remaja dan dewasa muda dalam mengatasi tantangan hidup dalam tonggak perkembangan mereka.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Ratih Zulhaqqi',
            'image' => 'psychologist-Ratih.png',
            'email' => 'ratih.zulhaqqi@raqqiconsulting.com',
            'phone' => '089689011801',
            'password' => bcrypt('Ratih234'),
            'rating' => 5,
            'fee' => 10000,
            'description' => 'Ibu Ratih adalah psikolog klinis anak lulusan Magister Psikologi Universitas Indonesia dan mulai berpraktik sejak tahun 2009.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Maria Yulinda Ayu',
            'image' => 'psychologist-Maria.png',
            'email' => 'maria.yulinda@kinderhuette.com',
            'phone' => '089689011801',
            'password' => bcrypt('Maria2323'),
            'rating' => 5,
            'fee' => 10000,
            'description' => 'Maria Yulinda Ayu Natalia, M.Psi, M.Sc merupakan seorang psikolog. Beliau menyelesaikan pendidikan Psikologi dan Magister Psikologi Profesi di Universitas Gadjah Mada, serta lulusan S2 Universität Erfurt, Jerman.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Nadia Emanuellala Gideon',
            'image' => 'psychologist-Nadia.png',
            'email' => 'jcdcpartner@gmail.com',
            'phone' => '089689011801',
            'password' => bcrypt('Nadia0987'),
            'rating' => 5,
            'fee' => 10000,
            'description' => 'Mrs. Nadia Emanuella Gideon adalah seorang konselor akademik dan psikolog anak yang berpengalaman dalam bidang masalah akademik, Attention Deficit Hyperactivity Disorder (ADHD), dan perkembangan anak.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mr. Reneta Kristiani',
            'image' => 'psychologist-Reneta.png',
            'email' => 'klinikpelangi@gmail.com',
            'phone' => '089689012871',
            'password' => bcrypt('Reneta1217'),
            'rating' => 5,
            'fee' => 12000,
            'description' => 'Reneta Kristiani adalah psikolog klinis anak yang bekerja sebagai dosen tetap di Fakultas Psikologi. Dia mengajar kursus Psikologi Perkembangan, Psikologi Pendidikan, Konseling Dasar dan Pelecehan Anak.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Ratih Ibrahim',
            'image' => 'psychologist-RatihIbrahim.png',
            'email' => 'ratih.ibrahim@personalgrowth.co.id',
            'phone' => '081238675312',
            'password' => bcrypt('RatihIbrahim123'),
            'rating' => 4.5,
            'fee' => 11000,
            'description' => 'Ratih Ibrahim, S.Psi, MM merupakan seorang psikolog lulusan dari Universitas Indonesia, Ratih fokus pada remaja di Sekolah Menengah Sancta Ursula sebagai penasihat.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);

        Psychologist::create([
            'name' => 'Mrs. Oetami Prasadjaningsih',
            'image' => 'psychologist-Oetami.png',
            'email' => 'ortanosaranamandiri@gmail.com',
            'phone' => '081273254763',
            'password' => bcrypt('Oetami341'),
            'rating' => 4,
            'fee' => 15000,
            'description' => 'Dr. MC. Oetami Prasadjaningsih,M.Psi. meniti karir sebagai dosen, konselor dan psikolog di Perbanas Institute Jakarta Sejak tahun 1987.',
            'hospital_id' => Hospital::all()->random()->id,
        ]);


        // Psychologist::factory(15)->create();
    }
}
