@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.slides.title')</h3>
    @can('slide_create')
    <p>
        <a href="{{ route('slides.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($slides) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('slide_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.slides.fields.type')</th>
                        <th>@lang('quickadmin.slides.fields.title')</th>
                        <th>@lang('quickadmin.slides.fields.description')</th>
                        <th>@lang('quickadmin.slides.fields.description-audio-file-path')</th>
                        <th>@lang('quickadmin.slides.fields.media-content-description')</th>
                        <th>@lang('quickadmin.slides.fields.media-content-description-audio-file-path')</th>
                        <th>@lang('quickadmin.slides.fields.media-content-image-file-path')</th>
                        <th>@lang('quickadmin.slides.fields.media-content-youtube-video')</th>
                        <th>@lang('quickadmin.slides.fields.lesson')</th>
                        <th>@lang('quickadmin.slides.fields.is-active')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($slides) > 0)
                        @foreach ($slides as $slide)
                            <tr data-entry-id="{{ $slide->id }}">
                                @can('slide_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $slide->type }}</td>
                                <td>{{ $slide->title }}</td>
                                <td>{{ $slide->description }}</td>
                                <td>@if($slide->description_audio_file_path)<a href="{{ asset('uploads/'.$slide->description_audio_file_path) }}" target="_blank">Download file</a>@endif</td>
                                <td>{{ $slide->media_content_description }}</td>
                                <td>@if($slide->media_content_description_audio_file_path)<a href="{{ asset('uploads/'.$slide->media_content_description_audio_file_path) }}" target="_blank">Download file</a>@endif</td>
                                <td>@if($slide->media_content_image_file_path)<a href="{{ asset('uploads/' . $slide->media_content_image_file_path) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $slide->media_content_image_file_path) }}"/></a>@endif</td>
                                <td>{{ $slide->media_content_youtube_video }}</td>
                                <td>{{ $slide->lesson->title or '' }}</td>
                                <td>{{ Form::checkbox("is_active", 1, $slide->is_active == 1, ["disabled"]) }}</td>
                                <td>
                                    @can('slide_view')
                                    <a href="{{ route('slides.show',[$slide->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('slide_edit')
                                    <a href="{{ route('slides.edit',[$slide->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('slide_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['slides.destroy', $slide->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="12">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('slide_delete')
            window.route_mass_crud_entries_destroy = '{{ route('slides.mass_destroy') }}';
        @endcan
    </script>
@endsection