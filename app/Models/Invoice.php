<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['serie', 'correlative', 'base', 'igv', 'total', 'user_id'];

    // Query Scopes
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['serie'] ?? false, fn($query, $serie) => $query->where('serie', $serie))
            ->when($filters['fromNumber'] ?? false, fn($query, $fromNumber) => $query->where('correlative', '>=', $fromNumber))
            ->when($filters['toNumber'] ?? false, fn($query, $toNumber) => $query->where('correlative', '<=', $toNumber))
            ->when($filters['fromDate'] ?? false, fn($query, $fromDate) => $query->where('created_at', '>=', $fromDate))
            ->when($filters['toDate'] ?? false, fn($query, $toDate) => $query->where('created_at', '<=', $toDate));
    }

    public function user()
    {
        return $this->belongsTo(User::class); // relación de uno a muchos inversa
    }
}
