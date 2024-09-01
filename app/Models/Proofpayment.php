<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Proofpayment extends Model
{
    use HasFactory;

    protected $fillable = ['validator', 'tenant_id', 'ket_by_tenant', 'ket_by_admin', 'file_bukti', 'confirmed'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";
        $query->where(function ($query) use ($term) {
            $query->where('nama', 'like', $term)
                ->orWhere('nohp', 'like', $term)
                ->orWhere('kode', 'like', $term)
                ->orWhere('ket_by_tenant', 'like', $term);
        });
    }
}
