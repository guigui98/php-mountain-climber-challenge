<?php

namespace Hackathon\LevelE;

class MaxiInteger
{
    private $value;
    private $reverse;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @FIX : CAN BE UPDATED
     *
     * @param MaxiInteger $other
     * @return $this|MaxiInteger
     */
    public function add(MaxiInteger $other)
    {
        if (is_null($other)) {
            return $this;
        }

        /**
         * You can delete this part of the code
         */
        $maxLength = max(strlen($this->getValue()), strlen($other->getValue()));
        if ($maxLength) {
            $other = $other->fillWithZero($maxLength);
            $this->setValue($this->fillWithZero($maxLength)->getValue());
        }

        return $this->realSum($this, $other);
    }

    /**
     * @TODO
     *
     * @param MaxiInteger $a
     * @param MaxiInteger $b
     * @return MaxiInteger
     */
    private function realSum($a, $b)
    {
        $val = null;
        $count = 0;
        $result = "";
        $valuea = $a->createReverseValue($a->getValue());
        $valueb = $b->createReverseValue($b->getValue());
        while (strlen($valuea) - 1 >= $count and strlen($valueb) - 1 >= $count)
        {
            $nb1 = ord($valuea[$count]) - ord('0') + ord($valueb[$count]) - ord('0');
            if ($val != null)
            {   
                $nb1 = $nb1 + $val;
                $val = null;
            }
            if ($nb1 >= 10)
            {
                $val = 1;
                $nb1 = $nb1 - 10;
            }
            $result = $result . $nb1;
            $count++;
        }
        while (strlen($valuea) - 1 >= $count)
        {
            $nb1 = ord($valuea[$count]) - ord('0');
            if ($val != null)
            {   
                $nb1 = $nb1 + $val;
                $val = null;
            }
            if ($nb1 >= 10)
            {
                $val = 1;
                $nb1 = $nb1 - 10;
            }
            $result = $result . $nb1;
            $count++;
        }
        while (strlen($valueb) - 1 >= $count)
        {
            $nb1 = ord($valueb[$count]) - ord('0');
            if ($val != null)
            {   
                $nb1 = $nb1 + $val;
                $val = null;
            }
            if ($nb1 >= 10)
            {
                $val = 1;
                $nb1 = $nb1 - 10;
            }
            $result = $result . $nb1;
            $count++;
        }
        if ($val != null)
        {
            $result = $result . $val;
        }
        return new MaxiInteger(strrev($result));
    }

    private function setValue($value)
    {
        $this->value = $value;
        $this->reverse = $this->createReverseValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function getNthOfMaxiInteger($n)
    {
        return $this->value[$n];
    }
    private function createReverseValue($value)
    {
        return strrev($value);
    }

    private function fillWithZero($totalLength)
    {
        return new self(strrev(str_pad($this->reverse, $totalLength, '0')));
    }
}
