<?php

namespace App\Http\Controllers\Admin;

use App\Reactiontoanswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreReactiontoanswersRequest;
use App\Http\Requests\UpdateReactiontoanswersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;

class ReactiontoanswersController extends Controller
{
    use FileUploadTrait;


    /**
     * Display a listing of Reactiontoanswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('reactiontoanswer_access')) {
            return abort(401);
        }
        $reactiontoanswers = Reactiontoanswer::all();

        return view('reactiontoanswers.index', compact('reactiontoanswers'));
    }

    /**
     * Show the form for creating new Reactiontoanswer.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('reactiontoanswer_create')) {
            return abort(401);
        }        $enum_type = Reactiontoanswer::$enum_type;
            
        return view('reactiontoanswers.create', compact('enum_type'));
    }

    /**
     * Store a newly created Reactiontoanswer in storage.
     *
     * @param  \App\Http\Requests\StoreReactiontoanswersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReactiontoanswersRequest $request)
    {
        if (! Gate::allows('reactiontoanswer_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $reactiontoanswer = Reactiontoanswer::create($request->all());

        return redirect()->route('reactiontoanswers.index');
    }


    /**
     * Show the form for editing Reactiontoanswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('reactiontoanswer_edit')) {
            return abort(401);
        }        $enum_type = Reactiontoanswer::$enum_type;
            
        $reactiontoanswer = Reactiontoanswer::findOrFail($id);

        return view('reactiontoanswers.edit', compact('reactiontoanswer', 'enum_type'));
    }

    /**
     * Update Reactiontoanswer in storage.
     *
     * @param  \App\Http\Requests\UpdateReactiontoanswersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReactiontoanswersRequest $request, $id)
    {
        if (! Gate::allows('reactiontoanswer_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $reactiontoanswer = Reactiontoanswer::findOrFail($id);
        $reactiontoanswer->update($request->all());

        return redirect()->route('reactiontoanswers.index');
    }


    /**
     * Display Reactiontoanswer.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('reactiontoanswer_view')) {
            return abort(401);
        }
        $reactiontoanswer = Reactiontoanswer::findOrFail($id);

        return view('reactiontoanswers.show', compact('reactiontoanswer'));
    }


    /**
     * Remove Reactiontoanswer from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('reactiontoanswer_delete')) {
            return abort(401);
        }
        $reactiontoanswer = Reactiontoanswer::findOrFail($id);
        $reactiontoanswer->delete();

        return redirect()->route('reactiontoanswers.index');
    }

    /**
     * Delete all selected Reactiontoanswer at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('reactiontoanswer_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Reactiontoanswer::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
