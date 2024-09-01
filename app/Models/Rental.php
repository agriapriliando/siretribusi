<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sector_id', 'tenant_id', 'item_id', 'merk_usaha', 'tgl_mulai', 'tgl_selesai', 'nominal', 'jenis_bayar', 'status_rental', 'keterangan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('merk_usaha', 'like', $term)
                ->orWhere('nominal', 'like', $term);
        })->orWhereHas('tenant', function ($query) use ($term) {
            $query->where('nama', 'like', $term);
        })->orWhereHas('item', function ($query) use ($term) {
            $query->where('nama', 'like', $term);
        })->orWhereHas('user', function ($query) use ($term) {
            $query->where('name', 'like', $term);
        })->orWhereHas('sector', function ($query) use ($term) {
            $query->where('nama', 'like', $term);
        });
    }
}
