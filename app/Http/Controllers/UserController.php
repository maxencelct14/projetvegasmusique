<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

use App\Models\{Musique, Playlist};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index($titreplay=null)
  //  {
        //si le nom de la musique est renseigné, on récupère tous les playlists avec cette musique, sinon on récupère tous les playlists
       // $query = $titreplay ? Playlist::where('titreplay',$titreplay)->firstOrFail()->users() :User::query();
        //$users=$query->orderBy('id')->get();
       // $playlists=User::all();
     //   return view('playlist/index',compact('users','playlists','titreplay'));
   // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $musiques=Musique::all();
        return view('playlist/create', compact('musiques'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaylistRequest $request, Playlist $playlist)
    {
        $playlist = Playlist::create($request->all());
        $playlist->musiques()->attach($request->perss);
        return redirect()->route('playlist.index')->with('info', 'Playlist ' . $playlist->titreplay . ' créé');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Playlist $playlist)
    {
        return view('playlist/show', compact('playlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Playlist $playlist)
    {
        $musiques = Musique::all();
        return view('playlist/edit', compact('playlist', 'musiques'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaylistRequest $request, Playlist $playlist)
    {
        $playlist->update($request->all());
        $playlist->musiques()->sync($request->perss);
        return redirect()->route('playlist.index')->with('info', 'La playlist a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Playlist $playlist)
    {
        $playlist->delete();
        return redirect()->route('playlist.index')->with('info', 'La playlist a bien été suprimé');
    }
}

