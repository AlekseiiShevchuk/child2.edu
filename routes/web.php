<?php
Route::get('/', function () {
    return redirect('/home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('categories', 'CategoriesController');
    Route::resource('lessons', 'LessonsController');
    Route::post('lessons_mass_destroy', ['uses' => 'LessonsController@massDestroy', 'as' => 'lessons.mass_destroy']);
    Route::resource('slides', 'SlidesController');
    Route::post('slides_mass_destroy', ['uses' => 'SlidesController@massDestroy', 'as' => 'slides.mass_destroy']);
    Route::resource('answers', 'AnswersController');
    Route::post('answers_mass_destroy', ['uses' => 'AnswersController@massDestroy', 'as' => 'answers.mass_destroy']);
    Route::resource('reactiontoanswers', 'ReactiontoanswersController');
    Route::post('reactiontoanswers_mass_destroy', ['uses' => 'ReactiontoanswersController@massDestroy', 'as' => 'reactiontoanswers.mass_destroy']);
});


Route::get('test-lesson/{lesson}', 'TestsController@showLesson')->name('tests');