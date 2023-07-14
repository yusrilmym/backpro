<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Normalisasi;
use DB;

class data extends Controller
{
  public function index()
  {
    // dd($lihat);
    // return view('content.dashboard.data')->with([
    //   'normalisasis' => Normalisasi::all()
    // ]);

    $data = DB::table('normalisasis')
                    ->leftjoin('data_bp', 'data_bp.id', '=', 'normalisasis.id')
                    ->get();
    
    return view('content.dashboard.data')->with('data', $data);
  }

  public function hitung(Request $request)
  {
      $usianumber = $request->input('usianumber');
      $beratnumber = $request->input('beratnumber');
      $tingginumber = $request->input('tingginumber');
      $operator = $request->input('operator');
      $rubahtinggi = $tingginumber/100;
      $imt = $beratnumber/($rubahtinggi*$rubahtinggi);

      // echo $result;
      return redirect('/data')->with('message', ''.round($imt,1));
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'age' => 'required',
  ]);
  // Normalisasi::create($request->all());
  $hitungtinggi = $request->tinggi/100;
  $imt = $request->berat/($hitungtinggi*$hitungtinggi);
  Normalisasi::create([
    'name'=> $request->name,
    'kelamin' => $request->kelamin,
    'namaortu' => $request->namaortu,
    'age'=> round(0.8*($request->age-0)/(59-0)+0.1,3),
    'berat'=> round(0.8*($request->berat-3)/(30-3)+0.1,3),
    'tinggi'=> round(0.8*($request->tinggi-48)/(120-48)+0.1,3),
    'imt'=> round(0.8*(($imt)-9.1)/(30.9-9.1)+0.1,3),
  ]);
  return redirect('/data')
                  ->with('success','Product Data successfully.');
  }
}
