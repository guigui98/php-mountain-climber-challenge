<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }


    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */

    public function giveMoney($price)
    {
        if ($this->total < $price)
        {
            return false;
        }
        $refund = 0;
        while ($refund < $price)
        {
            $maxi = $this->computeMax();
            $index = array_search($maxi, $this->wallet);
            $refund += $maxi;
            unset($this->wallet[$index]);
        }
        return true;
    }

    private function computeMax()
    {
    $max = 0;
    foreach ($this->wallet as $element) {
        if (is_numeric($element) && $element > $max)
        {
            $max = $element;
        }
      }
      return $max;
    }



    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}
