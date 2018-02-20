<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PagesController extends Controller
{
    public function index()
    {
        $kosts = DB::table('kosts')->get();
        $date = new Carbon;
        Carbon::setLocale('id');
        $i=0;
        foreach ($kosts as $kost) {
            $d = $date->parse($kost->updated_at);
            $kosts[$i]->differ = Carbon::now()->subSeconds($date->diffInSeconds($d))->diffForHumans();
            $i++;
        }
        $data = ['kosts' => $kosts];
        return view('index', $data);
    }
}
