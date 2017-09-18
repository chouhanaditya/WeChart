<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;


class EmailExists implements Rule
{
    protected $role;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($role)
    {
        $this->role = $role;
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
        //Validate role- Student
        if($this->role == 'Student')
        {
             $savedStudentEmails = DB::table('EmailidRole')->where('role','Student')->pluck('email');
             foreach ($savedStudentEmails as $email) {
             if($email == $value)
             {
                return 1;
             }
         }
         return 0;

        }
        
        //Validate role- Instructor
        if($this->role == 'Instructor')
        {
            $savedInstrumentEmails = DB::table('EmailidRole')->where('role','Instructor')->pluck('email');
             foreach ($savedInstrumentEmails as $email) {
             if($email == $value)
             {
                return 1;
             }
         }
         return 0;
            
        }    
        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This email id is not in our system. Please try again.';
    }
}