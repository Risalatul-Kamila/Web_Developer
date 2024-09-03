<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    // Nama tabel yang digunakan oleh model ini
    protected $table = 'merchants';

    // Atribut yang dapat diisi
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'kontak',
        'deskripsi',
        'password',
    ];

    // Menghindari pemakaian atribut timestamps
    public $timestamps = true;
}
?>

