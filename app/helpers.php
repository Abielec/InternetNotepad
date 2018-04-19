<?php

if(!function_exists('MonthsToPL'))
{
    function MonthsToPL($month){
        switch($month)
        {
            case 'Jan': return "Styczeń"; break;
            case 'Feb': return "Luty"; break;
            case 'Mar': return "Marzec"; break;
            case 'Apr': return "Kwiecień"; break;
            case 'May': return "Maj";break;
            case 'Jun': return "Czerwiec";break;
            case 'Jul': return "Lipiec";break;
            case 'Aug': return "Sierpień";break;
            case 'Sep': return "Wrzesień";break;
            case 'Oct': return "Październik";break;
            case 'Nov': return "Listopad";break;
            case 'Dec': return "Grudzień";break;
        }
    }
}

?>