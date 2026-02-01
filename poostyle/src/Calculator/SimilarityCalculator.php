<?php

namespace App\Calculator;

class SimilarityCalculator
{
    private array $leftcolumn;
    private array $rightcolumn;

    public function __construct(array $leftcolumn, array $rightcolumn)
    {
        $this->leftcolumn = $leftcolumn;
        $this->rightcolumn = $rightcolumn;
    }

    public function countOccurrences(): array
    {
        $occurrences = [];

        foreach ($this->leftcolumn as $value) {
            $occurrences[$value] = 0;
        }foreach ($this->rightcolumn as $value) {
            if (array_key_exists($value, $occurrences)) {
                $occurrences[$value]++;
            }
        }

        return $occurrences;
    }

    public function calculate(): int
    {
        $occurrences = $this->countOccurrences();
        $score = 0;
        foreach ($occurrences as $value => $count) {
            $score += $value * $count;
        }




        
        return $score;
    }
}