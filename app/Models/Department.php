<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Department extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'uuid',
        'name',
        'description',
    ];

    protected $casts = [
        'id' => 'integer',
    ];

    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class);
    }

    public function paychecks(): HasManyThrough
    {
        return $this->hasManyThrough(Paycheck::class, Employee::class);
    }
}
