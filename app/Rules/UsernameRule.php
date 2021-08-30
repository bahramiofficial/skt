<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;

class UsernameRule implements Rule
{
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new rule instance.
     *
     * @param User $user
     */
    public function __construct(User $user = null)
    {
        $this->user = $user;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (!preg_match('~^[a-zA-Z_][a-zA-Z0-9_]{2,19}$~', $value)) return false;

        if (!$this->user) {
            if (User::where('username', $value)->count()) return false;
        } else {
            if (User::where('username', $value)->where('id', '!=', $this->user->id)->count()) return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The Username is not valid';
    }
}
