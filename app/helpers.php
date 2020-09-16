<?php

use App\User;
use App\Option;
use Carbon\Carbon;

// get gender
function gender()
{
    return User::GENDER;
}

// get date in string format
function date_string($date)
{
    return Carbon::parse($date)->format('d-m-Y');
}

// get active/inactive based on value
function is_active($status)
{
    return ($status == 1) ? 'Active' : 'Inactive';
}

// get current route name
function route_name()
{
    return \Request::route()->getName();
}

// convert string date to date
function format_date($date)
{
    return Carbon::parse($date)->format('m/d/Y');
}

// convert time format H:i:a
function format_time($time)
{
    return Carbon::parse($time)->format('H:i:a');
}

// get question options
function options()
{
    return Option::OPTION;
}

// get year
function get_year()
{
    return Carbon::now()->format('Y');
}