<?php

namespace App\Http\Controllers\Api\V1;

use App\Answer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAnswersRequest;
use App\Http\Requests\UpdateAnswersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class AnswersController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Answer::all();
    }

    public function show($id)
    {
        return Answer::findOrFail($id);
    }

    public function update(UpdateAnswersRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $answer = Answer::findOrFail($id);
        $answer->update($request->all());

        return $answer;
    }

    public function store(StoreAnswersRequest $request)
    {
        $request = $this->saveFiles($request);
        $answer = Answer::create($request->all());

        return $answer;
    }

    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();
        return '';
    }
}
