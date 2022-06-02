<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiFormatter;
use App\Http\Controllers\Controller;
use App\Models\Buku;
use Exception;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Buku::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Data Not Found');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_buku' => 'required',
                'jenis_buku' => 'required',
                'nama_buku' => 'required',
                'penerbit' => 'required',
            ]);

            $buku = buku::create([
                'kode_buku' => $request->kode_buku,
                'jenis_buku' => $request->jenis_buku,
                'nama_buku' => $request->nama_buku,
                'penerbit' => $request->penerbit,
            ]);

            $data = buku::where('id', '=', $buku->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Data Not Found');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Data Not Found');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Buku::where('id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, 'Data Not Found');
        }
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
        try {
            $request->validate([
                'kode_buku' => 'required',
                'jenis_buku' => 'required',
                'nama_buku' => 'required',
                'penerbit' => 'required',
            ]);

            $buku = Buku::findOrFail($id);

            $buku->update([
                'kode_buku' => $request->kode_buku,
                'jenis_buku' => $request->jenis_buku,
                'nama_buku' => $request->nama_buku,
                'penerbit' => $request->penerbit,
            ]);

            $data = Buku::where('id', '=', $buku->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success', $data);
            } else {
                return ApiFormatter::createApi(400, 'Data Not Found');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Data Not Found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);

        $data = $buku->delete();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success delete data');
        } else {
            return ApiFormatter::createApi(400, 'Data Not Found');
        }
    }
}
