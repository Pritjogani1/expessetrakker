<?php
use Core\Response;

function isurl($value)
{
    return ($_SERVER['REQUEST_URI'] === $value);
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function aboart($code)
{
    http_response_code($code);
    require base_path("Http/controller/{$code}.php");
    die();
}

function authorize($condition,$status = Response::UNAUTHORIZED) 
{
    if(!$condition)
    {
        aboart($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path,$attribute = [])
{
    extract($attribute);
    
    require   base_path("view/{$path}");
}
function controller($path,$attribute = [])
{
    extract($attribute);
    
    require   base_path("Http/controller/{$path}");
}

function redirect($path)
{
    header("Location: {$path}");
    exit();
}

function old($key)
{
    return Core\Session::get('old')[$key] ?? '';
}
