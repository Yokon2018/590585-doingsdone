<?php

require_once 'functions.php';

$show_complete_tasks = rand(0, 1);

$title = 'Главная';
$user_name = 'Антон';
$projects = ['Все','Входящие','Учеба','Работа','Домашние дела','Авто'];
$tasks_list = [
    [
    'task' => 'Собеседование в IT компании',
    'date' => '01.06.2018',
    'category' => 'Работа',
    'make' => false
    ],
    [
    'task' => 'Выполнить тестовое задание',
    'date' => '25.05.2018',
    'category' => 'Работа',
    'make' => false
    ],
    [
    'task' => 'Сделать задание первого раздела',
    'date' => '21.04.2018',
    'category' => 'Учеба',
    'make' => true
    ],
    [
    'task' => 'Встреча с другом',
    'date' => '28.02.2018',
    'category' => 'Входящие',
    'make' => false
    ],
    [
    'task' => 'Купить корм для кота',
    'date' => 'Нет',
    'category' => 'Домашние дела',
    'make' => false
    ],
    [
    'task' => 'Заказать пиццу',
    'date' => 'Нет',
    'category' => 'Домашние дела',
    'make' => false
    ]
];

$content = renderTemplate ('templates/index.php', ['tasks_list' => $tasks_list, 'projects' => $projects, 'show_complete_tasks' => $show_complete_tasks]);
$layout_content = renderTemplate('templates/layout.php', ['content' => $content, 'title' => $title, 'user_name' => $user_name, 'projects' => $projects, 'tasks_list' => $tasks_list]);

print($layout_content);

?>