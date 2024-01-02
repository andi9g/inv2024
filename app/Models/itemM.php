<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemM extends Model
{
    use HasFactory;
    protected $table = "item";
    protected $primaryKey = "iditem";
    protected $guarded = [];

    public function keterangan()
    {
        return $this->hasOne(keteranganM::class, "idketerangan", "idketerangan");
    }

    public function satuan()
    {
        return $this->hasOne(satuanM::class, "idsatuan", "idsatuan");
    }
}
