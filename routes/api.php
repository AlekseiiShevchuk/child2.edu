<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('roles', 'RolesController');

        Route::resource('users', 'UsersController');

        Route::resource('categories', 'CategoriesController');

        Route::resource('lessons', 'LessonsController');

        Route::resource('answers', 'AnswersController');

        Route::resource('reactiontoanswers', 'ReactiontoanswersController');

});
