<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = "pertanyaan";

    // protected $guarded = ["judul"]; arti'a tabel yg di isi adalah tabel judul
    //protected $fillable = ["judul", "isi"];

    // protected $guarded = ["judul"]; arti'a tabel selain judul bisa di isi
    protected $guarded = [];
}
