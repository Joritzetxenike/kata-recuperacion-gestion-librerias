<?php

namespace Deg540\DockerPHPBoilerplate;

class Library
{
    private array $listOfLoanBooks = [];
    public function operations(string $books): string
    {
        $listOfBooks = explode("prestar: ", $books);

        if (isset($listOfBooks[1])) {
            $quantityBooks = explode(" ", $listOfBooks[1]);

            if (isset($quantityBooks[1])) {
                $this->listOfLoanBooks[$quantityBooks[0]] = intval($quantityBooks[1]);
                return $this->printLoanBooks();
            }

            $this->listOfLoanBooks[$quantityBooks[0]] = 1;
            return $this->printLoanBooks();
        }
        return $this->printLoanBooks();
    }

    private function printLoanBooks():string
    {
        ksort($this->listOfLoanBooks);
        return $this->mapped_implode(', ', $this->listOfLoanBooks, ' x');

    }

    private function mapped_implode($glue, $array, $symbol = '=') {

        return implode($glue, array_map(
                function($k, $v) use($symbol) {
                    return $k . $symbol . $v;
                },
                array_keys($array),
                array_values($array)
            )
        );
    }
}
