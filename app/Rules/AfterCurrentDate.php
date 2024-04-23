<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\Rule;

class AfterCurrentDate implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $currentDate = Carbon::now();
        $eventDate = Carbon::parse($value);

        return $eventDate->gt($currentDate);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'La date de l\'événement doit être ultérieure à la date actuelle.';
    }
}
