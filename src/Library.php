<?php

namespace Deg540\DockerPHPBoilerplate;

class Library
{
    public function operations(string $books): string
    {
        $listOfBooks = explode("prestar: ", $books);
        if (isset($listOfBooks[1])) {
            $quantityBooks = explode(" ", $listOfBooks[1]);
            if (isset($quantityBooks[1])) {
                return $quantityBooks[0] . " x" . $quantityBooks[1];
            }
            return $listOfBooks[1] . " x1";
        }
        return "";
    }
}
