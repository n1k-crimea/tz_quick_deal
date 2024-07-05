<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskCollection;
use App\Http\Resources\TaskResource;
use App\Repositories\TaskRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $filters = $request->only(['status', 'due_date']);
        $tasks = $this->taskRepository->all($filters);

        return response()->json(new TaskCollection($tasks));
    }

    public function show(int $id): JsonResponse
    {
        $task = $this->taskRepository->find($id);

        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json(new TaskResource($task));
    }

    public function store(TaskRequest $request): JsonResponse
    {
        try {
            $task = $this->taskRepository->create($request->validated());

            return response()->json(new TaskResource($task), 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function update(TaskRequest $request, int $id): JsonResponse
    {
        try {
            $task = $this->taskRepository->update($id, $request->validated());

            if (!$task) {
                return response()->json(['message' => 'Task not found'], 404);
            }

            return response()->json(new TaskResource($task));
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->taskRepository->delete($id);

        if (!$deleted) {
            return response()->json(['message' => 'Task not found'], 404);
        }

        return response()->json(null, 204);
    }
}
