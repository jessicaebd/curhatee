<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Psychologist;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Berkenalan dengan Kesehatan Mental',
            'content' => '<p>Kesehatan mental begitu istimewa, hingga WHO menetapkan setiap tanggal 10 Oktober diperingati sebagai Hari Kesehatan Jiwa Sedunia. Ditetapkannya momen ini tentu memiliki tujuan, yaitu mengkampanyekan kesehatan mental dan memberikan edukasi kepada masyarakat mengenai isu-isu yang relevan berkaitan dengan kesehatan mental.</p>

            Lalu, apa yang dimaksud dengan kesehatan mental ? Menurt WHO (2004), kesehatan mental adalah kondisi sejahtera dimana individu mampu :<br><br>

            - Menyadari kemampuan yang ia miliki<br>
            - Mengatasi tekanan dan stres dalam kehidupan sehari-hari<br>
            - Bekerja produktif dan mampu berkontribusi aktif di lingkungan atau komunitasnya<br><br>

            Lalu, kondisi seperti apa yang masuk dalam kategori mengalami masalah kesehatan mental? Dan, apakah kita sehat mental?<br><br>

            <p>Terdapat suatu istilah mental distress, yakni perasaan yang dialami oleh seseorang ketika dihadapkan pada situasi yang menimbulkan ketidaknyamanan, misalnya tidak memiliki pekerjaan tetap, mengalami PHK, beban kerja yang tinggi, banyaknya tugas sekolah, dikhianati teman, dsb. Berbagai situasi tersebut akan memicu munculnya perasaan seperti sedih, kecewa, merasa bersalah, pesimis, marah, benci, atau lainnya. Kondisi-kondisi ini sangatlah wajar, karena bagaimanapun juga, kita akan selalu dihadapkan pada situasi yang sifatnya dinamis dan tidak terduga. Mental distress ini dapat menjadi sebuah kesempatan bagi individu untuk berupaya mengatasinya dengan menggunakan ketrampilan penyelesaian masalah secara tepat. Ketika individu mampu mengatasi kondisi tidak nyaman tersebut dan berhasil mengembangkan dirinya secara positif, maka yang bersangkutan tidak membutuhkan penanganan lebih lanjut yang mungkin melibatkan tenaga profesional.</p>

            Kemudian, kondisi apa yang dapat memicu masalah kesehatan mental lebih lanjut ?<br><br>

            <p>Seperti yang telah dijelaskan sebelumnya, bahwa mengalami suatu kejadian yang tidak nyaman dalam keseharian adalah hal wajar. Otak manusiapun juga akan berusaha untuk menyeimbangkan kembali kondisi fisik dan psikologis dengan cara adaptif. Namun, bila situasi yang terjadi datangnya terus-menerus (beruntun) dan sifatnya sangat jarang dibanding keadaan mental distress, seperti kematian anggota keluarga, bullying yang sangat berat,  hingga dirasa mengganggu fungsi keseharian, maka kondisi ini dapat beresiko memicu munculnya masalah kesehatan mental. Jika individu tersebut belum mampu mengatasi masalah secara optimal, maka yang bersangkutan dapat melibatkan peran profesional (misalnya psikolog) untuk membantunya mengupayakan strategi penyelesaian masalah yang lebih efektif.</p>

            <p>Terdapat pula istilah gangguan mental, yakni suatu keadaan dimana otak mengalami permasalahan sehingga individu tidak dapat menjalankan fungsi kesehariannya, sebagai contoh kesulitan tidur hingga beberapa waktu, mengurung diri di kamar dan menolak aktivitas, gangguan makan yang ekstrem, menghindari relasi sosial, bahkan munculnya ide atau pikiran menyakiti diri. Kondisi ini tentu sudah membutuhkan proses diagnosis dan penanganan lebih lanjut sesuai temuan gejala yang dilakukan oleh profesional seperti psikiater dan psikolog.</p>

            <br>Lantas, hal apa saja yang dapat kita lakukan untuk menjaga kesehatan mental dan tetap dapat berfungsi dalam keseharian?<br><br>

            - Rawatlah diri secara berkala. Anda dapat melakukan teknik self care, yakni serangkaian tindakan untuk fisik, emosi, dan spiritual  yang mencerminkan cara kita menjaga diri kita sendiri. Self-care bukanlah sebuah keegoisan, melainkan bentuk kepedulian terhadap kesehatan dan kesejahteraan fisik serta mental kita.<br>
            - Meluangkan waktu untuk melakukan self-care dapat membantu kita dalam  mengatasi stres, kecemasan, bahkan mengontrol kemarahan.  Melakukan aktivitas sederhana dan yang disukai secara rutin dapat meningkatkan kesejahteraan psikologis kita. Berikut beberapa contoh yang dapat kita lakukan sebagai bentuk dari self care.
            Bekali diri dengan kemampuan problem solving yang optimal. Sadari bahwa masalah hadir untuk diselesaikan, bukan untuk dihindari (flight response). Pahami pula penyelesaian masalah tidak bersifat instan, melainkan butuh proses dan konsistensi dalam mengupayakannya. Belajar tentang manajemen stres dan ketrampilan mengelola emosi, dapat kita gunakan sebagai “amunisi” manakala tengah dihadapkan pada situasi yang tidak nyaman.<br>
            - Jangan melabel atau mendiagnosa diri. Memberikan cap bahwa “aku ini payah”, “aku memang pantas mengalami ini”, dsb hanya akan menimbulkan ketidaknyamaan dalam diri karena adanya rasa tidak berharga. Atau, “dari artikel ini, sepertinya aku depresi” atau “aku sering alami swing mood, berarti aku mengalami bipolar”. Diagnosa adalah bagian dari proses pemeriksaan yang dilakukan profesional untuk membantu pemberian penanganan (medis maupun psikologis) yang tepat terhadap pasien. Jika memang merasakan ada yang tidak nyaman dan dinilai menurunkan kualitas kesehatan, segera akses layanan kesehatan untuk melakukan konsultasi dengan tenaga medis dan psikolog.

            <p>Sama halnya dengan kesehatan fisik, kesehatan mental juga merupakan sebuah kebutuhan dasar yang akan mempengaruhi kualitas hidup seseorang. Pahami kondisi diri, kenali situasi dan efeknya, upayakan optimalisasi penyelesaian masalah, serta hubungi profesional jika memang sangat dibutuhkan. Selamat berproses dalam perjalanan kehidupan. Salam sehat jiwa.</p>',
            'image' => 'artikel1.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Kesehatan Mental',
            'content' => 'Pengertian Kesehatan Mental<br><br>

            <p>Kesehatan mental dipengaruhi oleh peristiwa dalam kehidupan yang meninggalkan dampak yang besar pada kepribadian dan perilaku seseorang. Peristiwa-peristiwa tersebut dapat berupa kekerasan dalam rumah tangga, pelecehan anak, atau stres berat jangka panjang.</p>

            <p>Jika kesehatan mental terganggu, maka timbul gangguan mental atau penyakit mental. Gangguan mental dapat mengubah cara seseorang dalam menangani stres, berhubungan dengan orang lain, membuat pilihan, dan memicu hasrat untuk menyakiti diri sendiri.</p>

            <p>Beberapa jenis gangguan mental yang umum ditemukan, antara lain depresi, gangguan bipolar, kecemasan, gangguan stres pasca trauma (PTSD), gangguan obsesif kompulsif (OCD), dan psikosis. Beberapa penyakit mental hanya terjadi pada jenis pengidap tertentu, seperti postpartum depression hanya menyerang ibu setelah melahirkan.</p><br><br>


            Gejala Kesehatan Mental<br>
            Gangguan mental atau penyakit mental dapat diawali dengan beberapa gejala berikut ini, antara lain:<br><br>

            - Delusi, paranoia, atau halusinasi.<br>
            - Kehilangan kemampuan untuk berkonsentrasi.<br>
            - Ketakutan, kekhawatiran, atau perasaan bersalah yang selalu menghantui.<br>
            - Ketidakmampuan untuk mengatasi stres atau masalah sehari-hari.<br>
            - Marah berlebihan dan rentan melakukan kekerasan.<br>
            - Memiliki pengalaman dan kenangan buruk yang tidak dapat dilupakan.<br>
            - Memiliki pikiran untuk menyakiti diri sendiri atau orang lain.<br>
            - Menarik diri dari orang-orang dan kegiatan sehari-hari.<br>
            - Mengalami perubahan suasana hati drastis yang menyebabkan masalah dalam hubungan dengan orang lain.<br>
            - Merokok, minum alkohol lebih dari biasanya, atau bahkan menggunakan narkoba.<br>


            <br><br>Penyebab Kesehatan Mental<br>
            Beberapa penyebab umum dari gangguan mental, antara lain:<br><br>

            - Cedera kepala.<br>
            - Faktor genetik atau terdapat riwayat pengidap gangguan mental dalam keluarga.<br>
            - Kekerasan dalam rumah tangga atau pelecehan lainnya.<br>
            - Kekerasan pada anak atau riwayat kekerasan pada masa kanak-kanak.<br>
            - Memiliki kelainan senyawa kimia otak atau gangguan pada otak.<br>
            - Mengalami kehilangan atau kematian seseorang yang sangat dekat.<br>
            - Pengaruh zat racun, alkohol, atau obat-obatan yang dapat merusak otak.<br>
            - Stres berat yang dialami dalam waktu yang lama.<br>
            - Terisolasi secara sosial atau merasa kesepian.<br>
            - Tinggal di lingkungan perumahan yang buruk.<br>
            - Trauma signifikan, seperti pertempuran militer, kecelakaan serius, atau kejahatan dan yang pernah dialami.<br>


            <br><br>Faktor Risiko Kesehatan Mental<br>
            Beberapa faktor risiko gangguan mental, antara lain:<br><br>

            - Perempuan setelah melahirkan.<br>
            - Memiliki masalah di masa kanak-kanak atau masalah gaya hidup.<br>
            - Memiliki profesi yang memicu stres, seperti dokter dan pengusaha.<br>
            - Memiliki riwayat anggota keluarga atau keluarga dengan penyakit mental.<br>
            - Memiliki riwayat kelahiran dengan kelainan pada otak.<br>
            - Memiliki riwayat penyakit mental sebelumnya.<br>
            - Menyalahgunakan alkohol atau obat-obatan terlarang.<br>


            <br><br>Diagnosis Kesehatan Mental<br>
            <p>Dokter ahli jiwa atau psikiater akan mendiagnosis suatu gangguan mental dengan diawali suatu wawancara medis dan wawancara psikiatri lengkap mengenai riwayat perjalanan gejala pada pengidap serta riwayat penyakit pada keluarga pengidap. Kemudian, dilanjutkan dengan pemeriksaan fisik yang menyeluruh untuk mengeliminasi kemungkinan adanya penyakit lain.</p>

            <p>Jika diperlukan, dokter akan meminta untuk dilakukan pemeriksaan penunjang, seperti pemeriksaan fungsi tiroid, skrining alkohol dan obat-obatan, serta CT scan untuk mengetahui adanya kelainan pada otak pengidap. Jika kemungkinan adanya penyakit lain sudah dieliminasi, dokter akan memberikan obat dan rencana terapi untuk membantu mengelola emosi pengidap.</p><br><br>


            <br>Pencegahan Kesehatan Mental<br>
            Beberapa upaya yang dapat dilakukan untuk mencegah gangguan mental, yaitu:<br><br>

            - Melakukan aktivitas fisik dan tetap aktif secara fisik.<br>
            - Membantu orang lain dengan tulus.<br>
            - Memelihara pikiran yang positif.<br>
            - Memiliki kemampuan untuk mengatasi masalah.<br>
            - Mencari bantuan profesional jika diperlukan.<br>
            - Menjaga hubungan baik dengan orang lain.<br>
            - Menjaga kecukupan tidur dan istirahat.<br>


            <br><br>Pengobatan Kesehatan Mental<br>
            Beberapa pilihan pengobatan yang akan dilakukan dokter dalam menangani gangguan mental, antara lain:<br><br>
            - Psikoterapi. Psikoterapi merupakan terapi bicara yang memberikan media yang aman untuk pengidap dalam mengungkapkan perasaan dan meminta saran. Psikiater akan memberikan bantuan dengan membimbing pengidap dalam mengontrol perasaan. Psikoterapi beserta perawatan dengan menggunakan obat-obatan merupakan cara yang paling efektif untuk mengobati penyakit mental. Beberapa contoh psikoterapi, antara lain cognitive behavioral therapy, exposure therapy, dialectical behavior therapy, dan sebagainya.<br>
            - Obat-obatan. Pemberian obat-obatan untuk mengobati penyakit mental umumnya bertujuan untuk mengubah senyawa kimia otak di otak. Obat-obatan tersebut berupa golongan selective serotonin reuptake inhibitor (SSRI), serotonin-norepinephrine reuptake inhibitor (SNRIs), dan antidepresan trisiklik. Obat-obatan ini umumnya dikombinasikan dengan psikoterapi untuk hasil pengobatan yang lebih efektif.<br>
            - Rawat inap. Rawat inap diperlukan jika pengidap membutuhkan pemantauan ketat terhadap gejala-gejala penyakit yang dialaminya atau terdapat kegawatdaruratan di bidang psikiatri, misalnya percobaan bunuh diri.<br>
            - Support group. Support group umumnya beranggotakan pengidap penyakit mental yang sejenis atau yang sudah dapat mengendalikan emosinya dengan baik. Mereka berkumpul untuk berbagi pengalaman dan membimbing satu sama lain menuju pemulihan.<br>
            - Stimulasi otak. Stimulasi otak berupa terapi elektrokonvulsif, stimulasi magnetik transkranial, pengobatan eksperimental yang disebut stimulasi otak dalam, dan stimulasi saraf vagus.<br>
            - Pengobatan terhadap penyalahgunaan zat. Pengobatan ini dilakukan pada pengidap penyakit mental yang disebabkan oleh ketergantungan akibat penyalahgunaan zat terlarang.<br>
            - Membuat rencana bagi diri sendiri, misalnya mengatur gaya hidup dan kebiasaan sehari-hari, untuk melawan penyakit mental. Rencana ini bertujuan untuk memantau kesehatan, membantu proses pemulihan, dan mengenali pemicu atau tanda-tanda peringatan penyakit.<br>


            <br><br>Kapan Harus ke Dokter?<br>
            <p>Jika diri sendiri atau kerabat menunjukkan gejala-gejala yang telah disebutkan di atas secara terus-menerus dan tidak membaik, sebaiknya segera memeriksakan diri ke dokter spesialis jiwa atau psikiater untuk mendapatkan pemeriksaan dan penanganan lebih lanjut. Untuk melakukan pemeriksaan, kamu bisa langsung membuat janji dengan dokter di rumah sakit pilihan kamu.</p>',
            'image' => 'artikel2.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Langkah Mudah Menjaga Kesehatan Mental',
            'content' => '<p>Dengan banyaknya tuntutan dalam kehidupan yang disertai tekanan, tidaklah heran seseorang akan mudah merasa stress yang dapat mengakibatkan gangguan kesehatan mental. Karir, bisnis, pendidikan, asmara, keluarga, hingga macet pun dapat berkontribusi mengganggu stabilitas mental seseorang.</p><br>

            <p>Yang dikhawatirkan jika berlangsung konsisten dalam periode waktu yang lama. Mental seseorang yang terganggu akan mengubah karakternya secara perlahan menjadi negative. Berikut adalah beberapa cara mudah, yang bisa dilakukan untuk menjaga kesehatan jiwa:</p><br><br>

            1. Kontrol Emosi Kamu<br>
            Belajar untuk tidak mudah tersinggung terhadap apa saja yang dikatakan seseorang, pilah apa yang mereka katakan, dan ambil sisi positifnya.<br>


            2. Mencoba hal baru<br>
            Saat terjadi kekosongan waktu atau kamu mulai merasa bosan dengan aktivitas yang itu-itu saja, maka kamu bisa mengisi waktu dengan mencoba hal-hal baru sendiri atau bersama temanmu.<br>


            3. Bercerita Kepada Orang Lain<br>
            Bercerita pada orang yang kamu percaya dapat mengurangi beban yang sedang kamu pikul.<br>


            4. Pergi Keluar<br>
            Meskipun hanya 10 menit dalam sehari, luangkanlah waktu untuk duduk atau berjalan di ruang terbuka yang dikelilingi pepohonan dan udara segar. Hal ini secara instan akan mengangkat sedikit banyak tingkat stress dalam pikiran dan mengisi kembali energi dalam tubuh.<br>


            5. Olahraga<br>
            Selalu luangkan waktu untuk berolahraga, makan makanan yang sehat agar berkarya dalam kehidupan ini semakin prima.<br>


            6. Meditasi<br>
            Luangkan waktu untuk diri sendiri dengan cara meditasi. 10-15 menit dalam sehari adalah waktu ideal, terutama sebelum tidur.<br>


            7. Senyum<br>
            Meskipun terdengar sepele, tapi senyuman selalu dapat mengubah dunia menjadi lebih positif.<br>


            8. Menyapa Seseorang<br>
            Menyapa banyak orang dengan sapaan standar seperti ‘Selamat Pagi’ akan meningkatkan kepercayaan diri sekaligus meningkatkan aspek sosial. Keluarlah dari zona nyaman yang selalu berdiam diri dan menunggu disapa orang lain terlebih dahulu karena gengsi.<br>


            9. Bersenang – senang<br>
            Carilah hobi positif yang bisa membuat kamu bahagia, yang membuat kamu melupakan segala kepenatan. Jangan malu untuk tertawa lepas.<br>


            10. Istirahat yang cukup<br>
            Untuk mewujudkan kesehatan mental yang optimal, dibutuhkan istirahat yang cukup setelah melakukan aktifitas di siang hari.',
            'image' => 'artikel3.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => '7 Cara yang Bisa Dilakukan untuk Menjaga Kesehatan Mental',
            'content' => '<p>Tidak hanya kesehatan fisik, kesehatan mental juga perlu dijaga. Menjaga kesehatan mental dapat dilakukan dengan beragam cara. Bila mentalmu sehat, kamu bisa menjalani aktivitas sehari-hari dengan baik, menjalin hubungan yang sehat dengan orang lain, serta lebih produktif dalam belajar atau bekerja.</p><br>

            <p>Menurut Badan Kesehatan Dunia (WHO), seseorang bisa disebut sehat secara mental, apabila ia mampu menyadari kemampuannya, menangani stres dalam kehidupan sehari-harinya, bekerja dengan produktif, serta berkontribusi untuk lingkungan sekitarnya.</p><br>
            Di bawah ini adalah panduan umum yang bisa kamu ikuti untuk menjaga kesehatan mental:<br><br>

            1. Hargai diri sendiri<br>
            Untuk menjaga kesehatan mental, kamu bisa mulai dengan menghargai dirimu sendiri terlebih dahulu. Mulai sekarang, biasakanlah untuk memperlakukan dan melihat diri sendiri dengan positif.<br>

            Lakukan hal-hal yang bisa membuatmu bahagia, misalnya dengan meluangkan waktu untuk hobi dan me time. Bersyukur atas hal-hal baik yang terjadi dalam hidupmu juga bisa membantumu untuk menghargai diri sendiri. Sebaliknya, hindari terlalu banyak menyalahkan diri sendiri dan membandingkan dirimu dengan orang lain, ya.<br>

            2. Kelola stres dengan baik<br>
            Suka atau tidak, stres adalah bagian dari kehidupan kita sehari-hari, sehingga hal ini hampir tidak mungkin untuk dihindari. Kendati demikian, kamu bisa belajar untuk mengelola stres dengan baik.<br>

            Cara yang bisa kamu lakukan untuk mengelola stres antara lain dengan berjalan santai di luar ruangan, menonton film, mendengarkan lagu, dan menulis kejadian sehari-hari di buku harian.<br>

            Cara-cara tersebut bisa membuat pikiranmu lebih tenang dan kamu bisa melihat hidup dengan lebih positif. Dengan begitu, stres yang kamu alami juga bisa mereda.<br>

            3. Akui perasaan dan emosi negatif<br>
            Merasakan berbagai emosi negatif, seperti sedih, kecewa, dan marah, adalah hal yang normal. Nah, untuk bisa melewatinya, kamu perlu untuk mengenali dan mengakui perasaan tersebut.<br>

            Jika kamu sudah mampu mengenal dan mengakui emosi negatif yang sedang kamu alami, kamu perlu meredakannya dengan cara yang positif, misalnya dengan bermeditasi. Dengan begitu, emosi dan perasaan negatif tersebut tidak akan berlarut-larut dan membawa dampak buruk bagi kesehatanmu.<br>

            4. Tetapkan tujuan yang realistis<br>
            Menetapkan tujuan dan target dapat membuat hidupmu lebih terarah. Hal ini pada akhirnya juga dapat membantu menjaga kesehatan mental.<br>

            Cobalah untuk menuliskan target dan tujuanmu, baik tujuan sehari-hari maupun tujuan jangka panjang. Namun, ingat. Tulis secara realistis serta sesuaikan dengan waktu dan beban tugas yang kamu miliki, ya.<br>

            5. Sayangi tubuh sendiri<br>
            Kesehatan mental juga sangat bergantung pada caramu merawat dan menyayangi diri sendiri. Pastikan kamu cukup tidur dan mengonsumsi beragam makanan bergizi seimbang, seperti nasi, sayuran, buah-buahan, kacang-kacangan, biji-bijian, ikan, dan daging tanpa lemak.<br>

            Selain itu, jangan lupa untuk rutin berolahraga. Hindari juga kebiasaan yang buruk, misalnya merokok, mengonsumsi minuman keras, atau menggunakan obat-obatan terlarang.<br>

            6. Pelihara hubungan yang baik dengan orang lain<br>
            Orang dengan hubungan sosial yang baik terbukti lebih mampu mengatasi stres dan memelihara kesehatan fisik maupun mentalnya. Inilah alasannya mengapa kamu perlu meluangkan waktu bersama dengan orang-orang terdekat, seperti keluarga dan sahabat.<br>

            Selain memelihara hubungan dengan orang-orang terdekat, kamu juga bisa coba mengikuti berbagai kegiatan baru, agar kamu memiliki kempatan untuk bertemu orang-orang baru.<br>

            7. Bantu orang lain<br>
            Membantu orang lain tidak hanya bermanfaat bagi orang yang kamu bantu, lho, tetapi juga membawa manfaat bagi diri sendiri.<br>

            Melakukan kegiatan sukarela atau beramal misalnya, dapat membuatmu merasa lebih baik dan lebih berguna dalam hidup. Selain itu, membantu orang lain juga bisa menghindarkan kamu dari rasa kesepian. Semua hal ini pada akhirnya dapat membantu menjaga kesehatan mental.<br><br>

            <p>Mulailah terapkan beragam cara menjaga kesehatan mental di atas ke dalam kehidupanmu sehari-hari. Namun, jika kamu merasa kesulitan melakukan hal-hal tersebut atau telah mengalami berbagai gejala gangguan mental yang sulit untuk kamu hadapi sendiri, jangan malu untuk berkonsultasi dengan psikolog atau psikiater, ya.</p><br>

            Dengan begitu, kamu bisa mendapat penanganan yang sesuai dengan kondisi kesehatan mentalmu.',
            'image' => 'artikel4.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Curhat Bisa Membantu Menjaga Kesehatan Mental, Ini Alasannya',
            'content' => '<p>Saat mengalami masalah atau sedang merasa tertekan, sangat normal jika seseorang mulai menarik diri dan menjadi lebih diam dari biasanya. Umumnya, orang yang mengalami masalah merasa sulit saat harus menyampaikan apa yang dirasakan dan merasa bisa menyelesaikan masalah sendiri. Namun, hal ini ternyata malah bisa membuat keadaan menjadi semakin buruk, terutama terkait kesehatan mental.</p><br>

            <p>Beberapa manfaat yang bisa didapat dari curhat dengan teman adalah memberi rasa tenang, tidak merasa sendirian, merasa mendapat dukungan dari orang sekitar, mencegah membuat kondisi menjadi lebih buruk, menemukan bantuan dan perawatan yang tepat untuk mengatasi masalah tanpa mengganggu kesehatan mental, serta menemukan solusi dari orang sekitar yang mungkin pernah mengalami hal serupa.</p><br>

            <p>Hal pertama yang bisa dilakukan agar lebih nyaman bercerita adalah menemukan teman atau anggota keluarga yang memang bisa dipercaya. Teman yang baik biasanya akan selalu bersikap jujur, memberi dukungan saat dibutuhkan, mau mendengarkan cerita, serta bisa dipercaya. Kamu mungkin sudah memilikinya, coba ingat lagi saat terakhir mengalami masalah. Siapa yang ada untuk mendengarkan?</p><br>

            <p>Memiliki seorang teman yang baik nyatanya tidak hanya bermanfaat saat butuh tempat curhat, tapi juga bisa membantu menjaga kesehatan mental. Seorang teman yang baik bisa menemani saat merayakan kebahagiaan dan tetap ada untuk mendukung saat menghadapi masalah dan kondisi yang buruk. Selain bisa menghindari rasa kesepian, seorang teman yang baik juga bisa:</p><br><br>

            - Memberi makna dan membuat kamu mengerti arti kehadiran dan tujuan menjalani hidup, hal ini baik sebagai pengingat di saat menghadapi masalah.<br>
            - Meningkatkan mood, membuat bahagia, dan menurunkan risiko stres atau tertekan.<br>
            - Meningkatkan rasa percaya diri dan menghargai diri sendiri.<br>
            - Membantu menghadapi dan mengatasi trauma, gangguan mental serius, serta pengalaman buruk lainnya yang sedang atau pernah dialami.<br>
            - Mendukung perubahan gaya hidup menjadi lebih sehat, terutama gaya hidup yang bisa meningkatkan risiko terjadinya gangguan kesehatan mental.<br><br>

            <p>Jika masih ragu dan merasa takut untuk curhat secara langsung, kamu bisa menyiapkan beberapa hal sebelum melakukannya. Selain berbicara langsung, kamu tetap bisa mencurahkan isi hati melalui telepon, mengirim pesan singkat atau chat, hingga menulis surat. Pilihlah cara yang paling membuat nyaman dan tidak membuat perasaan semakin tertekan.</p><br>

            <p>Selain itu, pastikan untuk mencari waktu yang tepat untuk bercerita pada teman. Dengan begitu, kamu tidak merasa mengganggu dan bisa mendapat perhatian penuh dari teman. Sama-sama merasa nyaman. Sebagai persiapan, kamu juga bisa melatih apa saja yang ingin diceritakan. Tapi perlu diingat, tidak masalah jika kamu hanya sanggup menceritakan beberapa bagian saja. Jangan memaksakan diri.</p>',
            'image' => 'artikel5.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Manfaat Curhat bagi Kesehatan Mental, Tak Hanya Meringankan Beban Pikiran',
            'content' => '<p>Curhat atau curahan hati adalah bercerita tentang masalah maupun segala sesuatu kepada orang terdekat yang dipercaya. Tak bisa dimungkiri, setiap orang tentu memiliki masalah masing-masing.</p><br>

            <p>Saat sedang menghadapi sebuah masalah, sebagian orang biasa memilih untuk bercerita. Ada yang terbiasa bercerita tentang masalahnya kepada orang terdekat, tetapi ada pula yang memilih untuk memendamnya.
            Dengan curhat, perasasaan akan menjadi lega dan beban pikiran menjadi berkurang. Perasaan lega tersebut yang bisa memberikan efek kesehatan untuk tubuh.</p><br>

            <p>Meski curhat mungkin tampak sepele, ternyata itu penting untuk kesehatan fisik dan mental. Baik itu membicarakan masalah pribadi atau sesuatu yang umum. Maka itu, jangan menahan beban yang dirasakan sendirian karena dapat menyebabkan berbagai masalah kesehatan. Justru dengan curhat bisa mendatangkan manfaat bagi kesehatan.</p><br>

            Manfaat Curhat bagi Kesehatan Mental<br><br>
            1. Meringankan Beban Pikiran<br>

            Tak bisa dimungkiri, berbicara dengan orang lain dapat membantu mengurangi beban dan stres. Apalagi manusia merupakan makhluk sosial.<br>

            Itulah mengapa, berbicara dengan seseorang tentang apa pun, termasuk masalah yang sedang menyita pikiran, dapat membantu memenuhi kebutuhan dasar sebagai makhluk sosial.<br>

            2. Mencegah Stres<br>

            Masalah yang dibagi dengan orang lain dengan cara curhat dapat menghindarkan Anda dari stres. Masalah yang berlarut cenderung menguras pikiran dan membuat hidup terasa seolah-olah terfokus hanya pada masalah tersebut.<br>

            Hal ini dapat berujung pada stres ringan bahkan berat. Curhat dapat mencegah keadaan ini sebelum terjadi.<br>

            3. Dukungan Emosional<br>

            Curhat kepada orang yang tepat dan dipercaya dapat membuat Anda merasa benar-benar didengarkan. Hal ini bermanfaat untuk membantu memvalidasi perasaan sehingga Anda tidak merasa terisolasi sendirian.<br>

            4. Membangun Mekanisme Bertahan yang Baik dari Stres<br>

            Mekanisme masing-masing orang dalam menghadapi masalah tentu berbeda-beda. Ada yang melarikan diri ke makanan, menyakiti diri sendiri, dan lain-lain.<br>

            Curhat dapat menjadi satu di antara mekanisme penyesuaian diri yang sehat dalam menghadapi masalah.<br>

            Menurut penelitian, dukungan sosial dapat menolong seseorang untuk membentuk ketahanan terhadap stres dan berguna untuk menciptakan perubahan dalam hidup.<br>

            5. Mendapat Solusi<br>

            Saat terjebak dalam suatu masalah, kerap kali sudut pandang Anda menjadi sempit sehingga merasa buntu dan tidak ada jalan keluar.<br>

            Curhat dengan orang lain dapat memberikan perspektif baru sehingga bisa memberi ide atau solusi yang mungkin belum terpikir sebelumnya.<br>

            6. Siap Bangkit Kembali<br>

            Setelah merasa lega dengan curhat ke orang terdekat, Anda bisa move on dan kembali produktif.<br>

            Nantinya, Anda dapat kembali mendiskusikan masalah dengan orang yang sebelumnya mendengarkan curhat sebagai bahan introspeksi diri tanpa harus tenggelam dalam masa lalu.<br>

            <p>Bila ingin bantuan yang lebih profesional dan bersifat netral, berkonsultasi kepada psikolog atau psikiater dapat menjadi pilihan bijak. Namun, kalau merasa curhat dengan teman dekat atau keluarga sudah cukup, tidak masalah. Dukungan dari orang terdekat dan tepercaya akan membuat Anda lebih kuat menghadapi tantangan hidup.</p>',
            'image' => 'artikel6.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Gangguan Kesehatan Mental yang Berbahaya Jika Tidak Diatasi',
            'content' => '<p>Terdapat berbagai gangguan kesehatan mental yang bisa berbahaya bila dibiarkan tanpa penanganan. Gangguan kesehatan mental ini tidak hanya menyerang psikis saja, tapi bisa menyebabkan sederet masalah fisik. Nah, berikut ini gangguan kesehatan mental dan dampaknya bagi kesehatan bila dibiarkan berlarut-larut.</p><br>

            1. Dampak Skizofrenia yang Berbahaya<br>

            <p>Sudah tak asing dengan skizofrenia? Skizofrenia masuk ke dalam gangguan jiwa kelompok psikosis yang bisa mengacaukan pikiran dan kesadaran pengidapnya. Skizofrenia merupakan gangguan mental yang terjadi dalam jangka panjang.</p><br>

            <p>Skizofrenia membuat pengidapnya mengalami delusi, halusinasi, kekacauan dalam berpikir, mengasingkan diri dari orang lain, hingga mengalami perubahan perilaku. Gangguan kesehatan mental yang satu ini bisa berbahaya bila tak diatasi. Komplikasi skizofrenia bisa memicu perilaku agresif, depresi percobaan bunuh diri, isolasi sosial, hingga penyalahgunaan alkohol atau obat-obatan.</p><br>

            <p>Mau tahu apa dampak skizofrenia yang sangat mengkhawatirkan? Menurut Organisasi Kesehatan Dunia (WHO) pengidap skizofrenia ini berisiko 2-3 kali tinggi mengalami kematian lebih awal ketimbang mereka yang tidak mengidapnya. Tuh, seram kan?</p><br>

            <p>Oleh sebab itu, jangan sekali-kali memandang sebelah mata skizofrenia. Di samping itu, belum ada obat untuk menyembuhkan skizofrenia secara total. Namun, ada terapi berupa perawatan psikososial atau rehabilitasi yang efektif agar pengidap skizofrenia memiliki kehidupan yang produktif, sukses, dan mandiri.</p><br><br>

            2. Depresi Dapat Berujung Kematian<br>

            <p>Depresi adalah salah satu gangguan kesehatan mental yang tak boleh dianggap remeh. Depresi menjadi gangguan suasana hati yang ditandai dengan perasaan sedih yang mendalam, putus harapan, atau tidak berharga. Seseorang bisa dikatakan depresi ketika sudah dua minggu mengalami perasaan tersebut.</p><br>

            <p>Apa jadinya bila depresi dibiarkan tanpa penanganan? Awas, komplikasi depresi tidak main-main. Masalah mental yang satu ini bisa menyebabkan masalah emosional, perilaku, dan kesehatan yang memengaruhi setiap aspek kehidupan.</p><br><br>

            3. Stres Menimbulkan Berbagai Masalah Fisik<br>

            <p>Hampir setiap orang mungkin pernah mengalami stres dalam hidupnya. Pemicu dari masalah mental ini beragam, mulai dari patah hati, masalah keluarga, masalah pekerjaan, masalah keuangan, hingga bertengkar dengan pasangan.</p><br>

            <p>Dalam ledakan singkat stres bisa berdampak positif, seperti membantu untuk menghindari bahaya atau memenuhi tenggat waktu pekerjaan. Namun, lain lagi ceritanya bila stres berlangsung lama. Kondisi ini yang membahayakan kesehatan.</p><br><br>

            4.PTSD Memicu Gangguan Kesehatan Mental Lain<br>

            <p>Post traumatic stress disorder (PTSD) adalah kondisi kejiwaan yang dipicu oleh kejadian tragis yang pernah dialami atau disaksikan seseorang. Contohnya peristiwa traumatis pada bencana alam, kecelakaan lalu lintas, tindak kejahatan, korban kekerasan atau pelecehan seksual, hingga pengalaman di medan perang.</p><br>

            <p>PTSD membuat pengidapnya tak bisa melupakan pengalaman traumatis. Dalam kebanyakan kasus, PTSD lebih sering memengaruhi wanita ketimbang pria. Alasannya wanita lebih sensitif terhadap perubahan daripada pria.</p><br><br>

            <p>Hal yang perlu digarisbawahi, masih banyak gangguan mental lainnya yang dapat membahayakan psikis dan fisik, bila tak ditangani dengan tepat. Oleh sebab itu, seseorang yang mengalami gangguan mental perlu mendapatkan pertolongan profesional untuk mengatasi masalah yang dihadapinya.</p>',
            'image' => 'artikel7.jpg',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Bahaya Diagnosis Diri Terhadap Kesehatan Mental',
            'content' => '<p>Menurut World Health Organization (WHO), seseorang dapat dikatakan sehat mental apabila memiliki kemampuan untuk memanfaatkan potensi yang dimiliki, menghadapi permasalahan sehari-hari dan bekerja secara produktif. Selain itu, memberikan kontribusi yang baik terhadap masyarakat juga menjadi kriteria yang harus dipenuhi.</p><br>

            <p>Bagi saya sendiri, kesehatan mental ibarat garis horizontal. Semakin ke kiri, semakin bernilai negatif. Semakin banyak banyak tekanan, semakin berpotensi pula mengalami gangguan mental. Maka dari itu, tidak ada pembagian saklek untuk mengatakan seseorang sehat atau terganggu mentalnya.</p><br><br>

            - Kecenderungan Melakukan Diagnosis Diri<br>

            <p>Self diagnosis atau yang saya sebut sebagai diagnosis diri merupakan upaya untuk mendiagnosis atau menentukan jenis penyakit berdasarkan informasi yang diperoleh secara mandiri. Informasi tersebut dapat berasal dari teman, keluarga, pengalaman sakit di masa lalu, ataupun dari internet.</p><br>

            <p>Rajnish Mago, salah satu psikolog di India mengatakan, informasi tersebut, khususnya yang berasal dari internet bukanlah patokan untuk menyimpulkan kondisi kesehatan mental seseorang. Informasi itu hanya digunakan untuk menambah pengetahuan. Selebihnya, kesimpulan akhir tidak dapat ditetapkan berdasarkan diagnosis diri, melainkan harus ditanyakan pada yang lebih ahli.</p><br>

            <p>Alasannya, diagnosis diri dapat menimbulkan kemungkinan terjadinya kesalahan dalam mengambil kesimpulan. Diagnosis diri juga dikhawatirkan mengabaikan gejala-gejala lain yang tidak terlihat. Dan parahnya, pelaku diagnosis diri akan melakukan pengobatan dengan cara yang salah. Tak jarang juga melabeli diri dengan kondisi mental yang kurang baik.</p><br>

            <p>Adapun seseorang yang melakukan diagnosis diri disebabkan karena beberapa hal, seperti tidak memiliki biaya, tidak adanya waktu luang, serta sulitnya mengakses pelayanan kesehatan. Selain itu, jumlah tenaga medis yang relatif kecil juga menjadi alasan sulitnya masyarakat mendapatkan penanganan psikiater dan psikolog secara langsung.</p><br>

            <p>Lebih lanjut, menurut data Ikatan Psikologi Klinis (IPK) Indonesia, jumlah psikolog klinis pada Mei 2019 sebanyak 1143 orang yang mayoritas tersebar di Pulau Jawa. Begitu juga dengan jumlah psikiater yang hanya sekitar 800 orang. Hal ini bertolak belakang dengan negara Paman Sam yang sudah mempunyai 25 ribu psikiater dan 170 ribu lebih psikolog klinis pada tahun 2017.</p><br><br>

            - Kiat Hindari Efek Negatif<br>

            <p>Menilik beberapa kondisi di atas, diagnosis diri tidak dapat dipungkiri akan terus dilakukan oleh masyarakat. Untuk itu, saya merangkum beberapa hal yang bisa dilakukan untuk mengurangi dampak negatifnya bagi kesehatan mental.</p><br>

            <p>Pertama, evaluasi setiap informasi yang didapat dari internet. Tidak semua informasi yang ada di internet bisa ditelan mentah-mentah, terutama hal-hal yang berhubungan dengan gangguan mental dan gejala-gejalanya. Oleh karena itu, langkah yang dapat dilakukan adalah mengakses situs-situs yang terpercaya dan disarankan oleh para tenaga medis profesional.</p><br>

            <p>Kedua, cobalah untuk mengeluarkan isi pikiran yang mengganggu kepada seseorang yang paham mengenai isu kesehatan mental. Selain itu, ikuti komunitas serta kegiatan seperti seminar yang bergerak di bidang tersebut. Karena semakin banyaknya informasi yang didapat, semakin luas pula wawasan mengenai kesehatan mental.</p><br>

            <p>Ketiga, konsultasi ke psikolog atau psikiater. Kiat ini merupakan opsi yang paling aman dalam mengatasi gangguan mental, terutama apabila seseorang sudah merasakan gejala-gejala yang mengganggu aktivitas sehari-hari dan orang tersebut memiliki akses untuk bertemu dengan tenaga medis profesional.</p><br>

            <p>Terakhir, berusahalah untuk mengontrol diri. Dengan kondisi Indonesia yang sangat minim psikiater dan psikolog, maka kontrol diri menjadi opsi yang dapat dilakukan sedini mungkin. Intinya, tidak hanya berusaha untuk mengobati saja ketika sudah mengalami gangguan mental, tetapi juga melakukan tindakan preventif selama kondisi kesehatan mental masih baik.</p>',
            'image' => 'artikel8.png',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => 'Jenis Penyakit Mental yang Berbahaya, Ketahui Cara Mengatasinya',
            'content' => '<p>Terdapat beberapa jenis penyakit mental yang berbahaya dan perlu diwaspadai. Dengan mengetahui beberapa penyakit mental yang berbahaya, bisa meningkatkan kesadaran Anda untuk melakukan perawatan yang baik ketika mengalami gangguan ini. Sehingga kondisi bisa lebih terkontrol dengan baik untuk mengurangi risiko yang semakin parah. Berikut beberapa jenis penyakit mental yang berbahaya perlu Anda ketahui :</p><br><br>

            - Skizofrenia<br>
            - Major Depression atau depresi berat<br>
            - Bipolar<br><br>
            Selain itu, beberapa Anda juga perlu mengenali berbagai kategori yang mengelompokkan beberapa jenis penyakit mental yang berbahaya tersebut, yaitu sebagai berikut :<br><br>

            - Gangguan mood : gangguan depresi, gangguan bipolar<br>
            - Gangguan kecemasan : gangguan stres pascatrauma (PTSD)<br>
            - Gangguan psikotik : skizofrenia, gangguan delusi, gangguan skizoafektifaff<br><br>

            1. Skizofrenia<br>
            <p>Setelah mengetahui beberapa jenis penyakit mental yang berbahaya secara umum, berikutnya kami akan memberikan penjelasan mengenai masing-masing gangguan dengan lebih rinci. Pertama bisa dimulai dari gangguan skizofrenia. Skizofrenia merupakan gangguan mental serius di mana penderitanya sering menafsirkan realitas secara tidak normal. Biasanya skizofrenia mengakibatkan beberapa kombinasi seperti halusinasi, delusi, dan pemikiran serta perilaku yang tidak teratur.</p><br>

            - Penyebab skizofrenia<br>

            <p>Tidak diketahui secara pasti hal apa yang menyebabkan gangguan skizofrenia pada seseorang. Namun peneliti percaya bahwa terdapat kombinasi genetika, kimia otak, dan lingkungan berkontribusi pada perkembangan gangguan tersebut. Selain itu, masalah dengan bahan kimia otak tertentu yang terjadi secara alami, termasuk neurotransmiter yang disebut dopamin dan glutamat, juga dapat menyebabkan skizofrenia.</p><br>

            - Gejala skizofrenia<br>

            Terdapat beberapa gejala skizofrenia yang sering muncul pada penderita, yaitu sebagai berikut :<br>

            - Delusi, yaitu keyakinan palsu yang didasarkan pada kenyataan.<br>
            - Halusinasi, biasanya melihat atau mendengar hal-hal yang tidak ada. Halusinasi dapat terjadi pada salah satu indra tetapi indra pendengaran merupakan jenis halusinasi yang paling umum.<br>
            - Pikiran tidak teratur, adanya pola pikir yang tidak teratur yang dapat dilihat dari munculnya ucapan yang tidak terorganisir dan tidak normal.<br>
            - Perilaku motorik yang tidak teratur, seperti anak kecil yang berperilaku seperti orang gelisah secara tiba-tiba dan tidak terduga.<br>
            - Kurangnya kemampuan untuk berfungsi secara normal, seperti mengabaikan kebersihan pribadi, kurang emosi atau monoton, kehilangan minat, dan lain sebagainya.<br><br>

            2. Major Depression<br>

            <p>Jenis penyakit mental yang berbahaya selanjutnya adalah major depression atau depresi berat. Depresi adalah gangguan suasana hati yang menyebabkan perasaan sedih dan kehilangan minat yang terus-menerus. Gangguan ini juga disebut dengan gangguan depresi mayor atau depresi klinis, yang mempengaruhi bagaimana Anda merasa, berpikir dan berperilaku serta dapat menyebabkan berbagai masalah emosional dan fisik. Penderita juga mungkin mengalami kesulitan melakukan aktivitas normal sehari-hari.</p><br><br>

            - Penyebab depresi berat<br>

            Tidak diketahui secara pasti apa yang menyebabkan depresi. Seperti banyak gangguan mental, berbagai faktor mungkin terlibat, seperti:<br><br>

            - Perubahan fisik pada otak yang bisa menyebabkan depresi.<br>
            - Reaksi kimia pada otak yang bisa menyebabkan depresi, seperti neurotransmitter.<br>
            - Perubahan keseimbangan hormon tubuh yang bisa memicu depresi.<br>
            - Faktor genetik atau riwayat keluarga yang memiliki gangguan depresi berat.<br>
            - Gejala depresi berat<br>

            Terdapat beberapa gejala depresi berat yang sering kali terjadi yaitu sebagai berikut :<br><br>
            - Perasaan sedih, air mata, kekosongan atau keputusasaan<br>
            - Ledakan kemarahan, lekas marah atau frustrasi, bahkan untuk hal-hal kecil<br>
            - Kehilangan minat atau kesenangan dalam sebagian besar atau semua aktivitas normal, seperti seks, hobi, atau olahraga<br>
            - Gangguan tidur, termasuk insomnia atau terlalu banyak tidur<br>
            - Kelelahan dan kekurangan energi, sehingga tugas-tugas kecil pun membutuhkan usaha ekstra<br>
            - Berkurangnya nafsu makan dan penurunan berat badan atau meningkatnya keinginan untuk makan dan penambahan berat badan<br>
            - Kecemasan, agitasi atau kegelisahan<br><br>

            3. Bipolar<br>
            <p>Jenis penyakit mental yang berbahaya berikutnya adalah bipolar. Gangguan bipolar, sebelumnya disebut manik depresi, adalah kondisi kesehatan mental yang menyebabkan perubahan suasana hati yang ekstrem yang mencakup emosi tinggi (mania atau hipomania) dan rendah (depresi).</p><br><br>

            - Penyebab bipolar<br>

            Seperti beberapa jenis gangguan lainnya, penyebab bipolar juga tidak ketahui secara pasti. Namun terdapat beberapa faktor yang berkontribusi, yaitu seperti :<br>

            - Perbedaan biologis fisik pada otak yang bisa memicu gangguan bipolar.<br>
            - Faktor genetik, atau riwayat keluarga yang mempunyai gangguan bipolar sehingga bisa menurunkan risiko.<br><br>
            - Gejala bipolar<br>

            Gejala bipolar ini berbeda-beda pada masing-masing jenisnya. Berikut beberapa karakteristik gejala bipolar yang dialami pada setiap jenisnya :<br>

            - Gangguan bipolar I : mengalami setidaknya satu episode manik yang mungkin didahului atau diikuti oleh episode hipomanik atau depresi mayor.<br>
            - Gangguan Bipolar II : mengalami setidaknya satu episode depresi berat dan setidaknya satu episode hipomanik, tetapi Anda belum pernah mengalami episode manik.<br>
            - Gangguan siklotimik : setidaknya dua tahun atau satu tahun pada anak-anak dan remaja, mengalami banyak periode gejala hipomania dan periode gejala depresi (meskipun kurang parah daripada depresi berat).<br>
            - Tipe yang lain : ini termasuk, gangguan bipolar dan gangguan terkait yang disebabkan oleh obat-obatan atau alkohol tertentu atau karena kondisi medis, seperti penyakit Cushing, multiple sclerosis atau stroke.<br><br>

            Cara Perawatan yang Efektif<br>

            <p>Setelah mengetahui beberapa jenis penyakit mental yang berbahaya dan penjelasan gejala serta penyebabnya, berikutnya terdapat beberapa langkah yang bisa dilakukan untuk perawatan yang efektif. Berikut cara perawatan yang bisa dilakukan oleh penderita penyakit mental yang berbahaya :</p><br><br>

            - Psikoterapi : mengeksplorasi pikiran, perasaan, dan perilaku, dan berusaha untuk meningkatkan kesejahteraan individu. Contohnya termasuk Terapi Perilaku Kognitif, Psikoterapi Interpersonal, dan Psikoedukasi Keluarga.
            Konsumsi obat : obat tidak menyembuhkan penyakit mental. Namun, ini dapat mengurangi frekuensi atau keparahan gejala, yang memungkinkan peningkatan kualitas hidup dan pemulihan.<br>
            - Pengobatan komplementer dan alternatif (CAM): mengacu pada pengobatan dan praktik yang biasanya tidak terkait dengan perawatan standar. CAM dapat digunakan sebagai pengganti atau sebagai tambahan dari praktik kesehatan standar. Contohnya termasuk yoga, meditasi, tai chi, latihan relaksasi, dan teknik pengobatan pikiran-tubuh lainnya.<br>
            - Terapi stimulasi otak : melibatkan stimulasi atau menyentuh otak secara langsung dengan listrik, magnet, atau implan. Pilihan ini sering dipertimbangkan ketika pengobatan dan terapi tidak dapat meredakan gejala kondisi kesehatan mental. Contohnya adalah terapi elektrokonvulsif (ECT) dan stimulasi magnetik transkranial (TMS).',
            'image' => 'artikel9.png',
        ]);

        Article::create([
            'psychologist_id' => Psychologist::all()->random()->id,
            'title' => '8 Manfaat Mengagumkan Olahraga untuk Kesehatan Mental',
            'content' => 'Manfaat Mengagumkan Olahraga untuk Kesehatan Mental<br><br>

            1. Memperbaiki Mood<br>

            <p>Olahraga bisa memperbaiki mood atau suasana hati Anda. Suatu penelitian menunjukkan, para partisipan merasa lebih tenang, senang, dan puas setelah berolahraga sehingga suasana hati menjadi lebih baik. Jadi, bila Anda merasa selalu memiliki suasana hati yang gampang naik-turun atau sedang memiliki mood yang buruk, olahraga dapat menjadi pilihan yang tepat untuk mengembalikan mood jadi lebih ceria.</p><br>

            2. Mengurangi Stres<br>

            <p>Dengan berolahraga, kadar stres dapat berkurang. Hal ini karena peningkatan detak jantung saat olahraga dapat mencegah kerusakan otak akibat stres dengan merangsang produksi hormon saraf (norepinefrin) dan menurunkan kadar hormon stres (kortisol). Selain itu, olahraga membuat sistem saraf pusat dan saraf simpatik tubuh dapat berkomunikasi satu sama lain. Jadi, kemampuan tubuh secara keseluruhan dalam mengatasi stres dapat meningkat.</p><br>

            3. Mengatasi Depresi dan Kecemasan<br>

            <p>Selain mengatasi stres, olahraga dapat mengurangi gejala depresi dan kecemasan karena aktivitas fisik dapat meningkatkan kadar endorfin, yaitu hormon bahagia yang diproduksi oleh otak dan sumsum tulang.

            Bahkan, para dokter pun menyarankan pasiennya untuk berolahraga rutin untuk mengatasi depresi atau kecemasan sebelum beralih ke penggunaan obat.</p><br>

            4. Meningkatkan Fungsi Otak<br>

            <p>Temuan lain menyebutkan, olahraga dapat meningkatkan zat kimia di otak, yaitu brain-derived neurotrophic factor (BDNF), yang dapat merangsang pembentukan sel otak baru.

            Baik olahraga yang bersifat aerobik maupun melatih kekuatan otot, keduanya dapat meningkatkan kadar BDNF. Hal tersebut dapat meningkatkan fungsi otak yang juga turut memengaruhi kesehatan mental.</p><br>

            5. Meningkatkan Rasa Percaya Diri<br>

            <p>Rasa percaya diri dinilai merupakan satu di antara kunci dari kesejahteraan mental. Oleh karena itu, dengan memiliki rasa percaya diri yang tinggi terhadap diri sendiri, kesehatan mental lebih terjamin.

            Apa kaitan olahraga dengan kepercayaan diri? Orang yang rutin berolahraga akan terbantu untuk menurunkan dan menstabilkan berat badan, serta mengencangkan otot tubuh.

            Pada akhirnya, penampilan akan menjadi lebih baik dan rasa percaya diri meningkat.</p><br>

            6. Mempertajam Memori<br>

            <p>Hormon endorfin yang dihasilkan tubuh saat Anda berolahraga membantu mempertajam pikiran, ingatan, dan meningkatkan konsentrasi. Pasalnya, olahraga merangsang pertumbuhan sel-sel yang baru di otak.</p><br>
            7. Meningkatkan Kualitas Tidur<br>

            <p>Olahraga ringan di pagi atau sore hari dapat membantu mengatur pola tidur Anda. Adanya aktivitas fisik dapat meningkatkan suhu tubuh. Hal ini dapat membuat pikiran menjadi lebih tenang sehingga lebih gampang tertidur.

            Jika Anda susah tidur di malam hari atau mengalami insomnia, cobalah untuk berolahraga rutin.

            Meski olahraga mampu meningkatkan kualitas tidur, para ahli tidak menyarankan olahraga menjelang waktu tidur karena dapat memperburuk kualitas tidur.</p><br>

            8. Memperlambat Terjadinya Penurunan Kognitif dan Demensia<br>

            <p>Seiring bertambahnya usia, meningkat pula risiko terjadinya demensia dan penurunan fungsi kognitif pada usia lanjut. Berbagai penelitian telah menunjukkan, aktivitas fisik dapat menurunkan risiko demensia dan penurunan kognitif.

            Jadi, untuk menghindari penurunan kognitif dan demensia di masa tua Anda nanti, mulai sekarang rajinlah berolahraga.</p>',
            'image' => 'artikel10.jpg',
        ]);
    }
}
