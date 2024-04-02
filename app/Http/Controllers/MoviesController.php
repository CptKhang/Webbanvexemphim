<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movies;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movies::all();
        return view('admin.movies.index', ['movies' => $movies]);
    }
    
    public function indexuser()
    {
        $user = Auth::user();
        // dd(auth::user());
        $movies = Movies::all();
        return view('user.movies.index', ['movies' => $movies]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'MovieID' =>'unique:movie|min:4',
            'Title'=>'min:2|max:200',
       
        ]);
        $file = $request->image;
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('movies/images/movies/'), $fileName);
    
        // Update the image file name in the data array
        $data = $request->all();
        
        $data['slug'] = Str::slug($request->Title);
        $data['Image'] = $fileName; // Gán tên file ảnh vào trường Image
        //dd($data);
         Movies::create($data);
         return redirect('/admin/movies');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Movies::findorfail($id);
        
        return view('user.movies.show',['s'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Movies::findorfail($id);
        return view('admin.movies.edit',['data'=>$data]);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $o = Movies::findorfail($id);
        $o->Title = $request->Title;
        $o->Genne = $request->Genre;
        $o->save();
        return redirect('/admin/movies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $o = Movies::findorfail($id);
        $o -> delete();
        return redirect('/admin/movies');
    }
}
