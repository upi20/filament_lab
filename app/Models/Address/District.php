<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'regency_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_districts';
    public $incrementing = false;
    protected $keyType = 'string';

    public function regency()
    {
        return $this->belongsTo(Regencie::class, 'regency_id', 'id');
    }

    public function villages()
    {
        return $this->hasMany(Village::class, 'district_id', 'id');
    }
}
