<?php
namespace App\Http\Traits;
use DB;
trait GetWords
{
    public function checkWords($question)
    {
        $find = DB::table('words')->select('name')->get()->toArray();
        if (count($find) !== 0) {
            foreach ($find as $value) {
                $newArray[] = $value->name;
            }
            foreach ($newArray as $value) {
                if ((mb_stripos($question, $value)) !== false) {
                    return $value;
                }
            }
        }
        return false;
    }

}