<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['mileage', 'name', 'user_id', 'image_path'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function costs()
    {
        return $this->hasMany(Cost::class);
    }

    public function getClosestTasksAttribute() {
        return $this->tasks->where('sort_offset', '<', '500')->where('sort_offset', '>=', '0');
    }

    public function getOverdueTasksAttribute() {
        return $this->tasks->where('sort_offset', '<', '0');
    }
}
