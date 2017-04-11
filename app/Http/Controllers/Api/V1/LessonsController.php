<?php

namespace App\Http\Controllers\Api\V1;

use App\Lesson;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLessonsRequest;
use App\Http\Requests\UpdateLessonsRequest;

class LessonsController extends Controller
{
    public function index()
    {
        return Lesson::all();
    }

    public function show($id)
    {
        return Lesson::findOrFail($id);
    }

    public function update(UpdateLessonsRequest $request, $id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->update($request->all());

        return $lesson;
    }

    public function store(StoreLessonsRequest $request)
    {
        $lesson = Lesson::create($request->all());

        return $lesson;
    }

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->delete();
        return '';
    }
}
