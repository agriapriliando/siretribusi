<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasUuids;
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['nik', 'nama', 'alamat', 'nohp', 'file_ktp'];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('nik', 'like', $term)
                ->orWhere('nama', 'like', $term)
                ->orWhere('alamat', 'like', $term)
                ->orWhere('nohp', 'like', $term);
        });
    }

    public function scopeSearchNamaNik($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('nik', 'like', $term)
                ->orWhere('nama', 'like', $term);
        });
    }
}
