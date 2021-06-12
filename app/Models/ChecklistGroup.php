<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChecklistGroup extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function checklists()
    {
        return $this->hasMany(Checklist::class);
    }

    public function user_tasks()
    {
        return $this->hasMany(Task::class)->where('user_id', auth()->id());
    }
}
