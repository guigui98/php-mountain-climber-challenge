<?php

namespace Hackathon\LevelB;

class MyMatrix
{
    private $iMax;
    private $jMax;
    private $matrix = array();

    public function __construct($i, $j, $value = null)
    {
        $this->iMax = $i;
        $this->jMax = $j;

        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                $this->matrix[$i][$j] = $value;
            }
        }
    }

    /**
     * This function generate a Matrix[i][j] from a String
     *
     * @param $str
     * @return $this
     * @throws \Exception
     */
    public function str2Matrix($str)
    {
        $lines = explode("\n", $str);
        if ($this->iMax !== count($lines)) {
            throw new \Exception();
        }

        foreach ($lines as $i => $line) {
            $cells = explode(',', $line);
            if ($this->jMax !== count($cells)) {
                throw new \Exception();
            }
            foreach ($cells as $j => $value) {
                $this->matrix[$i][$j] = trim($value);
            }
        }

        return $this;
    }

    /**
     * This function generates a string from the $matrix and displays it (if mode == 'cli')
     *
     * @param null $mode
     * @return string
     */
    public function prettyMatrix($mode = null)
    {
        $res = '';
        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                $val = '-';
                if (!is_null($this->matrix[$i][$j])) {
                    $val = $this->matrix[$i][$j];
                }
                $res .= $val."\t";
            }
            $res .= "\n";
        }

        if ('cli' === $mode) {
            echo $res;
        }

        return $res;
    }

    /**
     * This function replaces a column (i) and a line (j) with '0',
     * if the (i, j) cell equals to '0'
     *
     * @TODO
     * @return $this
     */
    public function fillZero()
    {
        $save = array();
        $pos = 0;
        for ($i = 0; $i < $this->iMax; ++$i) {
            for ($j = 0; $j < $this->jMax; ++$j) {
                if ($this->matrix[$i][$j] == 0)
                {
                    $save[$pos] = [$i, $j];
                    $pos = $pos + 1;
                }
            }
        }
        if ($pos > 0)
        {
            for ($x = $pos - 1; $x > 0; $x = $x - 1)
            {
                for ($i = 0; $i < $this->iMax; ++$i) {
                    $this->matrix[$i][$save[$x][1]] = 0;
                }
                for ($j = 0; $j < $this->jMax; ++$j) {
                    $this->matrix[$save[$x][0]][$j] = 0;
                }
            }
        }

        return $this;
    }
}
