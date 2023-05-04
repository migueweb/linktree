<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Click;
use App\Models\User;

class ClickController extends Controller
{
    /**
     * Store when a user clicks a link.
     *
     * @param string $link
     * @param string $title
     * @return redirect
     */
    public function store(Request $request, string $username, string $link, string $title)
    {
        $user = User::where('username', $username)->firstOrFail();
        
        $link = Link::where('id', $link)
                    ->where('title', $title)
                    ->firstOrFail();

        // Check if the user comes from the user page and is not the owner
        $previous = $request->header('referer');
        $comesFromUser = $previous === route('user.index', $username);
        $isNotTheOwner = auth()->id() !== $user->id;
        
        if($comesFromUser && $isNotTheOwner){

            Click::create([
                'link_id' => $link->id
            ]);
        }
        
        return redirect($link->url);
    }
}
