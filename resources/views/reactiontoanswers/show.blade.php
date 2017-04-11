@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reactiontoanswer.title')</h3>
    
    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.view')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.reactiontoanswer.fields.type')</th>
                            <td>{{ $reactiontoanswer->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactiontoanswer.fields.title')</th>
                            <td>{{ $reactiontoanswer->title }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactiontoanswer.fields.description')</th>
                            <td>{{ $reactiontoanswer->description }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactiontoanswer.fields.image-path')</th>
                            <td>@if($reactiontoanswer->image_path)<a href="{{ asset('uploads/' . $reactiontoanswer->image_path) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $reactiontoanswer->image_path) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactiontoanswer.fields.youtube-video')</th>
                            <td>{{ $reactiontoanswer->youtube_video }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.reactiontoanswer.fields.audio-path')</th>
                            <td>@if($reactiontoanswer->audio_path)<a href="{{ asset('uploads/'.$reactiontoanswer->audio_path) }}" target="_blank">Download file</a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('reactiontoanswers.index') }}" class="btn btn-default">@lang('quickadmin.back_to_list')</a>
        </div>
    </div>
@stop