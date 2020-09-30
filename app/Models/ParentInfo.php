<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentInfo extends Model
{
    use HasFactory;

    protected $primaryKey = 'parent_info_id';

    protected $fillable = [
        'mother_id',
        'father_id',
        'parent_status_id',
        'wedding_date',
        'divorce_date',
        'description'
    ];

    public function children()
    {
        return $this->hasMany(Person::class);
    }
}
