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
        'email',
        'gender_id',
        'person_status_id',
        'img_src',
        'parent_info_id',
        'phone_number',
        'address',
        'description'
    ];

    public function getFullName()
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function parent()
    {
        return $this->belongsTo(ParentInfo::class, 'parent_info_id');
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class, 'gender_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    public function status()
    {
        return $this->belongsTo(PersonStatus::class, 'person_status_id');
    }

    public function getFatherName()
    {
        if ($this->parent && $this->parent->father) {
            return $this->parent->father->getFullName();
        }

        return '-';
    }

    public function getMotherName()
    {
        if ($this->parent && $this->parent->mother) {
            return $this->parent->mother->getFullName();
        }

        return '-';
    }

    public function getBirthday()
    {
        return date("Y-m-d", strtotime($this->birthday));
    }

    public function isGrandChildren()
    {
        if ($this->position && $this->position->name === 'root') {
            return true;
        }

        if ($this->parent && $this->parent->father && ($this->parent->father->position->name === 'child' || $this->parent->father->position->name === 'root')) {
            return true;
        }

        return false;
    }
}
