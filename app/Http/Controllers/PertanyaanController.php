<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PertanyaanController extends Controller
{

    public function create() 
    {
        return view('crud.pertanyaan');
    }

    public function store(Request $request) 
    {
      // dd($request->all());
      $request->validate([
            'judul' => 'required|max:80:',
            'isi' => 'required'
      ]);

      $query = DB::table('pertanyaan')->insert([
          "judul" => $request["judul"],
          "isi" => $request["isi"]
          ]);

          return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil Disimpan');
    }

    
    public function index() 
    {
        $pertanyaan= DB::table('pertanyaan')->get();
        //dd($pertanyaan);
        return view('crud.index', compact('pertanyaan'));
    }

    public function show($id) 
    {
        $pertanyaan= DB::table('pertanyaan')->where('id', $id)->first();
        //dd($pertanyaan);
        return view('crud.show', compact('pertanyaan'));
    }

    public function edit($id) 
    {
        $pertanyaan= DB::table('pertanyaan')->where('id', $id)->first();
        //dd($pertanyaan);
        return view('crud.edit', compact('pertanyaan'));
    }

    public function update($id, Request $request) 
    {
        $request->validate([
            'judul' => 'required|max:80:',
            'isi' => 'required'
        ]);

    $query = DB::table('pertanyaan')
            ->where('id', $id)
            ->update ([
                'judul' => $request['judul'],
                'isi' => $request['isi']
    ]);
    return redirect('/pertanyaan')->with('success', 'Berhasil update pertanyaan anda');

    }

    public function destroy($id) 
    {
        $query= DB::table('pertanyaan')->where('id', $id)->delete();
        return redirect('/pertanyaan')->with('success', 'Pertanyaan anda telah berhasil di hapus');
    }


}