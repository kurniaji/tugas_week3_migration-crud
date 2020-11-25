<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Pertanyaan;

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
            'judul' => 'required|unique:pertanyaan|max:80:',
            'isi' => 'required'
      ]);
    
    //Menyimpan Data Dengan Memakai Querry
    //   $query = DB::table('pertanyaan')->insert([
    //       "judul" => $request["judul"],
    //       "isi" => $request["isi"]
    //       ]);
    
    //Menyimpan Data Dengan Memakai ORM satu persatu
    // $pertanyaan = new pertanyaan;
    // $pertanyaan->judul = $request['judul'];
    // $pertanyaan->isi = $request['isi'];
    // $pertanyaan->save();

    //Menyimpan Data Dengan Memakai ORM Mass Assignment/ Banyak Sekaligus        
    $pertanyaan = pertanyaan::create([
        "judul" => $request ["judul"],
        "isi" => $request ["isi"]
    ]);

          return redirect('/pertanyaan')->with('success', 'Pertanyaan Berhasil Disimpan');
    }

    
    public function index() 
    {
        //Memunculkan data di index dengan querry
        //$pertanyaan= DB::table('pertanyaan')->get();

        //Memunculkan data di index dengan ORM
        $pertanyaan = pertanyaan::all();
        return view('crud.index', compact('pertanyaan'));
    }

    public function show($id) 
    {
        //Memunculkan data salah satu tabel spesifik di index dengan querry
        //$pertanyaan= DB::table('pertanyaan')->where('id', $id)->first();

        //Memunculkan data salah satu tabel spesifik di index dengan ORM
        $pertanyaan = pertanyaan::find($id);
        return view('crud.show', compact('pertanyaan'));
    }

    public function edit($id) 
    {
        //$pertanyaan= DB::table('pertanyaan')->where('id', $id)->first();
        //dd($pertanyaan);
        $pertanyaan = pertanyaan::find($id);
        return view('crud.edit', compact('pertanyaan'));
    }


    public function update($id, Request $request) 
    {
            $request->validate([
                'judul' => 'required|max:80:',
                'isi' => 'required'
            ]);

    //MeNGEDIT data salah satu tabel spesifik di index dengan querry
        // $query = DB::table('pertanyaan')
        //         ->where('id', $id)
        //         ->update ([
        //             'judul' => $request['judul'],
        //             'isi' => $request['isi']
        // ]);
        
    //MeNGEDIT data salah satu tabel spesifik di index dengan ORM
        $update = pertanyaan::where('id', $id)->update([
            'judul' => $request ['judul'],
            'isi' => $request ['isi']
        ]);

        return redirect('/pertanyaan')->with('success', 'Berhasil update pertanyaan anda');

    }


    public function destroy($id) 
    {
    //MeNGHAPUS data salah satu tabel spesifik di index dengan Querry
        //$query= DB::table('pertanyaan')->where('id', $id)->delete();

    //MeNGHAPUS data salah satu tabel spesifik di index dengan ORM
        pertanyaan::destroy($id);
        return redirect('/pertanyaan')->with('success', 'Pertanyaan anda telah berhasil di hapus');
    }


}