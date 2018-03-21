<?php

require_once 'functions.php';

$show_complete_tasks = rand(0, 1);

$title = 'Главная';
$user_name = 'Антон';
$categories = ['Все','Входящие','Учеба','Работа','Домашние дела','Авто'];
$projects_main = ['Входящие','Учеба','Работа','Домашние дела','Авто'];
$list_of_all_tasks = [
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

if (isset($_GET['project'])) {
    $project_id = $_GET['project'];
    if (!in_array($categories[$project_id], $categories)) {
        http_response_code(404);
        die();
    }
	$tasks_list_filtered = create_array_with_filtered_tasks($list_of_all_tasks, $categories);
	} else {
	     $tasks_list_filtered = $list_of_all_tasks;
	}
	

$errors = [];
$push_task_bottom = "false";
$form = "";

if (isset($_GET['add'])) {
    $push_task_bottom = "true";
    $form = renderTemplate ('templates/form.php', ['projects_main' => $projects_main]);
} 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = empty_form_fields();
	if (count($errors)) {
		$form = renderTemplate ('templates/form.php', ['errors' => $errors,'projects_main' => $projects_main]);
	} else {
		$new_task = create_array_with_new_task();
		array_unshift($list_of_all_tasks, $new_task);
	}
			
    if (isset($_FILES['preview'])) {
	    $tmp_name = $_FILES['preview']['tmp_name'];
	    $path = $_FILES['preview']['name'];
	    $file_path = $_SERVER['DOCUMENT_ROOT']."/";
	    move_uploaded_file($tmp_name, $file_path . $path);
}
}

$content = renderTemplate ('templates/index.php', ['tasks_list_filtered' => $tasks_list_filtered, 'categories' => $categories, 'show_complete_tasks' => $show_complete_tasks]);
$layout_content = renderTemplate('templates/layout.php', ['errors' => $errors, 'form' => $form, 'push_task_bottom' => $push_task_bottom, 'content' => $content, 'title' => $title, 'user_name' => $user_name, 'categories' => $categories, 'list_of_all_tasks' => $list_of_all_tasks]);
print($layout_content);
