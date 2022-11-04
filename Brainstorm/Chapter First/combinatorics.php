<?php

class Combinatoric {
    private string $input_string;
    private int $combinations_length;
    private array $input_array;
    private int $combinations_count;

    public function __construct(string $string,  int $length)
    {
        if (empty($string)) throw new Exception("Строка не может быть пустой");
        if (!is_numeric($string)) throw new Exception("Строка должна состоять из цифр");
        if (!is_int($length)) throw new Exception("Размер комбинируемых подстрок должен быть целым числом");
        if ($length <= 0) throw new Exception("Размер комбинируемых подстрок должен быть больше нуля");
        if (strlen($string) < $length) throw new Exception("Размер комбинируемых подстрок не может быть больше исходной строки");

        $this->input_string = $string;
        $this->input_array = str_split($string, 1);
        $this->combinations_length = $length;
        $this->combinations_count = $this->factorial(strlen($string)) / $this->factorial(strlen($string) - $length);
    }

    private function premutate(array $array, int $length, bool $withRepetition = false){
        $permutations = [];
        $permutation = [$length];

        $internalPermutate = function ($elements, $depth) use ($length, $withRepetition, &$permutation, &$permutations, &$internalPermutate) {
            if ($depth === $length) {
                array_push($permutations, [...$permutation]);            
                return;
            }

            for ($index = 0; $index < count($elements); $index++) {
                $permutation[$depth] = $elements[$index];      
                $partial = $withRepetition
                    ? $elements
                    : [...array_slice($elements, 0, $index), ...array_slice($elements, $index + 1)];
                $internalPermutate($partial, $depth + 1);
            }
        };

        $internalPermutate($array, 0);
        return $permutations;
    }

    


    public function printParameters(){
        print_r("Исходная строка: $this->input_string \n");
        print_r("Размер комбинируемых подстрок в исходной строке: $this->combinations_length \n");
        print_r("Количество комбинаций: $this->combinations_count \n");
        print_r("-----------------------------------------------------------------\n");       
    }

    public function printPermutations(){
        $permutations = $this->premutate($this->input_array, $this->combinations_length);

        for ($row = 0; $row < count($permutations); $row++) {
            print_r($row + 1 . ": ");
            for ($column = 0; $column < count($permutations[$row]); $column++) {
                print_r($permutations[$row][$column]);
            }
            print_r("\n");
        }
    }

    private function factorial($number) {
        if ($number <= 0) return 1;
        return $number * $this->factorial ($number-1);
    }
}

try {
    $combinatoric = new Combinatoric("1234", 3);
    $combinatoric->printParameters();
    $combinatoric->printPermutations();
} catch (Exception $ex) {
    print_r($ex->getMessage());
}