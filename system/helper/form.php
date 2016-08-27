<?php

    if (!function_exists('inputText'))
    {
        function inputText($name, $placeholder='', $value='')
        {
            return input('text', $name, $value, $placeholder);
        }
    }

    if (!function_exists('inputSearch'))
    {
        function inputSearch($name, $placeholder='', $value='')
        {
            return input('search', $name, $value, $placeholder);
        }
    }

    if (!function_exists('inputPassword'))
    {
        function inputPassword($name, $placeholder='')
        {
            return input('password', $name, '', $placeholder);
        }
    }

    if (!function_exists('inputCheckbox'))
    {
        function inputCheckbox($name, $label)
        {
            return '<label>' . input('checkbox', $name, '') . $label . '</label>';
        }
    }

    if (!function_exists('inputSubmit'))
    {
        function inputSubmit($value)
        {
            return input('submit', '', $value, '');
        }
    }

    if (!function_exists('input'))
    {
        function input($type='', $name, $value='', $placeholder='')
        {
            return '<input type="'.$type.'" name="'.$name.'" value="'.$value .
                '" placeholder="'.$placeholder.'" />';
        }
    }

?>