<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regencie extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'province_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_regencies';
    public $incrementing = false;
    protected $keyType = 'string';

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    public function districts()
    {
        return $this->hasMany(District::class, 'regency_id', 'id');
    }
}
