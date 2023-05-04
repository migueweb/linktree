<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\View;
use App\Models\Link;
use App\Models\User;
use App\Models\LinkImpression;
use Illuminate\Support\Facades\DB;

class StatsController extends Controller
{

    /**
     * Get the stats for the current user.
     *
     * @return array<int, int|string>
     */
    public static function stats()
    {

        $user = User::where('id', auth()->id())->first();

        $views = View::where('user_id',$user->id)->get()->count();
        
        $linksImpressions = LinkImpression::where('user_id',$user->id)->get()->sum('impressions');
        
        $clicks = DB::table('clicks')
                    ->join('links', 'clicks.link_id', '=', 'links.id')
                    ->where('links.user_id', $user->id)
                    ->get()->count();

        
        // Calculate the CTR
        $ctr = 0;
        if($clicks > 0 && $linksImpressions > 0){
            $ctr = round(($clicks / $linksImpressions) * 100, 2);
        }

        return [
            'views' => $views,
            'clicks' => $clicks,
            'ctr' => $ctr,
            'linksImpressions' => $linksImpressions,
        ];
    }
}
