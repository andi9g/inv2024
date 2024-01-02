<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemhabisM extends Model
{
    use HasFactory;
    protected $table = "itemhabis";
    protected $primaryKey = "iditemhabis";
    protected $guarded = ["idketerangan"];

    public function item()
    {
        return $this->hasOne(itemM::class, "iditem", "iditem");
    }
}
