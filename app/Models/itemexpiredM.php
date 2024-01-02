<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class itemexpiredM extends Model
{
    use HasFactory;
    protected $table = "itemexpired";
    protected $primaryKey = "iditemexpired";
    protected $guarded = ["idketerangan"];

    public function item()
    {
        return $this->hasOne(itemM::class, "iditem", "iditem");
    }
}
