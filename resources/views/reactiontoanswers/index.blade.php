@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reactiontoanswer.title')</h3>
    @can('reactiontoanswer_create')
    <p>
        <a href="{{ route('reactiontoanswers.create') }}" class="btn btn-success">@lang('quickadmin.add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.list')
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-striped {{ count($reactiontoanswers) > 0 ? 'datatable' : '' }} dt-select">
                <thead>
                    <tr>
                        @can('reactiontoanswer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.reactiontoanswer.fields.type')</th>
                        <th>@lang('quickadmin.reactiontoanswer.fields.title')</th>
                        <th>@lang('quickadmin.reactiontoanswer.fields.description')</th>
                        <th>@lang('quickadmin.reactiontoanswer.fields.image-path')</th>
                        <th>@lang('quickadmin.reactiontoanswer.fields.youtube-video')</th>
                        <th>@lang('quickadmin.reactiontoanswer.fields.audio-path')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($reactiontoanswers) > 0)
                        @foreach ($reactiontoanswers as $reactiontoanswer)
                            <tr data-entry-id="{{ $reactiontoanswer->id }}">
                                @can('reactiontoanswer_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $reactiontoanswer->type }}</td>
                                <td>{{ $reactiontoanswer->title }}</td>
                                <td>{{ $reactiontoanswer->description }}</td>
                                <td>@if($reactiontoanswer->image_path)<a href="{{ asset('uploads/' . $reactiontoanswer->image_path) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $reactiontoanswer->image_path) }}"/></a>@endif</td>
                                <td>{{ $reactiontoanswer->youtube_video }}</td>
                                <td>@if($reactiontoanswer->audio_path)<a href="{{ asset('uploads/'.$reactiontoanswer->audio_path) }}" target="_blank">Download file</a>@endif</td>
                                <td>
                                    @can('reactiontoanswer_view')
                                    <a href="{{ route('reactiontoanswers.show',[$reactiontoanswer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.view')</a>
                                    @endcan
                                    @can('reactiontoanswer_edit')
                                    <a href="{{ route('reactiontoanswers.edit',[$reactiontoanswer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.edit')</a>
                                    @endcan
                                    @can('reactiontoanswer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.are_you_sure")."');",
                                        'route' => ['reactiontoanswers.destroy', $reactiontoanswer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">@lang('quickadmin.no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        @can('reactiontoanswer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('reactiontoanswers.mass_destroy') }}';
        @endcan
    </script>
@endsection