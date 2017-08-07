<?php

namespace Test;

class View
{
    public static function render($template, array $params)
    {
        // read file contents from the template folder
        $output = file_get_contents('templates/' . $template);

        // replace the template variables defined between [ ]
        foreach ($params as $key => $value){
            $tag = "[$key]";
            $output = str_replace($tag, $value, $output);
        }

        return $output;
    }
}