<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    /**
     * Store a newly created link in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:60',
            'url' => 'required|url|max:255',
        ]);

        Link::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'url' => $request->url,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Show the form for editing the specified link.
     *
     * @param Link $link
     * @return void
     */
    public function edit(Link $link)
    {
        return view('links.edit', compact('link'));
    }

    /**
     * Update the specified link in storage.
     *
     * @param Request $request
     * @param Link $link
     * @return void
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'title' => 'required|max:60',
            'url' => 'required|url|max:255',
        ]);

        $link->update([
            'title' => $request->title,
            'url' => $request->url,
        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Undocumented function
     *
     * @param Link $link
     * @return void
     */
    public function destroy(Link $link)
    {
        $link->delete();
        return redirect()->route('dashboard');
    }
}
