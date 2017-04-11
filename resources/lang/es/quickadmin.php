<?php

return [
	'create' => 'Crear',
	'save' => 'Guardar',
	'edit' => 'Editar',
	'view' => 'Ver',
	'update' => 'Actualizar',
	'list' => 'Listar',
	'no_entries_in_table' => 'Sin valores en la tabla',
	'custom_controller_index' => 'Índice del controlador personalizado (index).',
	'logout' => 'Salir',
	'add_new' => 'Agregar',
	'are_you_sure' => 'Estás seguro?',
	'back_to_list' => 'Regresar a la lista?',
	'dashboard' => 'Tablero',
	'delete' => 'Eliminar',
	'quickadmin_title' => 'Education Project',
		'user-management' => [		'title' => 'User Management',		'fields' => [		],	],
		'roles' => [		'title' => 'Пользовательские роли',		'fields' => [			'title' => 'Название роли',		],	],
		'users' => [		'title' => 'Пользователи',		'fields' => [			'name' => 'Имя пользователя',			'email' => 'Электронная почта',			'password' => 'Пароль',			'role' => 'Роль',			'remember-token' => 'Remember token',		],	],
		'categories' => [		'title' => 'Категории',		'fields' => [			'name' => 'Имя категории',		],	],
		'lessons' => [		'title' => 'Уроки',		'fields' => [			'title' => 'Название урока',			'description' => 'Описание урока',			'category' => 'Категория',		],	],
		'slides' => [		'title' => 'Слайды',		'fields' => [			'type' => 'Тип Слайда (презентация или тест)',			'title' => 'Название слайда',			'description' => 'Текст описания слайда<br> (который будет читаться диктором, при наличии озвучки, автоматическое воспроизведение)',			'description-audio-file-path' => 'Аудио файл с озвучкой описания слайда',			'media-content-description' => 'Описание блока с медиа контентом',			'media-content-description-audio-file-path' => 'Аудио файл в блоке медиаконтента (без автоматического воспроизведения)',			'media-content-image-file-path' => 'Картинка, для блока медиаконтента',			'media-content-youtube-video' => 'Код для вставки youtube видео',			'lesson' => 'Для какого урока слайд',			'is-active' => 'Отображать ли слайд на сайте?<br> (можно временно отключить отображение)',		],	],
		'answers' => [		'title' => 'Ответы',		'fields' => [			'text-answer' => 'Текстовый ответ <br> (нужно оставить пустым, если это ответ-изображение)',			'image-answer' => 'Ответ-изображение <br> (нужно оставить пустым, если это текстовый ответ)',			'is-correct' => 'Является ли этот ответ правильным <br> (только один ответ из набора может быть правильным)',			'slide' => 'Какому слайду принадлежит ответ',		],	],
		'reactiontoanswer' => [		'title' => 'Реакция на ответ',		'fields' => [			'type' => 'Тип реакции (правильно/неправильно было отвечено)',			'title' => 'Заголовок окна реакции на ответ',			'description' => 'Дополнительное текстовое содержание окна ответа',			'image-path' => 'Изображение для окна ответа',			'youtube-video' => 'Видео с YouTube',			'audio-path' => 'Аудио файл для автоматического проигрывания в реакции на ответ',		],	],
];