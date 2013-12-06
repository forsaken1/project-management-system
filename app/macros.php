<?php

Form::macro('prioritySelector', function($default = 0, $attr = array()) {
	$options = array(
		'-2' => 'Самый низкий',
		'-1' => 'Низкий',
		'0'  => 'Обычный',
		'1'  => 'Высокий',
		'2'  => 'Самый высокий',
	);
	return Form::select('priority', $options, $default, $attr);
});

Form::macro('statusSelector', function($default = 0, $attr = array()) {
	$options = array(
		'0' => 'Новая',
		'1' => 'Назначена',
		'2' => 'В работе',
		'3' => 'Готова',
		'4' => 'Завершена',
	);
	return Form::select('status', $options, $default, $attr);
});

Form::macro('priority', function($param) {
	$options = array(
		'-2' => 'Самый низкий',
		'-1' => 'Низкий',
		'0'  => 'Обычный',
		'1'  => 'Высокий',
		'2'  => 'Самый высокий',
	);
	return $options[$param];
});

Form::macro('status', function($param) {
	$options = array(
		'0' => 'Новая',
		'1' => 'Назначена',
		'2' => 'В работе',
		'3' => 'Готова',
		'4' => 'Завершена',
	);
	return $options[$param];
});