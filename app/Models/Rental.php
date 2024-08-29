<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'sector_id', 'tenant_id', 'item_id', 'merk_usaha', 'tgl_mulai', 'tgl_selesai', 'nominal', 'jenis_bayar', 'status_rental', 'keterangan'];

    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
