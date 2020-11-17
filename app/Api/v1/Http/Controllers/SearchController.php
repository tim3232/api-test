<?php

namespace App\Api\v1\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function get_repo(Request $request){
        $pageStart = $request->from;
        $searchQuery = $request->search_query;
        $perPage = 3;
        $queryUrl  = 'https://api.github.com/search/repositories?q='.$searchQuery.'&sort=stars&order=desc&page='.$pageStart.'&per_page='.$perPage.'';
        $agent = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36';
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_USERAGENT => $agent
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $items = json_decode($response, true);
        $countAllFindRepos = $items['total_count'];

        if($countAllFindRepos>0 && $pageStart <= (int)($countAllFindRepos/$perPage) && $pageStart * $perPage < 1000 ){  //GITHUB API LIMIT 1000
            $viewCardRepo = view('card',['items' => $items['items']])->render();
            return response()->json($viewCardRepo);
        }

    }
}
