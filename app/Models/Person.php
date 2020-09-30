<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $primaryKey = 'people_id';

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'phone_number',
        'address',
        'description'
    ];

    public function fullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function parent()
    {
        return $this->belongsTo(ParentInfo::class, 'parent_info_id');
    }

    public function parentInfo()
    {
        $parent = $this->parent();

        return $parent;
    }
}
