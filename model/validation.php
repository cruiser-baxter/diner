<?php

/* validation.php
 * Validate data for the diner app
 *
 */

//Return true if a food is valid
function validFood($food)
{
    return strlen(trim($food)) >= 2;
}

//Return true if meal is valid
function validMeal($meal)
{
    return in_array($meal, getMeals());
}