<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;
use Closure;

class FilledPersonInformation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//////////Person private informations
        $ID = $request->user()->id;
        $RecordsInformation = DB::table('persons') // check do person has filled information
        ->select('name')
        ->where('persons.PersonId','=',"$ID")
        ->count();
        //Take directory for fill fields
       $URL = url("/")."/Uzytkownik/informacje/uzupelnianie"; // Website where you can fill your informations
       // If person has not filled information about him, and he's not on fill website, redirect him there
     if($RecordsInformation <= 0 && url()->current() != $URL)
        {
            return redirect()->route('FillInformation');
        }
        // If person has not filled information about him, and he's on the website do nothing
    else if($RecordsInformation<=0 && url()->current() == $URL)
    {
        return $next($request);
    }
    // If person has filled information about him, and he's on website where he can fill informations. Let him see his information, go redirect him on correct page
    else if($RecordsInformation>0 && url()->current() == $URL )
    {
        return redirect()->route('UserInformation');
    }
    // Person Girts informations
    $URL .= "/strona/2";
    $RecordsGirt = DB::table('girts') // look do person has filled girts information
        ->select('PersonId')
        ->where('girts.Personid','=',"$ID")
        ->count();
        if($RecordsInformation <= 0 && url()->current() == $URL )
            return redirect()->route('FillInformation');
        else if($RecordsInformation >0 && url()->current() == $URL && $RecordsGirt <=0)
            return $next($request);
        else if($RecordsInformation >0 && url()->current() == $URL && $RecordsGirt >0 )
            return redirect()->route('UserInformation');
    return $next($request);
}
}
