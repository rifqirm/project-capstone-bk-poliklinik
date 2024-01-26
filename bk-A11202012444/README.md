1. Git clone
2. Pada terminal lakukan 'composer update'
3. Nyalakan xampp (apache dan mysql)
4. Pada terminal lakukan 'php artisan key:generate'
5. Pada terminal lakukan 'php artisan db:seed role'
6. Jalankan dengan perintah 'php artisan serve' pada terminal

////////////////Contoh nambah bikin tabel database:

1. php artisan make:migration alat
2. Habis itu edit dibagian folder databse -> migrations

public function up()
{
Schema::create('alat', function (Blueprint $table) {
$table->id();
$table->string('nama');
$table->timestamps();
});
}

    public function down()
    {
    Schema::dropIfExists('alat');
    }

4. Habis itu ketik ini di terminal "php artisan migrate:fresh"
5. Lalu lanjutkan "php artisan make:model Alat"
6. Habis itu lanjut ke folder App -> Http -> Model terus ke file yang dibuat tadi
7. Edit file tersebut dan isi setelah line ke 10 (use HasFactory) bisa ambil dari file Obat.php
8. Habis itu buatlah routing nya dibagian folder routes file Web.php
9. Habis itu lanjut edit pada bagian folder app -> http -> Controller -> file AdminController
10. Habis itu bisa buat/copy dari function obat dan editlah nama value tersebut beserta routing nya itu.
11. habis itu buatlah bagian fe nya/tampilannya di folder resources -> views -> (tergantung role) disini contoh buatnya di role admin habis itu buatlah 3 file tersebut (bisa ambil contoh punya file obat terdapata 3 file dengan obat tersebut)
12. Habis itu editlah yang bernama obat menjadi alat serta sesuaikan routes nya tersebut dengan yang ad di models
13. Habis itu buatlah menu manual layout -> sidebar (nanti route nya ganti dengan nama tabel yang kita buat tadi) dan sesuaikan lah buatnya dengan role yang sudah kita buat tadi

14. Ubah/Nambah tadi butuh perubahan di beberapa file Models, Database -> Migration
15. php artisan migrate:fresh
16. php artisan make:model Alat
