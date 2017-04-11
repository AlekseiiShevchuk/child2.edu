@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.slides.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.slides.fields.type')</th>
                            <td>{{ $slide->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.title')</th>
                            <td>{{ $slide->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.description')</th>
                            <td>{{ $slide->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.description-audio-file-path')</th>
                            <td>@if($slide->description_audio_file_path)<a href="{{ asset('uploads/'.$slide->description_audio_file_path) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.media-content-description')</th>
                            <td>{{ $slide->media_content_description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.media-content-description-audio-file-path')</th>
                            <td>@if($slide->media_content_description_audio_file_path)<a href="{{ asset('uploads/'.$slide->media_content_description_audio_file_path) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.media-content-image-file-path')</th>
                            <td>@if($slide->media_content_image_file_path)<a href="{{ asset('uploads/' . $slide->media_content_image_file_path) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $slide->media_content_image_file_path) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.media-content-youtube-video')</th>
                            <td>{{ $slide->media_content_youtube_video }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.lesson')</th>
                            <td>{{ $slide->lesson->title or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.slides.fields.is-active')</th>
                            <td>{{ Form::checkbox("is_active", 1, $slide->is_active == 1, ["disabled"]) }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('slides.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop