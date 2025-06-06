<?php

namespace Deg540\DockerPHPBoilerplate;

class Library
{
    public function operations(string $books): string
    {
        $listOfBooks = explode("prestar: ", $books);
        if (isset($listOfBooks[1])) {
            return $listOfBooks[1] . " x1";
        }
        return "";
    }
}
