@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.answers.title')</h3>
    
    {!! Form::model($answer, ['method' => 'PUT', 'route' => ['answers.update', $answer->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('text_answer', 'Текстовый ответ <br> (нужно оставить пустым, если это ответ-изображение)', ['class' => 'control-label']) !!}
                    {!! Form::text('text_answer', old('text_answer'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('text_answer'))
                        <p class="help-block">
                            {{ $errors->first('text_answer') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($answer->image_answer)
                        <a href="{{ asset('uploads/'.$answer->image_answer) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$answer->image_answer) }}"></a>
                    @endif
                    {!! Form::label('image_answer', 'Ответ-изображение <br> (нужно оставить пустым, если это текстовый ответ)', ['class' => 'control-label']) !!}
                    {!! Form::file('image_answer', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('image_answer_max_size', 8) !!}
                    {!! Form::hidden('image_answer_max_width', 4000) !!}
                    {!! Form::hidden('image_answer_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('image_answer'))
                        <p class="help-block">
                            {{ $errors->first('image_answer') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('is_correct', 'Является ли этот ответ правильным <br> (только один ответ из набора может быть правильным)', ['class' => 'control-label']) !!}
                    {!! Form::hidden('is_correct', 0) !!}
                    {!! Form::checkbox('is_correct', 1, old('is_correct')) !!}
                    <p class="help-block"></p>
                    @if($errors->has('is_correct'))
                        <p class="help-block">
                            {{ $errors->first('is_correct') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('slide_id', 'Какому слайду принадлежит ответ', ['class' => 'control-label']) !!}
                    {!! Form::select('slide_id', $slides, old('slide_id'), ['class' => 'form-control']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('slide_id'))
                        <p class="help-block">
                            {{ $errors->first('slide_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

