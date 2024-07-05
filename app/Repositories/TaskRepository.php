<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Enums\TaskStatus;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryInterface
{
    public function all(array $filters = []): Collection
    {
        $query = Task::query();

        if (isset($filters['status'])) {
            $query->where('status', TaskStatus::fromLabel($filters['status'])->getValue());
        }

        if (isset($filters['due_date'])) {
            $query->whereDate('due_date', $filters['due_date']);
        }

        return $query->get();
    }

    public function find(int $id): ?Task
    {
        return Task::find($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(int $id, array $data): ?Task
    {
        $task = $this->find($id);

        $task?->update($data);

        return $task;
    }

    public function delete(int $id): bool
    {
        $task = $this->find($id);

        if ($task) {
            return $task->delete();
        }

        return false;
    }
}
