<?php

namespace App\Rules;

use App\Models\Schedule;
use Illuminate\Contracts\Validation\Rule;

class ScheduleRule implements Rule
{

    private string $day;

    /**
     * ScheduleRule constructor.
     * @param string $day
     */
    public function __construct(string $day)
    {
        $this->day = $day;
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

        return !Schedule::where('Day' , $this->day)->where('Time' , $value)->exists();

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You cannot add duplicate event time , this schedule is alreay exist';
    }
}
