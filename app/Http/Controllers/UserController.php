<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Link;
use App\Models\View;
use App\Models\LinkImpression;

class UserController extends Controller
{
    /**
     * Display a user information name, bio, links, etc
     *
     * @param string $username
     * @return void
     */
    public function index($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $links = Link::where('user_id', $user->id)->get();

        if(auth()->id() !== $user->id) {
            View::create([
                'user_id' => $user->id,
            ]);

            LinkImpression::create([
                'user_id' => $user->id,
                'impressions' => $links->count(),
            ]);
        }

        return view('user.index', compact('user', 'links'));
    }
}
