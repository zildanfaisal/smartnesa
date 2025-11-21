<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentUsersSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            // email, name, angkatan, jurusan, univ, password
            ['email' => 'anissa.23190@mhs.unesa.ac.id','nama' => 'Annisa Marcharani Tiyo Hasim','angkatan' => '2023','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Annisa106'],
            ['email' => 'evamaulindia@gmail.com','nama' => 'Eva Maulinda','angkatan' => '2023','jurusan' => 'S1 manajemen','univ' => 'Universitas Islam Majapahit','password' => 'Eva719'],
            ['email' => 'atunfatkul@gmail.com','nama' => "Mukhamat Fatkul Ma'Arif",'angkatan' => '2023','jurusan' => 'S1 Manajemen','univ' => 'Universitas Islam Majapahit','password' => 'Mukhamat894'],
            ['email' => '24051214118@mhs.unesa.ac.id','nama' => 'Mutiah','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Mutiah145'],
            ['email' => 'evacsbin@gmail.com','nama' => 'Ni Kadek Eva Listiawati','angkatan' => '2024','jurusan' => 'S1 Ekonomi dan Akuntansi','univ' => 'Universitas Pendidikan Ganesha','password' => 'Ni807'],
            ['email' => '25040254113@mhs.unesa.ac.id','nama' => 'Aliffia Rahma','angkatan' => '2025','jurusan' => 'S1 PPKN','univ' => 'Universitas Negeri Surabaya','password' => 'Aliffia061'],
            ['email' => 'karina.127@mhs.unesa.ac.id','nama' => 'Karina Mujiono','angkatan' => '2023','jurusan' => 'S1 Pendidikan IPS','univ' => 'Universitas Negeri Surabaya','password' => 'Karina226'],
            ['email' => 'silmiiharis@gmail.com','nama' => 'Silmi Aqila Haris','angkatan' => '2023','jurusan' => 'S1 Manajemen','univ' => 'Universitas Udayana','password' => 'Silmi899'],
            ['email' => '25061334096@mhs.unesa.ac.id','nama' => 'Nabila Nur Laili','angkatan' => '2025','jurusan' => 'S1 Gizi','univ' => 'Universitas Negeri Surabaya','password' => 'Nabila551'],
            ['email' => '25081494101@mhs.unesa.ac.id','nama' => 'Rossi Hamdi Nikko Pratama','angkatan' => '2025','jurusan' => 'S1 Bisnis Digital','univ' => 'Universitas Negeri Surabaya','password' => 'Rossi083'],
            ['email' => 'nayla.23185@mhs.unesa.ac.id','nama' => 'Nayla Azzahra Ananda Nuki','angkatan' => '2023','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Nayla206'],
            ['email' => 'amilinmasfufah.23016@mhs.unesa.ac.id','nama' => 'Amilin Masfufah','angkatan' => '2023','jurusan' => 'S1 Sosiologi','univ' => 'Universitas Negeri Surabaya','password' => 'Amilin618'],
            ['email' => 'indah.23201@mhs.unesa.ac.id','nama' => 'Indah Putri Himalaya Naibaho','angkatan' => '2023','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Indah619'],
            ['email' => '25031554242@mhs.unesa.ac.id','nama' => 'Arrya Akbar Samudra Pasa','angkatan' => '2025','jurusan' => 'S1 Sains Data','univ' => 'Universitas Negeri Surabaya','password' => 'Arrya915'],
            ['email' => '24081494058@mhs.unesa.ac.id','nama' => 'Evelyn Cantika Parama Putri','angkatan' => '2024','jurusan' => 'S1 Bisnis Digital','univ' => 'Universitas Negeri Surabaya','password' => 'Evelyn604'],
            ['email' => '25051214118@mhs.unesa.ac.id','nama' => "Muhammad ‘Atho’Illah",'angkatan' => '2025','jurusan' => 'S1 sistem informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad222'],
            ['email' => '25050974142@mhs.unesa.ac.id','nama' => 'Mochammad Iqbal Permana','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Mochammad044'],
            ['email' => '25051204225@mhs.unesa.ac.id','nama' => 'Adinda Fatihadina Islamiah','angkatan' => '2025','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas negeri Surabaya','password' => 'Adinda848'],
            ['email' => '25051214044@mhs.unesa.ac.id','nama' => 'Yasmin Nur Fadilla','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Yasmin666'],
            ['email' => '25050974127@mhs.unesa.ac.id','nama' => 'Fishabella Agustin','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Fishabella587'],
            ['email' => '25030234125@mhs.unesa.ac.id','nama' => 'Anggun Rahma Setyowati','angkatan' => '2025','jurusan' => 'S1 KIMIA','univ' => 'Universitas Negeri Surabaya','password' => 'Anggun738'],
            ['email' => '25050754100@mhs.unesa.ac.id','nama' => 'Deo Putra Laviando','angkatan' => '2025','jurusan' => 'S1 Teknik Mesin','univ' => 'Universitas Negeri Surabaya','password' => 'Deo554'],
            ['email' => '25051214014@mhs.unesa.ac.id','nama' => 'Rifqy Zayyan Abdul Basith','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Rifqy870'],
            ['email' => '25050754225@mhs.unesa.ac.id','nama' => 'Afif Alfaizin Andriansya','angkatan' => '2025','jurusan' => 'S1 Teknik Mesin','univ' => 'Universitas Negeri Surabaya','password' => 'Afif889'],
            ['email' => '24081324032@mhs.unesa.ac.id','nama' => 'Alfia Putri Arum Artika','angkatan' => '2024','jurusan' => 'S1 Ekonomi','univ' => 'Universitas Negeri Surabaya','password' => 'Alfia168'],
            ['email' => 'fachry22132@mhs.unesa.ac.id','nama' => 'Fachry Maulana Abimanyu','angkatan' => '2022','jurusan' => 'S1 Teknik informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Fachry813'],
            ['email' => 'siti.23151@mhs.unesa.ac.id','nama' => 'Siti Nurcahyani','angkatan' => '2023','jurusan' => 'S1 Ekonomi','univ' => 'Universitas Negeri Surabaya','password' => 'Siti884'],
            ['email' => '25050754105@mhs.unesa.ac.id','nama' => 'Wildan Maulana Affrizal','angkatan' => '2025','jurusan' => 'S1 Teknik Mesin','univ' => 'Universitas Negeri Surabaya','password' => 'Wildan167'],
            ['email' => 'siti.23053@mhs.unesa.ac.id','nama' => 'Siti Rahmania Ikra Mullah','angkatan' => '2023','jurusan' => 'S1 PENDIDIKAN TEKNIK BANGUNAN','univ' => 'Universitas Negeri Surabaya','password' => 'Siti411'],
            ['email' => 'mirza.23254@mhs.unesa.ac.id','nama' => 'Mirza Gusti Nugroho','angkatan' => '2023','jurusan' => 'S1 Pendidikan Kepelatihan Olahraga','univ' => 'Universitas Negeri Surabaya','password' => 'Mirza932'],
            ['email' => '25091397134@mhs.unesa.ac.id','nama' => 'Bayu Hadi Nugraha','angkatan' => '2025','jurusan' => 'S1 Manajemen informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Bayu421'],
            ['email' => 'soniya.122190163@student.itera.ac.id','nama' => 'Soniya Tarigan','angkatan' => '2022','jurusan' => 'S1 Teknik Industri','univ' => 'Institut Teknologi Sumatera','password' => 'Soniya809'],
            ['email' => 'putri.122190166@student.itera.ac.id','nama' => 'Putri Ulan Daulay','angkatan' => '2022','jurusan' => 'S1 Teknik Industri','univ' => 'Institut Teknologi Sumatera','password' => 'Putri237'],
            ['email' => '25051214185@mhs.unesa.ac.id','nama' => 'Halwa Aqila Firzannah','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Halwa354'],
            ['email' => 'eka.23146@mhs.unesa.ac.id','nama' => 'Eka Ana Mutiyaningsih','angkatan' => '2023','jurusan' => 'S1 Ekonomi','univ' => 'Universitas Negeri Surabaya','password' => 'Eka908'],
            ['email' => '25051204092@mhs.unesa.ac.id','nama' => 'Rafly Oktavian Ramadhani','angkatan' => '2025','jurusan' => 'S1 Teknik informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Rafly820'],
            ['email' => '25050974073@mhs.unesa.ac.id','nama' => 'Nabila Fathma Fawwaz Nurrahmah','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Nabila381'],
            ['email' => '25051214062@mhs.unesa.ac.id','nama' => 'Eka Oktavia Putri Ramadhani','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Eka526'],
            ['email' => '25050974066@mhs.unesa.ac.id','nama' => 'Achmad Minanur Rohman','angkatan' => '2025','jurusan' => 'S1 Pendidikan teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Achmad579'],
            ['email' => '25051214055@mhs.unesa.ac.id','nama' => 'Danella Azarine Nakhuah Puteri Sande','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Danella578'],
            ['email' => 'muhammaddaffa.23244@mhs.unesa.ac.id','nama' => 'Muhammad Daffa Adnaputra','angkatan' => '2023','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad950'],
            ['email' => 'ahmad.23209@mhs.unesa.ac.id','nama' => 'Ahmad Fashich Azzuhri Ramadhani','angkatan' => '2023','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Ahmad947'],
            ['email' => '25051204208@mhs.unesa.ac.id','nama' => 'Enggie Sofia Lika','angkatan' => '2025','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Enggie366'],
            ['email' => '25050974032@mhs.unesa.ac.id','nama' => 'Farrel Bintang Prasaya','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Farrel542'],
            ['email' => '25111814034@mhs.uneca.ac.id','nama' => 'Muhammad Nur Ilham','angkatan' => '2025','jurusan' => 'S1 Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad382'],
            ['email' => '24051214106@mhs.unesa.ac.id','nama' => 'Lizam Sabit Mafaiz','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Lizam843'],
            ['email' => '24051214045@mhs.unesa.ac.id','nama' => 'Elly Nadia Nurvanita','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Elly932'],
            ['email' => 'abdul.23146@mhs.unesa.ac.id','nama' => 'Abdul Aziz Ismail','angkatan' => '2023','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Abdul312'],
            ['email' => 'sayyidatunkamilah20@gmail.com','nama' => 'Sayyidatun Kamilah','angkatan' => '2024','jurusan' => 'S1 Akuntansi','univ' => 'Universitas Pembangunan Nasional Veteran Jawa Timur','password' => 'Sayyidatun937'],
            ['email' => '24080554027@mhs.unesa.ac.id','nama' => 'Anis Natalisa Desi Putri','angkatan' => '2024','jurusan' => 'S1 Pendidikan Ekonomi','univ' => 'Universitas Negeri Surabaya','password' => 'Anis300'],
            ['email' => 'mahbubi.22098@mhs.unesa.ac.id','nama' => 'Mahbubi','angkatan' => '2022','jurusan' => 'S1 Pendidikan teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Mahbubi021'],
            ['email' => '24051214050@mhs.unesa.ac.id','nama' => 'Helmalia Arnanta Eka Putri','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Helmalia901'],
            ['email' => '24051214041@mhs.unesa.ac.id','nama' => 'Nailah Herda Zahrani','angkatan' => '2024','jurusan' => 'S1 Sistem informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Nailah487'],
            ['email' => '25111814044@mhs.unesa.ac.id','nama' => 'Yesica Candra Carlota','angkatan' => '2025','jurusan' => 'S1 Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Yesica247'],
            ['email' => '25111814036@mhs.unesa.ac.id','nama' => 'Tri Oktavia Ramadhani','angkatan' => '2025','jurusan' => 'S1 INFORMATIKA','univ' => 'Universitas Negeri Surabaya','password' => 'Tri906'],
            ['email' => '25111814043@mhs.unesa.ac.id','nama' => 'Purnama Riyan Suprapto','angkatan' => '2025','jurusan' => 'S1 Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Purnama176'],
            ['email' => 'nandaapriza.23315@mhs.unesa.ac.id','nama' => 'Nanda Apriza Sari','angkatan' => '2023','jurusan' => 'S1 Psikologi','univ' => 'Universitas Negeri Surabaya','password' => 'Nanda693'],
            ['email' => '24051214174@mhs.unesa.ac.id','nama' => 'Herdina Agnes Pitaloka','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Herdina355'],
            ['email' => '24051214161@mhs.unesa.ac.id','nama' => 'Dwika Wijaya Ardana','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Dwika023'],
            ['email' => '25051214144@mhs.unesa.ac.id','nama' => 'Ade Sopian','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Ade887'],
            ['email' => 'tsabitah.23231@mhs.unesa.ac.id','nama' => 'Tsabitah Fillah','angkatan' => '2023','jurusan' => 'S1 Pendidikan Bahasa Inggris','univ' => 'Universitas Negeri Surabaya','password' => 'Tsabitah178'],
            ['email' => 'rahmadia.23105@mhs.unesa.ac.id','nama' => 'Rahmadia Septika Wulandari','angkatan' => '2023','jurusan' => 'S1 PENDIDIKAN AKUNTANSI','univ' => 'Universitas Negeri Surabaya','password' => 'Rahmadia120'],
            ['email' => '25051204115@mhs.unesa.ac.id','nama' => 'Muhammad Afifudin Zain','angkatan' => '2025','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad249'],
            ['email' => '25051214027@mhs.unesa.ac.id','nama' => 'Febrio Kevin Yulianto','angkatan' => '2025','jurusan' => 'S1 Sistem informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Febrio875'],
            ['email' => 'elok.23291@mhs.unesa.ac.id','nama' => 'Elok Faiqoh','angkatan' => '2023','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Elok207'],
            ['email' => '25040274114@mhs.unesa.ac.id','nama' => 'Naimatur Ramadhani Rahma','angkatan' => '2025','jurusan' => 'S1 Pendidikan Geografi','univ' => 'Universitas Negeri Surabaya','password' => 'Naimatur860'],
            ['email' => '24030184098@mhs.unesa.ac.id','nama' => 'Rodearni Florencita','angkatan' => '2024','jurusan' => 'S1 Pendidikan Fisika','univ' => 'Universitas Negeri Surabaya','password' => 'Rodearni521'],
            ['email' => '25050974119@mhs.unesa.ac.id','nama' => 'Lita Yuesti','angkatan' => '2025','jurusan' => 'S1 Pendidikan teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Lita801'],
            ['email' => '25111814037@mhs.unesa.ac.id','nama' => 'Nila Nazatul Fafa','angkatan' => '2025','jurusan' => 'S1 Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Nila976'],
            ['email' => '25050974141@mhs.unesa.ac.id','nama' => 'Faiza Yasmine Butsaina','angkatan' => '2025','jurusan' => 'S1 PENDIDIKAN TEKNOLOGI INFORMASI','univ' => 'Universitas Negeri Surabaya','password' => 'Faiza324'],
            ['email' => "25050974120@mhs.unesa.ac.id",'nama' => "Muhammad 'Azizul Hakim",'angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad942'],
            ['email' => '24050974019@mhs.unesa.ac.id','nama' => 'Ria Agustina','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Ria148'],
            ['email' => '24050974021@mhs.unesa.ac.id','nama' => 'Ahmad Naufal Azzuhdi','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Ahmad188'],
            ['email' => '25050974122@mhs.unesa.ac.id','nama' => 'Bunga Aulia Putri Maharani','angkatan' => '2025','jurusan' => 'S1 Pend. Teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Bunga645'],
            ['email' => '24050974022@mhs.unesa.ac.id','nama' => 'Laksamana Ajey Wibawa Satario','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Laksamana153'],
            ['email' => '24050974006@mhs.unesa.ac.id','nama' => 'Melvina Zahra Salsabilla','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Melvina720'],
            ['email' => '24050974027@mhs.unesa.ac.id','nama' => 'Early Dwika Prayitno','angkatan' => '2024','jurusan' => 'S1 Pendidikan teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Early170'],
            ['email' => '24050974026@mhs.unesa.ac.id','nama' => 'Miftahun Nikmah','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Miftahun874'],
            ['email' => '25050974118@mhs.unesa.ac.id','nama' => 'Ivhan Afika Prila','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Ivhan200'],
            ['email' => '25050974144@mhs.unesa.ac.id','nama' => 'Muhammad Iqbal Alamsyah','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad976'],
            ['email' => '25050974116@mhs.unesa.ac.id','nama' => 'Muhammad Faiz Risqullah Ramadhan','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad324'],
            ['email' => '25050974112@mhs.unesa.ac.id','nama' => 'Agung Wahyu Niti Wijaya','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Agung942'],
            ['email' => 'afandaahmaddzaki@students.undip.ac.id','nama' => 'Afanda Ahmad Dzaki','angkatan' => '2023','jurusan' => 'S1 Bisnis Digital','univ' => 'Universitas Diponegoro','password' => 'Afanda148'],
            ['email' => '25050974126@mhs.unesa.ac.id','nama' => 'Intan Dwi Febrianti','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Intan188'],
            ['email' => '25050974147@mhs.unesa.ac.id','nama' => 'Septi Lailatul Fitria','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Septi645'],
            ['email' => '25050974128@mhs.unesa.ac.id','nama' => 'Wuryo Hisyam Taruna','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Wuryo153'],
            ['email' => '25081194164@mhs.unesa.ac.id','nama' => 'Ninda Safiyah','angkatan' => '2025','jurusan' => 'S1 Ilmu Ekonomi','univ' => 'Universitas Negeri Surabaya','password' => 'Ninda720'],
            ['email' => '24050974004@mhs.unesa.ac.id','nama' => 'Bagus Dwi Cahya Putra','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Bagus170'],
            ['email' => '25050634111@mhs.unesa.ac.id','nama' => 'Diva Juliasari','angkatan' => '2025','jurusan' => 'S1 pendidikan tata rias','univ' => 'Universitas Negeri Surabaya','password' => 'Diva874'],
            ['email' => 'muhammadmusthofa.23056@mhs.unesa.ac.id','nama' => 'Muhammad Musthofa Fahmi','angkatan' => '2023','jurusan' => 'S1 Teknik Mesin','univ' => 'Universitas Negeri Surabaya','password' => 'Muhammad200'],
            ['email' => '25050974131@mhs.unesa.ac.id','nama' => 'Rizki Suci Rahmawati','angkatan' => '2025','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Rizki976'],
            ['email' => '25051214174@mhs.unesa.ac.id','nama' => 'Fadilah Nur Ramadhani','angkatan' => '2025','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Fadilah324'],
            ['email' => '24050974028@mhs.unesa.ac.id','nama' => 'Octavia Rahmadani','angkatan' => '2024','jurusan' => 'S1 Pendidikan Teknologi Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Octavia942'],
            ['email' => '24050974016@mhs.unesa.ac.id','nama' => 'Imelda Laurensi','angkatan' => '2024','jurusan' => 'S1 Pendidikan teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Imelda148'],
            ['email' => '24030654085@mhs.unesa.ac.id','nama' => 'Keysha Salsabila Zahrani','angkatan' => '2024','jurusan' => 'S1 Pendidikan IPA','univ' => 'Universitas Negeri Surabaya','password' => 'Keysha188'],
            ['email' => '25111814042@mhs.unesa.ac.id','nama' => 'Andhika Annas Satria','angkatan' => '2025','jurusan' => 'S1 Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Andhika645'],
            ['email' => 'athanasio.23202@mhs.unesa.ac.id','nama' => 'Athanasio Richard','angkatan' => '2023','jurusan' => 'S1 Teknik Mesin','univ' => 'Universitas Negeri Surabaya','password' => 'Athanasio153'],
            ['email' => '25030224009@mhs.unesa.ac.id','nama' => "Indo' Tabang Bunga Lestari",'angkatan' => '2025','jurusan' => 'S1 Fisika','univ' => 'Universitas Negeri Surabaya','password' => 'Indo\'720'],
            ['email' => 'mayselda.23042@mhs.unesa.ac.id','nama' => 'Mayselda Fadhilatus Salma','angkatan' => '2023','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Mayselda170'],
            ['email' => '24051214053@mhs.unesa.ac.id','nama' => 'Cheivo De Najwa Hariyanto','angkatan' => '2024','jurusan' => 'S1 Sistem Informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Cheivo874'],
            ['email' => '24050974024@mhs.unesa.ac.id','nama' => 'Nazla Salsabila Aulia Bachri','angkatan' => '2024','jurusan' => 'S1 pendidikan teknologi informasi','univ' => 'Universitas Negeri Surabaya','password' => 'Nazla200'],
            ['email' => '25051204176@mhs.unesa.ac.id','nama' => 'Syafilla Fitri Faradilla','angkatan' => '2025','jurusan' => 'S1 Teknik Informatika','univ' => 'Universitas Negeri Surabaya','password' => 'Syafilla976'],
            ['email' => '25051204051@mhs.unesa.ac.id','nama' => 'Debora Angelika Purba','angkatan' => '2025','jurusan' => 'S1 Teknik informatika','univ' => 'Univeristas Negeri Surabaya','password' => 'Debora324'],
        ];

        foreach ($students as $s) {
            $email = trim($s['email']);
            $username = Str::slug(substr($s['nama'],0,20));
            User::firstOrCreate(
                ['email' => $email],
                [
                    'nama' => $s['nama'],
                    'username' => $username,
                    'univ' => $s['univ'],
                    'jurusan' => $s['jurusan'],
                    'angkatan' => $s['angkatan'],
                    'password' => Hash::make($s['password']),
                    'role' => 'user',
                ]
            );
        }
    }
}
