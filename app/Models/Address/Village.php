<?php

namespace App\Models\Address;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'district_id',
        'name'
    ];
    protected $primaryKey = 'id';
    protected $table = 'address_villages';
    public $incrementing = false;
    protected $keyType = 'string';

    public function distict()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }
}
