<?php

namespace App\Ldap\Rules;

use LdapRecord\Laravel\Auth\Rule;

class OnlyInGroupUsers extends Rule
{
    /**
     * Check if the rule passes validation.
     *
     * @return bool
     */
    public function isValid()
    {
        //
        return $this->user->groups()->exists(
        env('LDAP_GROUP_ACCESS')
        );
    }
}
