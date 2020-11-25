<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pertanyaan;

class Pertanyaan1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pertanyaan = pertanyaan::all();
        return view('crud.index', compact('pertanyaan'));
    }


    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.pertanyaan');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
              // dd($request->all());
      $request->validate
        ([
        'judul' => 'required|max:80:',
        'isi' => 'required'
        ]);

        $pertanyaan = pertanyaan::create([
            "judul" => $request ["judul"],
            "isi" => $request ["isi"]
        ]);

      return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil Disimpan');

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertanyaan = pertanyaan::find($id);
        return view('crud.show', compact('pertanyaan'));
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pertanyaan = pertanyaan::find($id);
        return view('crud.edit', compact('pertanyaan'));
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
        
        $request->validate
        ([
            'judul' => 'required|max:80:',
            'isi' => 'required'
        ]);
        
        $update = pertanyaan::where('id', $id)->update
        ([
            'judul' => $request ['judul'],
            'isi' => $request ['isi']
        ]);

    return redirect('/pertanyaan')->with('success', 'Berhasil update pertanyaan anda');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        pertanyaan::destroy($id);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan anda telah berhasil di hapus');
    }
}
