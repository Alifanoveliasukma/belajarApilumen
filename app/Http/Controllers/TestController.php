<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {     
        $penerbit = Penerbit::all();
        return response()->json($penerbit, 200);
    }

    public function books()
    {
        // $books = Book::join('penerbit', 'penerbit.id', '=', 'book.penerbit_id')->get();
        $books = DB::table('book')->select('book.*', 'penerbit.name as nama_penerbit')->join('penerbit', 'penerbit.id', '=', 'book.penerbit_id')->get();

        // $books = DB::table('book')
        //         ->join('penerbit', 'penerbit.id', '=', 'book.penerbit_id')
        //         ->get();

        // $books = Book::all();

        return response()->json($books);

    }

    public function create(Request $r)
    {
        $books = Book::create([
            'name' => $r->name,
            'price' => $r->price,
            'desc' => $r->desc,
            'penerbit_id' => $r->penerbit_id,
            'status' => $r->status
        ]);
        
        return response()->json($books);
    }

    public function getById($id)
    {
        $books = DB::table('book as a')->select('a.*', 'b.name as nama_penerbit')->join('penerbit as b', 'b.id', '=', 'a.penerbit_id')->where('a.id', $id)->first();

        return response()->json($books);
    }

    public function update(Request $r)
    {
        $books = Book::find($r->id)->update([
            'name' => $r->name,
            'price' => $r->price,
            'desc' => $r->desc,
            'penerbit_id' => $r->penerbit_id,
            'status' => $r->status
        ]);

        return response()->json($books, 200);
    }

    

    public function delete(Request $r)
    {
        $books = Book::find($r->id)->delete();
        return response()->json("Data berhasil dihapus");
    }

    //
}
