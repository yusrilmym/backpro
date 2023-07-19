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

    // dd($data);

    return view('content.dashboard.data')->with('data', $data);
  }

  // public function hitung(Request $request)
  // {
  //     $usianumber = $request->input('usianumber');
  //     $beratnumber = $request->input('beratnumber');
  //     $tingginumber = $request->input('tingginumber');
  //     $operator = $request->input('operator');
  //     $rubahtinggi = $tingginumber/100;
  //     $imt = $beratnumber/($rubahtinggi*$rubahtinggi);

  //     // echo $result;
  //     return redirect('/data')->with('message', ''.round($imt,1));
  // }


  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required',
      'age' => 'required',
    ]);
    // Normalisasi::create($request->all());
    $minusia = 0;
    $maxusia = 59;
    $minberat = 1.62;
    $maxberat = 32.1;
    $mintinggi = 39;
    $maxtinggi = 198;
    $minimt = 4.1;
    $maximt = 30.9;
  

    // $databaru = DB::table(['kriteria_usia' =>  $request->age])->first();
    // $databaru1 = DB::table(['kriteria_berat' => $request->berat])->first();
    // $databaru2 = DB::table(['kriteria_tinggi'=> $request->tinggi])->first();
    $databaru = DB::table('kriteria_usia')
    ->where('kriteria_usia', $request->age)->first();
    $databaru1 = DB::table('kriteria_berat')
    ->where('kriteria_berat', $request->berat)->first();
    $databaru2 = DB::table('kriteria_tinggi')
    ->where('kriteria_tinggi', round($request->tinggi,0))->first();
    
    $z1v1 = $databaru->bobot_usia;
    $z1v2 = $databaru1->bobot_berat;
    $z1v3 = $databaru2->bobot_tinggi;
    
    // $z1v1 = 0.12; //bobot
    // $z1v2 = 0.11;
    // $z1v3 = 0.036;
    // $z1v4 = 0.16;

    //2
    $wgk = 0.01;
    //3
    $wgb = 0.02;
    $normalusia = round(0.8 * ($request->age - $minusia) / ($maxusia - $minusia) + 0.1, 3);
    $normalberat = round(0.8 * ($request->berat - $minberat) / ($maxberat - $minberat) + 0.1, 3);
    $normaltinggi = round(0.8 * ($request->tinggi - $mintinggi) / ($maxtinggi - $mintinggi) + 0.1, 3);

    $hitungtinggi = $request->tinggi / 100; //bener
    $hasilimt = $request->berat / ($hitungtinggi * $hitungtinggi); //bener
    $normalimt = round(0.8 * ($hasilimt - $minimt) / ($maximt - $minimt) + 0.1, 3);

    //harus bulat
    $databaru3 = DB::table('kriteria_imt')
    ->where('kriteria_imt', round($hasilimt,0))->first();
    $z1v4 = $databaru3->bobot_imt;

    $zin1 = round(($wgk + ($normalusia * $z1v1) + ($normalberat * $z1v2) + ($normaltinggi * $z1v3) + ($normalimt * $z1v4)), 2); //z1v4 ganti v3
    $z1 = round(1 / (1 + EXP(- ($zin1))), 3);
    $ng = round(($wgb + ($z1 * $z1v1) + ($z1 * $z1v2) + ($z1 * $z1v3) + ($z1 * $z1v4)), 3);

    Normalisasi::create([
      'name' => $request->name,
      'nik' => $request->nik,
      'kelamin' => $request->kelamin,
      'tanggallahir' => date($request->tanggallahir),
      'namaortu' => $request->namaortu,
      'age' => $normalusia,
      'berat' => $normalberat,
      'tinggi' => $normaltinggi,
      'imt' => $normalimt,
      // 'age'=> round(0.8*($request->age-$minusia)/($maxusia-$minusia)+0.1,3),
      // 'berat'=> round(0.8*($request->berat-$minberat)/($maxberat-$minberat)+0.1,3),
      // 'tinggi'=> round(0.8*($request->tinggi-$mintinggi)/($maxtinggi-$mintinggi)+0.1,3),
      // 'imt'=> $hasilimt,
      'hasil' => round(1 / (1 + EXP(- ($ng))), 3)
    ]);
    return redirect('/data')
      ->with('success', 'Product Data successfully.');
  }
}
