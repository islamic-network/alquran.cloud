<?php
namespace AlQuranCloud\Renderer;

class Generic
{
    public static function filterByLanguage($results, array $languages)
    {
        foreach($results->data->matches as $key => $result) {
            if (!in_array($result->edition->language, $languages)) {
                unset($results->data->matches[$key]);
                $results->data->count = $results->data->count - 1;
            }
        }
        
        return $results;
    }
    
    public static function filterByEdition($results, array $editions)
    {
        foreach($results->data->matches as $key => $result) {
            if (!in_array($result->edition->identifier, $editions)) {
                unset($results->data->matches[$key]);
                $results->data->count = $results->data->count - 1;
            }
        }
        
        return $results;
    }
    
    public static function getLanguageName($code)
    {
        $l = self::getLanguages();
        
        return $l[$code];
    }
    
    public static function getLanguages()
    {
        $a = [
            "ar" => "Arabic",
            "az" => "Azerbaijani",
            "ba" => "Bashkir",
            "bn" => "Bengali",
            "cs" => "Czech",
            "de" => "German",
            "dv" => "Divehi / Maldivian",
            "en" => "English",
            "es" => "Spanish",
            "fa" => "Farsi",
            "fr" => "French",
            "ha" => "Hausa",
            "hi" => "Hindi",
            "id" => "Indonesian",
            "it" => "Italian",
            "ja" => "Japanese",
            "ko" => "Korean",
            "ku" => "Kurdish",
            "ml" => "Malayalam",
            "my" => "Myanmar",
            "nl" => "Dutch",
            "no" => "Norwegiwn",
            "pl" => "Polish",
            "pt" => "Portuguese",
            "ro" => "Romanian",
            "ru" => "Russian",
            "sd" => "Sindhi",
            "so" => "Somali",
            "sq" => "Albanian / Shqip",
            "sv" => "Swedish",
            "sw" => "Swahili / Kiswahili",
            "ta" => "Tamil",
            "tg" => "Tajik",
            "th" => "Thau",
            "tr" => "Turkish",
            "tt" => "Tatar",
            "ug" => "Uyghur",
            "ur" => "Urdu",
            "uz" => "Uzbek",
            "bg" => "Bulgarian",
            "bs" => "Bosnian",
            "ms" => "Malay",
            "zh" => "Chinese",
            "si" => "Sinhalese",
            "am" => "Amharic",
            "ber" => "Berber",
            "ps" => "Pashto",
        ];
        
        asort($a);
        
        return $a;
    }
    
    public static function getEditionsByLanguage($editions)
    {
        $languages = self::getLanguages();
        $result = [];
        foreach ($editions as $edition) {
            //if ($edition->type != 'quran') {
                $edition->languageName = $languages[$edition->language];
                $result[$edition->languageName][] = $edition;
            //}
        }
        ksort($result);
        return $result;
    }

    public static function getArabicQuranEditions($editions)
    {
        $languages = self::getLanguages();
        $result = [];
        foreach ($editions as $edition) {
            if ($edition->type == 'quran') {
                $edition->languageName = $languages[$edition->language];
                $result[$edition->languageName][] = $edition;
            }
        }
        ksort($result);
        return $result;
    }
    
    public static function latinToArabicNumerals($number)
    {
        $number = (string) $number;
        foreach (self::getArabicNumerals() as $latin => $arr) {
            $number = str_replace($latin, $arr['arabic'], $number);
        }
        
        return $number;
        
    }
    
    public static function getArabicNumerals()
    {
        return [
            '0' => 
                 [
                     'arabic' => '٠', 
                     'latin' => '0',
                     'html' => '&#1632;'
             ],
             '1' => 
                 [
                     'arabic' => '١',
                     'latin' => '1',
                     'html' => '&#1633;'
             ],
            '2' => 
                 [
                     'arabic' => '٢',
                     'latin' => '2',
                     'html' => '&#1634;'
                 ],
            '3' => 
                 [
                     'arabic' => '٣',
                     'latin' => '3',
                     'html' => '&#1635;'
                 ],
            '4' => 
                 [
                     'arabic' => '٤',
                     'latin' => '4',
                     'html' => '&#1636;'
                 ],
            '5' => 
                 [
                     'arabic' => '٥',
                     'latin' => '5',
                     'html' => '&#1637;'
                 ],
            '6' => 
                 [
                     'arabic' => '٦',
                     'latin' => '6',
                     'html' => '&#1638;'
                 ],
            '7' => 
                 [
                     'arabic' => '٧',
                     'latin' => '7',
                     'html' => '&#1639;'
                 ],
            '8' => 
                 [
                     'arabic' => '٨',
                     'latin' => '8',
                     'html' => '&#1640;'
                 ],
            '9' => 
                 [
                     'arabic' => '٩',
                     'latin' => '9',
                     'html' => '&#1641;'
                 ],
            
            ];
    }
}
