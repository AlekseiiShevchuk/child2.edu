<?php

namespace App\Http\Controllers\Api\V1;

use App\Reactiontoanswer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReactiontoanswersRequest;
use App\Http\Requests\UpdateReactiontoanswersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class ReactiontoanswersController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Reactiontoanswer::all();
    }

    public function show($id)
    {
        return Reactiontoanswer::findOrFail($id);
    }

    public function update(UpdateReactiontoanswersRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $reactiontoanswer = Reactiontoanswer::findOrFail($id);
        $reactiontoanswer->update($request->all());

        return $reactiontoanswer;
    }

    public function store(StoreReactiontoanswersRequest $request)
    {
        $request = $this->saveFiles($request);
        $reactiontoanswer = Reactiontoanswer::create($request->all());

        return $reactiontoanswer;
    }

    public function destroy($id)
    {
        $reactiontoanswer = Reactiontoanswer::findOrFail($id);
        $reactiontoanswer->delete();
        return '';
    }
}
