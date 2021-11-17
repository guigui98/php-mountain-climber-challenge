<?php

namespace Hackathon\LevelI;

/**
 * Class Difference
 */
class Difference
{
    private $a;     // Chaine A
    private $b;     // Chaine A
    public $cost;   // Coût de changement

    /**
     * @param $a    // Chaine A
     * @param $b    // Chaine B
     */
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
        $this->cost = $this->whatIsTheCostPlease($a, $b);
    }

    /**
     * @param $this->a
     * @param $this->b
     *
     * @return mixed
     */
    public function whatIsTheCostPlease()
    {
        // @ TODO
        $lenA = strlen($this->a);
        $lenB = strlen($this->b);
        for ($i = 0; $i <= $lenA; $i++)
        {
            $matrix[$i][0] = $i;
        }
        for ($j = 0; $j <= $lenB; $j++)
        {
            $matrix[0][$j] = $j;
        }
        for ($i = 1; $i <= $lenA; ++$i) {
            for ($j = 1; $j <= $lenB; ++$j) {
                $c = ($this->a[$i - 1] === $this->b[$j - 1]) ? 0 : 1;
               // $matrix[$i][$j] = 0;
               $matrix[$i][$j] = min($matrix[$i - 1][$j] + 1, $matrix[$i][$j - 1] + 1, $matrix[$i - 1][$j - 1] + $c);
            }
        }
        return $matrix[$lenA][$lenB];
    }
}
