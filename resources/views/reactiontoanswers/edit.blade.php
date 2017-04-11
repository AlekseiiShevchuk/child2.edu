@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.reactiontoanswer.title')</h3>
    
    {!! Form::model($reactiontoanswer, ['method' => 'PUT', 'route' => ['reactiontoanswers.update', $reactiontoanswer->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', 'Тип реакции (правильно/неправильно было отвечено)*', ['class' => 'control-label']) !!}
                    {!! Form::select('type', $enum_type, old('type'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title', 'Заголовок окна реакции на ответ*', ['class' => 'control-label']) !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('title'))
                        <p class="help-block">
                            {{ $errors->first('title') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description', 'Дополнительное текстовое содержание окна ответа', ['class' => 'control-label']) !!}
                    {!! Form::text('description', old('description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description'))
                        <p class="help-block">
                            {{ $errors->first('description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($reactiontoanswer->image_path)
                        <a href="{{ asset('uploads/'.$reactiontoanswer->image_path) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$reactiontoanswer->image_path) }}"></a>
                    @endif
                    {!! Form::label('image_path', 'Изображение для окна ответа', ['class' => 'control-label']) !!}
                    {!! Form::file('image_path', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_path_max_size', 8) !!}
                    {!! Form::hidden('image_path_max_width', 4000) !!}
                    {!! Form::hidden('image_path_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_path'))
                        <p class="help-block">
                            {{ $errors->first('image_path') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('youtube_video', 'Видео с YouTube', ['class' => 'control-label']) !!}
                    {!! Form::text('youtube_video', old('youtube_video'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('youtube_video'))
                        <p class="help-block">
                            {{ $errors->first('youtube_video') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('audio_path', 'Аудио файл для автоматического проигрывания в реакции на ответ', ['class' => 'control-label']) !!}
                    @if ($reactiontoanswer->audio_path)
                        <a href="{{ asset('uploads/'.$reactiontoanswer->audio_path) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('audio_path', ['class' => 'form-control']) !!}
                    {!! Form::hidden('audio_path_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('audio_path'))
                        <p class="help-block">
                            {{ $errors->first('audio_path') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

