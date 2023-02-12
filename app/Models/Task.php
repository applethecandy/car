<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function getTypeAttribute()
    {
        return $this->to_mileage ? 'to_mileage' : ($this->every_mileage ? 'every_mileage' :
            ($this->to_date ? 'to_date' : ($this->every_date ? 'every_date' : 'none')));
    }

    public function isOverdue() {
        return $this->offset < 0;
    }

    public function isToday() {
        return $this->offset == 0;
    }

    public function getOffsetAttribute() {
        $offset = 0;
        switch ($this->type) {
            case 'to_mileage':
                $offset = $this->to_mileage - $this->car->mileage;
                break;
            case 'every_mileage':
                $offset = $this->mileage - $this->car->mileage + $this->every_mileage;
                break;
            case 'to_date':
                $offset = $this->to_date - Carbon::now()->diffInDays($this->date);
                break;
            case 'every_date':
                $offset = $this->every_date - Carbon::now()->diffInDays($this->date);
                break;
        }
        return $offset;
    }
}