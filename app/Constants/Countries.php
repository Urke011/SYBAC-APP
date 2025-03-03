<?php

namespace App\Constants;

use Countries as CountryList;

class Countries
{
    private static $language = 'de';

    public static function getAll()
    {
        $mappedCountries = [];
        $countries =  CountryList::getList(config('app.locale'), 'php');

        foreach ($countries as $key => $value) {
            array_push($mappedCountries, ['key' => $key, 'value' =>  $value]);
        }

        return $mappedCountries;
    }

    public static function getOne(string $handle)
    {
        if (!$handle) return '';

        return CountryList::getOne($handle, config('app.locale'));
    }
}
