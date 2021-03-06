@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li>
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="sub-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(1) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('category_access')
            <li class="{{ $request->segment(1) == 'categories' ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.categories.title')</span>
                </a>
            </li>
            @endcan
            
            @can('lesson_access')
            <li class="{{ $request->segment(1) == 'lessons' ? 'active' : '' }}">
                <a href="{{ route('lessons.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.lessons.title')</span>
                </a>
            </li>
            @endcan
            
            @can('slide_access')
            <li class="{{ $request->segment(1) == 'slides' ? 'active' : '' }}">
                <a href="{{ route('slides.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.slides.title')</span>
                </a>
            </li>
            @endcan
            
            @can('answer_access')
            <li class="{{ $request->segment(1) == 'answers' ? 'active' : '' }}">
                <a href="{{ route('answers.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.answers.title')</span>
                </a>
            </li>
            @endcan
            
            @can('reactiontoanswer_access')
            <li class="{{ $request->segment(1) == 'reactiontoanswers' ? 'active' : '' }}">
                <a href="{{ route('reactiontoanswers.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.reactiontoanswer.title')</span>
                </a>
            </li>
            @endcan
            

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.logout')</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">@lang('quickadmin.logout')</button>
{!! Form::close() !!}