<?php
Class Controller
{
    public function view($path)
    {
        if(file_exists("./application/views/" . $path . ".php")) {
            include "./application/views/" . $path . ".php";
        } else {
            include ".application/views/". THEME. "404.php";
        }
    }

    public function load_model($model)
	{

		if(file_exists("./application/models/" . strtolower($model) . ".model.php"))
		{
			include_once "./application/models/" . strtolower($model) . ".model.php";
			return $a = new ($model."Model")();
		}

		return false;
	}
}