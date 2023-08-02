<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $casts = [ // $casts es un array que contiene los atributos que queremos convertir a un tipo de dato específico
        'date' => 'datetime', // para que la columna date se convierta en un objeto Carbon
    ];

    protected $fillable = ['serie', 'correlative', 'base', 'igv', 'total', 'user_id', 'date'];    

    // Query Scopes
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['serie'] ?? false, fn($query, $serie) => $query->where('serie', $serie))
            ->when($filters['fromNumber'] ?? false, fn($query, $fromNumber) => $query->where('correlative', '>=', $fromNumber))
            ->when($filters['toNumber'] ?? false, fn($query, $toNumber) => $query->where('correlative', '<=', $toNumber))
            ->when($filters['fromDate'] ?? false, fn($query, $fromDate) => $query->where('date', '>=', $fromDate))
            ->when($filters['toDate'] ?? false, fn($query, $toDate) => $query->where('date', '<=', $toDate));
    }

    public function user()
    {
        return $this->belongsTo(User::class); // relación de uno a muchos inversa
    }
}
