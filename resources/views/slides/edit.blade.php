@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.slides.title')</h3>
    
    {!! Form::model($slide, ['method' => 'PUT', 'route' => ['slides.update', $slide->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', 'Тип Слайда (презентация или тест)', ['class' => 'control-label']) !!}
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
                    {!! Form::label('title', 'Название слайда*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('description', 'Текст описания слайда<br> (который будет читаться диктором, при наличии озвучки, автоматическое воспроизведение)*', ['class' => 'control-label']) !!}
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
                    {!! Form::label('description_audio_file_path', 'Аудио файл с озвучкой описания слайда', ['class' => 'control-label']) !!}
                    @if ($slide->description_audio_file_path)
                        <a href="{{ asset('uploads/'.$slide->description_audio_file_path) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('description_audio_file_path', ['class' => 'form-control']) !!}
                    {!! Form::hidden('description_audio_file_path_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('description_audio_file_path'))
                        <p class="help-block">
                            {{ $errors->first('description_audio_file_path') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('media_content_description', 'Описание блока с медиа контентом', ['class' => 'control-label']) !!}
                    {!! Form::text('media_content_description', old('media_content_description'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('media_content_description'))
                        <p class="help-block">
                            {{ $errors->first('media_content_description') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('media_content_description_audio_file_path', 'Аудио файл в блоке медиаконтента (без автоматического воспроизведения)', ['class' => 'control-label']) !!}
                    @if ($slide->media_content_description_audio_file_path)
                        <a href="{{ asset('uploads/'.$slide->media_content_description_audio_file_path) }}" target="_blank">Download file</a>
                    @endif
                    {!! Form::file('media_content_description_audio_file_path', ['class' => 'form-control']) !!}
                    {!! Form::hidden('media_content_description_audio_file_path_max_size', 8) !!}
                    <p class="help-block"></p>
                    @if($errors->has('media_content_description_audio_file_path'))
                        <p class="help-block">
                            {{ $errors->first('media_content_description_audio_file_path') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($slide->media_content_image_file_path)
                        <a href="{{ asset('uploads/'.$slide->media_content_image_file_path) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$slide->media_content_image_file_path) }}"></a>
                    @endif
                    {!! Form::label('media_content_image_file_path', 'Картинка, для блока медиаконтента', ['class' => 'control-label']) !!}
                    {!! Form::file('media_content_image_file_path', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('media_content_image_file_path_max_size', 8) !!}
                    {!! Form::hidden('media_content_image_file_path_max_width', 4000) !!}
                    {!! Form::hidden('media_content_image_file_path_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('media_content_image_file_path'))
                        <p class="help-block">
                            {{ $errors->first('media_content_image_file_path') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('media_content_youtube_video', 'Код для вставки youtube видео', ['class' => 'control-label']) !!}
                    {!! Form::text('media_content_youtube_video', old('media_content_youtube_video'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('media_content_youtube_video'))
                        <p class="help-block">
                            {{ $errors->first('media_content_youtube_video') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('lesson_id', 'Для какого урока слайд', ['class' => 'control-label']) !!}
                    {!! Form::select('lesson_id', $lessons, old('lesson_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('lesson_id'))
                        <p class="help-block">
                            {{ $errors->first('lesson_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_active', 'Отображать ли слайд на сайте?<br> (можно временно отключить отображение)*', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_active', 0) !!}
                    {!! Form::checkbox('is_active', 1, old('is_active')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_active'))
                        <p class="help-block">
                            {{ $errors->first('is_active') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

