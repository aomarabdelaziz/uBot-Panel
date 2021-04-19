<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class EGPBalanceRule implements Rule
{
    private int $amount;

    /**
     * EGPBalance constructor.
     * @param int $amount
     */
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $currentUserBalance = auth()->user()->userBalance->balance;
        return $value < $currentUserBalance ? true : false;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The submited amount is more than your current balance';
    }
}
