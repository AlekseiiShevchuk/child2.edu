<?php

namespace App\Http\Controllers\Admin;

use App\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreSlidesRequest;
use App\Http\Requests\UpdateSlidesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Controller;

class SlidesController extends Controller
{
    use FileUploadTrait;


    /**
     * Display a listing of Slide.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('slide_access')) {
            return abort(401);
        }
        $slides = Slide::all();

        return view('slides.index', compact('slides'));
    }

    /**
     * Show the form for creating new Slide.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('slide_create')) {
            return abort(401);
        }
        $relations = [
            'lessons' => \App\Lesson::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        $enum_type = Slide::$enum_type;
            
        return view('slides.create', compact('enum_type') + $relations);
    }

    /**
     * Store a newly created Slide in storage.
     *
     * @param  \App\Http\Requests\StoreSlidesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSlidesRequest $request)
    {
        if (! Gate::allows('slide_create')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $slide = Slide::create($request->all());

        return redirect()->route('slides.index');
    }


    /**
     * Show the form for editing Slide.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('slide_edit')) {
            return abort(401);
        }
        $relations = [
            'lessons' => \App\Lesson::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];
        $enum_type = Slide::$enum_type;
            
        $slide = Slide::findOrFail($id);

        return view('slides.edit', compact('slide', 'enum_type') + $relations);
    }

    /**
     * Update Slide in storage.
     *
     * @param  \App\Http\Requests\UpdateSlidesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSlidesRequest $request, $id)
    {
        if (! Gate::allows('slide_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $slide = Slide::findOrFail($id);
        $slide->update($request->all());

        return redirect()->route('slides.index');
    }


    /**
     * Display Slide.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('slide_view')) {
            return abort(401);
        }
        $relations = [
            'lessons' => \App\Lesson::get()->pluck('title', 'id')->prepend('Please select', ''),
        ];

        $slide = Slide::findOrFail($id);

        return view('slides.show', compact('slide') + $relations);
    }


    /**
     * Remove Slide from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('slide_delete')) {
            return abort(401);
        }
        $slide = Slide::findOrFail($id);
        $slide->delete();

        return redirect()->route('slides.index');
    }

    /**
     * Delete all selected Slide at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('slide_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Slide::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
