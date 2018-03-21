<?php
function renderTemplate($template_path, $data){
    if (file_exists($template_path)) {
		extract($data);
		ob_start();
	    require_once ($template_path);
		return ob_get_clean();
	} else {
		return '';
	}
}

function task_counts($tasks_list, $project_element){
	$number = 0;
	if ($project_element == "Все")
	    $number = count($tasks_list);
		foreach ($tasks_list as $key => $task){	
			if ($task["category"] == $project_element)
            $number++;         			
		}
    return $number;							
}

function esc($str){
	$text = strip_tags($str);
	return $text;
}
	
function checking_remaining_time($task){ 	
	$curdate = strtotime(date('d.m.Y.H.i'));
	if ($task["date"] == "Нет"){
	    return '';
	} else {
	        $task_date = strtotime($task["date"]);
	        $diff_date = $task_date - $curdate;
	        $hours = $diff_date/3600;
			if ($hours < 24) {
			    return "task--important";	
			} else {
                return "";
			  }	
		   }					
}	
	
function create_array_with_filtered_tasks($list_of_all_tasks, $categories){
	$tasks_list_filtered = [];
	foreach ($list_of_all_tasks as $item){
		if ($item['category'] == $categories[$_GET['project']]){
	        $tasks_list_filtered[] = $item;
		}
	}
	return $tasks_list_filtered;  				 
	}    

function empty_form_fields(){
	$errors = [];
    $form_fields = ['name', 'project'];	
	foreach ($form_fields as $key) {
		if (empty($_POST[$key])) {
            $errors[$key] = 'Это поле надо заполнить';
		}
    }
	return $errors;
}

function create_array_with_new_task(){
        $new_task=[];
		$form = "";
		$form_fields = ['name', 'project', 'date'];
		foreach ($form_fields as $key) {
			if ($key == 'name') {
			    $new_task['task'] = $_POST[$key];}
			if ($key == 'project') {
				$new_task['category'] = $_POST[$key];}
			if ($key == 'date') {
				$new_task['date'] = $_POST[$key];}
		}
		$new_task['make'] = false;
		return $new_task;
}