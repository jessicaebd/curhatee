<?php

namespace Database\Seeders;

use App\Models\Hospital;
use Illuminate\Database\Seeder;

class HospitalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hospital::create([
            'image' => 'hospital1.jpg',
            'name' => 'Rumah Sakit Mitra Keluarga Kemayoran',
            'address' => 'Jl. HBR Motik, Landas Pacu Timur, Kemayoran, RT.13/RW.6, Pademangan Tim., Pademangan, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 10630',
            'contact' => '021-6545555',
            'description' => '<p>Rumah Sakit Mitra Keluarga Kemayoran merupakan grup dari Rumah Sakit Mitra Keluarga yang dibangun sejak tahun 1989. Rumah sakit ini memiliki akreditasi KARS (Komisi Akreditasi Rumah Sakit) dengan peringkat paripurna.</p><br>

            <p>Rumah Sakit Mitra Keluarga Kemayoran melayani Visa Health Screening untuk negara Australia, Taiwan, dan Singapura. Rumah sakit ini memiliki layanan unggulan untuk Kardiologi, Onkologi, Ortopedi, Urologi, Neurologi, dan Rehabilitasi Medis, serta sleep disorder clinic.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital2.jpg',
            'name' => 'Rumah Sakit Mitra Keluarga Kelapa Gading',
            'address' => 'Jl. Bukit Gading Raya Blok E No.2, Kelapa Gading Barat, Kelapa Gading, RT.18/RW.8, Klp. Gading Bar., Klp. Gading, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14240',
            'contact' => '021-45852700',
            'description' => 'RS Mitra Keluarga Kelapa Gading merupakan grup dari Rumah Sakit Mitra Keluarga yang dibangun sejak tahun 1989 dan telah berhasil mengoperasikan 12 rumah sakit yang tersebar di beberapa kota, delapan di Jabodetabek, tiga di Surabaya, dan satu di Tegal. Rumah Sakit Mitra Keluarga Kelapa Gading juga dilengkapi dengan fasilitas pendukung medis seperti MRI dan CT Scan, serta fasilitas penunjang non medis seperti ruang tunggu dan parkir. RS Mitra Keluarga Kelapa Gading juga telah tersertifikasi dengan akreditasi KARS (Komisi Akreditasi Rumah Sakit) dengan peringkat paripurna.',
        ]);

        Hospital::create([
            'image' => 'hospital3.jpg',
            'name' => 'Rumah Sakit Mitra Keluarga Surabaya',
            'address' => 'Jl. Satelit Indah II, Darmo Satelit, Tanjungsari, Suko Manunggal, Kota SBY, Jawa Timur 60187',
            'contact' => '031-7345333',
            'description' => '<p>Rumah Sakit Mitra Keluarga Surabaya merupakan bagian dari grup Rumah Sakit Mitra Keluarga yang dibangun sejak tahun 1989 dan telah berhasil mengoperasikan 12 rumah sakit yang tersebar di beberapa kota, delapan di Jabodetabek, tiga di Surabaya, dan satu di Tegal. Rumah Sakit Mitra Keluarga Surabaya itu sendiri didirikan pada tanggal 2 Oktober 1998.</p><br>

            <p>Adapun layanan unggulan yang diberikan rumah sakit ini, meliputi Neurologi, Onkologi, Kardiologi, Ortopedi, dan Ginekologi. Rumah sakit ini menyediakan fasilitas penunjang medis, meliputi Rawat Inap, Laboratorium Klinik, Radiologi, Rehabilitation, IGD, Ambulance, Hemodialisa, dan Apotek. Selain itu, Rumah Sakit Mitra Keluarga Surabaya juga menyediakanfasilitas penunjang non medis, seperti Ruang Tunggu dan Parkir.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital4.jpg',
            'name' => 'Rumah Sakit Mitra Keluarga Tegal',
            'address' => 'Jl. Sipelem No.4 Kemandungan, Kraton, Tegal Bar., Kota Tegal, Jawa Tengah 52114',
            'contact' => '021-6545007',
            'description' => '<p>Untuk mengejar Indonesia lebih sehat, sejak tahun 1989 Rumah Sakit Mitra Keluarga terus membangun jaringan rumah sakit terpercaya di Indonesia, salah satunya adalah dengan mendirikan RS Mitra Keluarga Tegal. Rumah Sakit ke 7 yang didirikan oleh Mitra Keluarga Group ini telah beropersi sejak tanggal 5 Februari 2009.</p><br>
            <p>Layanan unggulan yang tersedia di RS Mitra Keluarga Tegal adalah laparskopi yang dapat digunakan sebagai alat diagnostik dan terapeutik atau pengobatan. Selain laparskopi, layanan unggulan lain yang tersedia di RS Mitra Keluarga Tegal adalah endoskopi, layanan pemeriksaan saluran cerna. Layanan unggulan lain yang juga tersedia di RS Mitra Keluarga Tegal yaitu rehabilitas tumbuh kembang anak, teknik operasi THT dengan metode FESS, dan CT Scan.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital5.jpg',
            'name' => 'Rumah Sakit EMC Pekayon',
            'address' => 'Jl. Pulo Ribung No.1, Pekayon Jaya, Bekasi Sel., Kota Bekasi, Jawa Barat 17148',
            'contact' => '021-29779977',
            'description' => '<p>RS EMC Pekayon berdiri pada tahun 2018 dan merupakan perusahaan penyedia layanan kesehatan dan rumah sakit terkemuka di Indonesia yang mempunyai standar manajemen tinggi dalam memberikan pelayanan kesehatan komprehensif dan profesional.</p><br>

            <p>RS EMC Pekayon mulai resmi beroperasi pada 10 September 2018 dengan menyediakan 6 (enam) layanan unggulan – Center of Excellence yang terdiri dari Cardiovascular Center, Orthopaedic Center, Neuroscience Center, Oncology Center, Digestive Center, dan Urology Center. Setiap Layanan Center of Excellence OMNI Hospitals Pekayon ditangani oleh dokter spesialis berpengalaman dibidangnya, serta didukung tim medis profesional dan alat penunjang medis terkini.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital6.jpg',
            'name' => 'Rumah Sakit EMC Pulomas',
            'address' => 'Jl. Pulomas Barat VI No. 20, Pulomas, RT.1/RW.11, Kayu Putih, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13210',
            'contact' => '021-29779977',
            'description' => '<p>RS EMC Pulomas berdiri pada tahun 1972 dan merupakan perusahaan penyedia layanan kesehatan dan rumah sakit terkemuka di Indonesia yang mempunyai standar manajemen tinggi dalam memberikan pelayanan kesehatan komprehensif dan profesional.</p><br>

            <p>RS EMC Pulomas mempunyai Layanan Unggulan (Center of Excellence) yang didukung oleh Tim Dokter Spesialis dan Tim Medis Professional dibidangnya, serta Alat Penunjang Medis berteknologi canggih. Centers of Excellence RS EMC Pulomas terdiri dari Cardiovascular Center, Orthopaedic Center, Neuroscience Center, Urology Center, Oncology Center dan Digestive Center.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital7.jpg',
            'name' => 'Rumah Sakit EMC Alam Sutera',
            'address' => 'Jl. Alam Sutera Boulevard Kav. 25, Pakulonan, Serpong Utara, Pakulonan, Serpong Utara, Kota Tangerang Selatan, Banten 15325',
            'contact' => '021-29779977',
            'description' => '<p>RS EMC Alam Sutera berdiri pada tahun 2007 dan merupakan perusahaan penyedia layanan kesehatan dan rumah sakit terkemuka di Indonesia yang mempunyai standar manajemen tinggi dalam memberikan pelayanan kesehatan komprehensif dan profesional.</p><br>

            <p>RS EMC Alam Sutera mulai beroperasi pada tahun 2008 dengan menyediakan 7 (tujuh) Layanan Unggulan / Center of Excellence, serta didukung oleh para tim medis yang ahli di bidangnya seperti Cardiovascular Center, Orthopaedic Center, Kawasaki Center, Neuroscience Center, Urology Center, Oncology Center dan Digestive Center.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital8.jpg',
            'name' => 'Rumah Sakit Husada Jakarta',
            'address' => 'Jl. Raya Mangga Besar No.137-139, Mangga Dua Sel., Kec. Sawah Besar, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta',
            'contact' => '021-6260108',
            'description' => '<p>Rumah Sakit Husada adalah rumah sakit umum yang terletak di wilayah Sawah Besar, Jakarta Pusat yang semula bernama Rumah Sakit Jang Seng Ie. Rumah Sakit Husada merupakan rumah sakit tipe B dan telah berdiri sejak tahun 1924. Rumah Sakit Husada memiliki Visi menjadi Rumah Sakit bertaraf internasional dengan pelayanan paripurna.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital9.jpg',
            'name' => 'Rumah Sakit Tebet',
            'address' => 'Jl. Letjen M.T. Haryono, Kavling 13 No. 8, RT.11/RW.5, Tebet Barat, Jakarta Selatan, Daerah Khusus Ibukota Jakarta 15810',
            'contact' => '021-83754044',
            'description' => '<p>Rumah Sakit TEBET berdiri pada tanggal 2 April 1982 oleh Yayasan Bina Sehat Interna dalam bentuk Klinik Praktek Bersama Dokter Spesialis. Pada tahun 1984 dikembangkan menjadi Rumah Sakit TEBET. Rumah Sakit Tebet terletak dibilangan Jakarta Selatan berbatasan dengan wilayah Jakarta Timur.</p><br>

            <p>Saat ini Rumah Sakit TEBET mempunyai 2 bangunan yang terdiri dari gedung baru berlantai 8 dengan luas 7.262 m2 dan gedung lama berlantai 4 dengan luas 2.316 m2. Saat ini RS Tebet memiliki fasilitas layanan rawat inap sebanyak 156 tempat tidur dengan 36 produk jasa pelayanan kesehatan dan dalam pelayanannya pada tahun 2011 telah terakreditasi oleh DEPKES RI dengan status akreditasi penuh untuk 16 pelayanan dan pada tanggal 26 Februari 2015 sesuai SK Menteri Kesehatan Nomor : HK.02.03/l/0439/2015 dinyatakan sebagai Rumah Sakit Tipe B.</p>',
        ]);

        Hospital::create([
            'image' => 'hospital10.jpg',
            'name' => 'Rumah Sakit JIH',
            'address' => 'Jl. Ringroad Utara No. 160, Condong Catur, Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55283',
            'contact' => '0274-4463535',
            'description' => '<p>Rumah Sakit JIH berada di bawah pengelolaan PT Unisia Medika Farma (PT UMF), dan didirikan pada tahun 2005. Rumah sakit ini memiliki tujuan untuk membangun institusi syariah di bidang pelayanan kesehatan. RS JIH juga telah mengantongi sertifikasi Halal dari Majelis Ulama Indonesia. Rumah sakit JIH selalu berkomitmen menghadirkan inovasi layanan untuk pasien. Dengan didukung oleh Dokter, Perawat, Paramedis dan Staf yang Profesional dan ramah melayani pasien. Tidak hanya itu, Rumah sakit JIH juga didukung dengan peralatan medis modern mengikuti perkembangan jaman sekarang.</p><br>

            <p>Rumah sakit ini memiliki layanan unggulan, yaitu Ginekologi, Pediatri, Kardiologi, Neurologi, Optalmologi, Urologi, Gastroenterologi, Hematologi, Onkologi, Bedah Umum, Bedah Digestif, dan Bedah Saraf. Selain itu, rumah sakit ini juga melayani di bidang Gigi dan Mulut, Ortopedi, dan Estetik.</p>',
        ]);
    }
}
