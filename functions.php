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