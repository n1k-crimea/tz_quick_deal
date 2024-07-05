<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\TaskStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'due_date'];

    public function getStatusAttribute($value): string
    {
        return array_search($value, TaskStatus::toArray(), true);
    }

    public function setStatusAttribute(string $label): void
    {
        $this->attributes['status'] = TaskStatus::fromLabel($label)->getValue();
    }
}
