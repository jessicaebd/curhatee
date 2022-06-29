<?php

namespace Database\Seeders;

use App\Models\Podcast;
use App\Models\Psychologist;
use Illuminate\Database\Seeder;

class PodcastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Podcast
        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Bagaimana cara memaafkan orang lain yang nggak merasa bersalah? (Forgiveness Therapy)',
            'spotify_url' => 'https://open.spotify.com/episode/7dfO2dj0X9VUdkF4iLquT1?si=3b9ede5b6b5a474d',
            'date' => '2022-06-26'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Love Language & Toxic Relationship - Ngomongin soal bahasa cinta',
            'spotify_url' => 'https://open.spotify.com/episode/26Eq4BBZVuIketTNX87dat?si=358d6cded68d4372',
            'date' => '2022-04-18'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Self Exploration with TEDxUnpar : Quarter Life Crisis',
            'spotify_url' => 'https://open.spotify.com/episode/7mk1z8U92vzPfRnbbxRabL?si=384e2e4fd603492e',
            'date' => '2022-01-04'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Live Therapy : Emotional Release with Hypnotherapy',
            'spotify_url' => 'https://open.spotify.com/episode/3umyDfXUY8MBym0BqgN5yY?si=731a6cbd80064741',
            'date' => '2022-01-01'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Faktor "KTP" sebagai pembentuk kepribadian',
            'spotify_url' => 'https://open.spotify.com/episode/0MpQWE8TyEGxRABkMXxra1?si=73cbb8ce05f948bb',
            'date' => '2022-02-07'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Yang Perlu Dipertimbangkan Sebelum Menetapkan Pilihan dalam Hidup',
            'spotify_url' => 'https://open.spotify.com/episode/1mhtra70aSXzbVIYXVbhwn?si=8c102beed9e94c80',
            'date' => '2022-06-26'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Kita vs Diri Sendiri',
            'spotify_url' => 'https://open.spotify.com/episode/19ixAdcRJEP5cCpy5BQusC?si=7d534b1244c14e4a',
            'date' => '2022-06-05'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Tentang Pencapaian ORang Lain dan Proses Hidup Kita',
            'spotify_url' => 'https://open.spotify.com/episode/1YjhDFPbOheIcrusyIlqrK?si=a42987389b614e64',
            'date' => '2022-05-28'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Merefleksikan HUbungan Kita dengan Keluarga',
            'spotify_url' => 'https://open.spotify.com/episode/0EnjXJborphAkw4QS4jugp?si=0974d64d7ee54ec5',
            'date' => '2022-02-02'
        ]);

        Podcast::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Belajar Adil Sama Diri Sendiri',
            'spotify_url' => 'https://open.spotify.com/episode/72F85MR4E6J38nM59Xxad1?si=dce7e564b3104e5c',
            'date' => '2022-06-03'
        ]);
    }
}
