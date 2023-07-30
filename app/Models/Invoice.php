<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['serie', 'correlative', 'base', 'igv', 'total', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class); // relación de uno a muchos inversa
    }
}
