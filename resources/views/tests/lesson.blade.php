@extends('layouts.front')
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="breadcrumbs">


                <ul class="B_crumbBox">
                    <li class="B_firstCrumb" itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a class="B_homeCrumb" itemprop="url" rel="Home" href="https://jliza.ru/"><span
                                    itemprop="title">Главная</span></a></li>
                    <span class="crumbSeparator">/</span>
                    <li class="B_lastCrumb" itemscope="itemscope"
                        itemtype="http://data-vocabulary.org/Breadcrumb"></li>
                    <li itemscope="itemscope" class="B_currentCrumb"
                        itemtype="http://data-vocabulary.org/Breadcrumb">Музыкальное развитие детей
                    </li>
                </ul>
            </div>


            <article id="content" class="content">


                <header>
                    <h1>{{$lesson->title}}</h1>
                    <h3>{{$lesson->description}}</h3>
                </header>

                <div class="panel panel-info">
                    <div class="panel-heading">
                        @php
                        $slideNumber = request()->get('slide')
                        @endphp
                        <h3 class="panel-title">{{$slide->title}}. Слайд №{{$slideNumber or '1'}}  (из {{$lesson->slides->count()}})</h3>
                    </div>

                    <audio autoplay preload>
                        <source src="{{asset('uploads/' . $slide->description_audio_file_path)}}" type="audio/mpeg">
                        Тег audio не поддерживается вашим браузером.
                        <a href="{{asset('uploads/' . $slide->description_audio_file_path)}}">Скачайте музыку</a>.
                    </audio>

                    <div class="panel-body">

                        <div class="row">
                            <div class="col-md-9 jlcontent">

                                @if(!empty($slide->description))
                                <p>{{$slide->description}}</p>
                                @endif

                                @if(!empty($slide->media_content_image_file_path))
                                <img class="img-responsive img-thumbnail" src="{{asset('uploads/' . $slide->media_content_image_file_path)}}" alt="{{$slide->title}}">
                                @endif
                                <!-- Start answer block -->
                                @if($slide->type == 'test')
                                    <h3>Варианты ответа:</h3>
                                @foreach($slide->answers as $answer)
                                    <p class="otwets">

                                        @if(!empty($answer->image_answer))
                                            <img class="img-responsive img-thumbnail otwet active" width="200px" src="{{asset('uploads/' . $answer->image_answer)}}" alt="">
                                        @endif

                                        @if(!empty($answer->text_answer))
                                            <li>{{$answer->text_answer}}</li>
                                        @endif

                                    </p>
                                @endforeach
                                @endif
                                <!-- End answer block -->


                            </div>
                            <div class="col-md-3"><p><b> Блок управления </b></p>
                                <p><b> Все слайды: </b></p>
                                @foreach($lesson->slides as $slide)
                                    <a href="{{route('tests', ['lesson'=>$lesson->id]) . '?slide=' . $loop->iteration}}"
                                       class="btn btn-info">{{$loop->iteration}}</a>
                                @endforeach
                                <p><b> Вы закончили:</b> на 5 слайде </p>
                                @if($slide->type == 'test')
                                <p><b> Последний результат теста:</b> - {!!$slide->getLastResultFromSession()!!} </p>
                                @endif
                                <p><b> Какая-нибудь полезная инфа - в голову сейчас не приходит</p>

                            @if(request()->get('slide') > 1)
                                <a href="{{route('tests', ['lesson'=>$lesson->id]) . '?slide=' . (request()->get('slide')-1)}}" type="button" class="btn btn-success  prbtn">Назад</a>
                            @endif

                            @if(!empty(request()->get('slide')) && request()->get('slide') < $lesson->slides->count())
                                    <a href="{{route('tests', ['lesson'=>$lesson->id]) . '?slide=' . (request()->get('slide')+1)}}" type="button" class="btn btn-success  prbtn">Далее</a>
                            @endif
                            @if(empty(request()->get('slide')))
                                    <a href="{{route('tests', ['lesson'=>$lesson->id]) . '?slide=' . 2}}" type="button" class="btn btn-success  prbtn">Далее</a>
                            @endif
                            </div>

                        </div>


                    </div>
                </div>


            </article>


        </div>
    </div>
@endsection