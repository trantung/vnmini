<?php
Validator::extend('greater_than', function($attribute, $value, $parameters)
{
    if (isset($parameters[1])) {
       $other = $parameters[1];
       return intval($value) > intval($other);
    } 
    else {
      return true;
   }
});

