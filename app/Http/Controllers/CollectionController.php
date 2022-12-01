<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('koleksi.daftarKoleksi', ['collection' => Collection::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:255', 'unique:collections'],
            'jenisKoleksi' => ['required', 'gt:0'],
            'jumlahKoleksi' => ['required', 'gt:0'],
        ],
            [
                'nama.unique' => 'Nama koleksi tersebut sudah ada',
            ]);

        $koleksi = [
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahAwal' => $request->jumlahKoleksi,
            'jumlahSisa' => $request->jumlahKoleksi,
            'jumlahKeluar' => 0,
        ];

        DB::table('collections')->insert($koleksi);
        return view('koleksi.daftarKoleksi');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return view('koleksi.infoKoleksi', compact('collection'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $request->validate([
            'namaKoleksi' => 'required|string',
            'jenisKoleksi' => 'required|numeric|gt:0',
            'jumlahKeluar' => 'required|gt:0',
        ]);

        $collection->update([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahSisa' => $collection->jumlahAwal - $request->jumlahKeluar,
            'jumlahKeluar' => $request->jumlahKeluar,
        ]);

        return to_route("koleksi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }

    public function getAllCollections()
    {
        $collection = DB::table('collections')
            ->select(
                'id as id',
                'namaKoleksi as judul',
                DB::raw('
            (CASE
            WHEN jenisKoleksi="1" THEN "Buku"
            WHEN jenisKoleksi="2" THEN "Majalah"
            WHEN jenisKoleksi="3" THEN "Cakram Digital"
            END) AS jenis
            '),
                'jumlahAwal as jumlahAwal',
                'jumlahSisa as jumlahSisa',
                'jumlahKeluar as jumlahKeluar',
            )
            ->orderBy('judul', 'asc')
            ->get();

        return Datatables::of($collection)
            ->addColumn('action', function ($collection) {
                $html = '
            <a href ="' . url('koleksiView') . "/" . $collection->id . '">
            <i class="fa fa-edit"></i>
            </a>';
                return $html;
            })
            ->make(true);
    }
}
