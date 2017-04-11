<?php

return [
	'create' => 'Erstellen',
	'save' => 'Speichern',
	'edit' => 'Bearbeiten',
	'view' => 'Betrachten',
	'update' => 'Aktualisieren',
	'list' => 'Listen',
	'no_entries_in_table' => 'Keine Einträge in Tabelle',
	'custom_controller_index' => 'Custom controller index.',
	'logout' => 'Abmelden',
	'add_new' => 'Hinzufügen',
	'are_you_sure' => 'Sind Sie sicher?',
	'back_to_list' => 'Zurück zur Liste',
	'dashboard' => 'Dashboard',
	'delete' => 'Löschen',
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