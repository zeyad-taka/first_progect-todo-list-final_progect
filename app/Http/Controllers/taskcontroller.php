<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // عرض كل التاسكات
    public function index() {
        return response()->json(Task::all());
    }

    // إضافة تاسك جديد من Form Data
    public function store(Request $request) {
        $task = Task::create([
            'title'       => $request->title,
            'description' => $request->description, // سحب الوصف من Postman
            'status'      => $request->status ?? 'pending',
            'user_id'     => $request->user_id, // سحب الـ ID اللي باعتينه في الصورة
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Task Created Successfully',
            'task'    => $task
        ], 201);
    }

    // تعديل تاسك موجود
    public function update(Request $request, $id) {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['message' => 'Task Not Found'], 404);
        }

        $task->update([
            'title'       => $request->title ?? $task->title,
            'description' => $request->description ?? $task->description,
            'status'      => $request->status ?? $task->status,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Task Updated Successfully',
            'task'    => $task
        ]);
    }

    // حذف تاسك
    public function destroy($id) {
        $task = Task::find($id);
        if ($task) {
            $task->delete();
            return response()->json(['status' => true, 'message' => 'Deleted successfully']);
        }
        return response()->json(['status' => false, 'message' => 'Not found'], 404);
    }
}