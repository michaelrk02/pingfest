# P!NGFEST 2021 Website

## Prasyarat Pengembangan

1. XAMPP telah terinstall dan dijalankan
2. Selalu pantau aktivitas pada _GitHub_

## Cara Memasang Database pada MySQL

1. Buka _phpMyAdmin_ melalui XAMPP
2. Buat database baru (contoh: `pingfest_localhost`)
3. Klik pada database tersebut di panel kiri
4. Buka menu import
5. Pilih file SQL yang terdapat dalam folder `secret`
6. Uncheck pada "enable foreign key checks"
7. Klik tombol "Go"

## Cara Memasang Website pada Localhost

1. Download/clone repository ini, jadikan dalam satu folder (misal: _pingfest_), dan taruh dalam folder `htdocs` pada XAMPP
2. Copy **(jangan rename)** _config.php.template_ menjadi _config.php_ dan edit file tersebut
3. Dalam _config.php_, sesuaikan variabel `PF_URL`, `PF_DB_USER`, `PF_DB_PASS`, dan `PF_DB_NAME` dengan keadaan server kalian (`PF_URL` adalah URL website ini pada localhost (misal: _http://localhost/pingfest/_), `PF_DB_USER` adalah username untuk menyambungkan ke database (default: _root_), `PF_DB_PASS` adalah password untuk menyambungkan ke database (default: **kosong**), `PF_DB_NAME` adalah nama database yang baru saja dibuat tadi (dalam kasus di atas, _pingfest_localhost_)
4. Kunjungi URL nya sesuai dengan variabel `PF_URL` (misal: _http://localhost/pingfest/_)
5. Jika tidak ada error, maka sudah berhasil

## Referensi Pegangan

- Rancangan Website P!NGFEST : [lihat](https://docs.google.com/document/d/1BxKbHLX_YJN_rGFglfV9htlzLX-b8260m94InH-ZlAk/edit)
- HTML, PHP, SQL : [w3schools.com](https://w3schools.com/)
- Bootstrap : [Bootstrap 4 Documentation](https://getbootstrap.com/docs/4.6/getting-started/introduction/)
- CodeIgniter : [CodeIgniter 3 User Guide](https://codeigniter.com/userguide3/index.html)
- Git : [Git Manual](https://git-scm.com/book/en/v2)