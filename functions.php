<?php
function renderTemplate($template_path, $data)
{
    if (file_exists($template_path)) {
		extract($data);
		ob_start();
	    require_once ($template_path);
		return ob_get_clean();
	} else {
		return '';
	}
}

function task_counts($tasks_list, $project_element)
	{
		$number = 0;
		if ($project_element == "Все")
			$number = count($tasks_list);
		
		foreach ($tasks_list as $key => $task)
            {	
					if ($task["category"] == $project_element)
                        $number++;         			
			}
        return $number;							
	}

function esc($str)
    {
	    $text = strip_tags($str);
	    return $text;
    }
	
function task_dates($task)
    { 	
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
	
function request($tasks_list)
	$project = null;

if (isset($_GET['project'])) {
	$project_id = $_GET['project'];

	foreach ($tasks_list as $key => $item) {
		if ($key == $project_id) {
			$project = $item;
			break;
		}
	}
}

if (!$gif) {
	http_response_code(404);
}
