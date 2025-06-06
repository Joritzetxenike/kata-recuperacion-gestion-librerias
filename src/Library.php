<?php

namespace Deg540\DockerPHPBoilerplate;

class Library
{
    private array $listOfLoanBooks = [];
    public function operations(string $books): string
    {
        if(str_contains($books,"prestar:")) {
            $quantityBooks = explode(" ",$books);//prestar:__libreo__cantidad

            if (isset($quantityBooks[2])) {
                $this->listOfLoanBooks[$quantityBooks[1]] = intval($quantityBooks[2]);
                return $this->printLoanBooks();
            }
            elseif (isset($quantityBooks[1])) {
                $this->listOfLoanBooks[$quantityBooks[1]] = 1;
                return $this->printLoanBooks();
            }

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
