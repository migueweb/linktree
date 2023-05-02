<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return void
     */
    public function index(){
        $links = Link::select(['id', 'title', 'url'])
                    ->where('user_id', auth()->id())
                    ->orderBy('id', 'desc')
                    ->get();

        foreach($links as $link){
            if(strlen($link->url) > 35){
                $link->url = substr($link->url, 0, 35).'...';
            }
        }

        return view('dashboard', compact('links'));
    }
}
