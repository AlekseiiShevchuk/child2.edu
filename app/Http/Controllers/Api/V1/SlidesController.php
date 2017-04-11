<?php

namespace App\Http\Controllers\Api\V1;

use App\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSlidesRequest;
use App\Http\Requests\UpdateSlidesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;

class SlidesController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Slide::all();
    }

    public function show($id)
    {
        return Slide::findOrFail($id);
    }

    public function update(UpdateSlidesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $slide = Slide::findOrFail($id);
        $slide->update($request->all());

        return $slide;
    }

    public function store(StoreSlidesRequest $request)
    {
        $request = $this->saveFiles($request);
        $slide = Slide::create($request->all());

        return $slide;
    }

    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->delete();
        return '';
    }
}
