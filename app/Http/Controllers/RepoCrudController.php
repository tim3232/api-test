<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Repo;
use Illuminate\Support\Facades\Auth;

class RepoCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('show');
    }

    public function favorite(){
        $user = Auth::user();
        $favotiteRepos = $user->repos()->paginate(3);
        return view('favorite',['items' => $favotiteRepos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        parse_str($request->form_data, $output);
        $user = Auth::user();
        Repo::create($output + ['user_id' => $user->id]);
        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedRepo = Repo::find($id);
        $deletedRepo->delete();
        return redirect()->route('favorite-repos');
    }
}
