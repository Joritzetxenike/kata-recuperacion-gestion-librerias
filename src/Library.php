<?php

namespace Deg540\DockerPHPBoilerplate;

class Library
{
    private array $listOfLoanBooks = [];
    public function operations(string $bookListWithOperation): string
    {
        if(str_contains($bookListWithOperation,"prestar")) {
            return $this->addBookToLoanList($bookListWithOperation);
        }

        if (str_contains($bookListWithOperation,"limpiar")) {
            return $this->clearListOfLoans();
        }

        if(str_contains($bookListWithOperation,"devolver")) {
            return $this->deleteBookFromLoanList($bookListWithOperation);
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

    private function clearListOfLoans(): string
    {
        $this->listOfLoanBooks = [];
        return $this->printLoanBooks();
    }

    private function addBookToLoanList(string $bookListWithOperation): string
    {
        $bookList = explode(" ",$bookListWithOperation);

        if(!isset($bookList[1])) {
            return $this->printLoanBooks();
        }

        $title = strtolower($bookList[1]);

        if(array_key_exists($title, $this->listOfLoanBooks)) {
            isset($bookList[2]) ? $this->listOfLoanBooks[$title] += intval($bookList[2]) :  $this->listOfLoanBooks[$title] += 1;
            return $this->printLoanBooks();
        }

        isset($bookList[2]) ? $this->listOfLoanBooks[$title] = intval($bookList[2]) :  $this->listOfLoanBooks[$title] = 1;
        return $this->printLoanBooks();
    }

    private function deleteBookFromLoanList(string $bookListWithOperation): string
    {
        $bookList = explode(" ",$bookListWithOperation);

        if(!isset($bookList[1])) {
            return $this->printLoanBooks();
        }

        $title = strtolower($bookList[1]);

        if(!array_key_exists($title, $this->listOfLoanBooks)) {
            return "El libro indicado no está en préstamo";
        }

        if($this->listOfLoanBooks[$title] > 1) {
            $this->listOfLoanBooks[$bookList[1]] -= 1;
            return $this->printLoanBooks();
        }

        unset($this->listOfLoanBooks[$title]);
        return $this->printLoanBooks();
    }
}
