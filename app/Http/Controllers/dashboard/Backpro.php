<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Normalisasi;
use DB;

class Backpro extends Controller
{
  public function index()
  {
    // dd($lihat);
    $databackpro = DB::table('normalisasis')
    ->join('data_bp', 'data_bp.id', '=', 'normalisasis.id')
    ->get();
    
    // $testing = DB::table('data_bp')->get();

    // dd($databackpro);
    return view('content.dashboard.backpro')->with('databackpro', $databackpro);
  }

  public function hitung(Request $request)
  {
      $usiabackpro = $request->input('usiabackpro');
      $beratbackpro = $request->input('beratbackpro');
      $tinggibackpro = $request->input('tinggibackpro');
      $imtbackpro = $request->input('imtbackpro');
        //normalisasi
        $minusia = 0;
        $maxusia = 59;
        $minberat = 1.62;
        $maxberat = 32.1;
        $mintinggi = 39;
        $maxtinggi = 198;
        $minimt = 4.1;
        $maximt = 30.1;
        //rumus
        $normalusia = round(0.8*($usiabackpro-$minusia)/($maxusia-$minusia)+0.1,3);
        $normalberat = round(0.8*($beratbackpro-$minberat)/($maxberat-$minberat)+0.1,3);
        $normaltinggi = round(0.8*($tinggibackpro-$mintinggi)/($maxtinggi-$mintinggi)+0.1,3);
        $normalimt = round(0.8*($imtbackpro-$minimt)/($maximt-$minimt)+0.1,3);

        //hidden layer 1
        $z1v1 = 0.12;
        $z1v2 = 0.11;
        $z1v3 = 0.036;
        $z1v4 = 0.16;
         
        //2
        $wgk = 0.01;
        //3
        $wgb = 0.02;


        $zin1 = round(($wgk+($normalusia*$z1v1)+($normalberat*$z1v2)+($normaltinggi*$z1v3)+($normalimt* $z1v4)),2);
        $z1 = round(1/(1+EXP(-($zin1))),3);
        $ng = round(($wgb+($z1*$z1v1)+($z1*$z1v2)+($z1*$z1v3)+($z1*$z1v4)),3);
        $ngas = round(1/(1+EXP(-($ng))),3);

        // $listdata2 = [
        // 'z1' => round(1/(1+EXP(-($listdata['zin1']))),9),
        // 'z2' => round(1/(1+EXP(-($listdata['zin2']))),9),
        // 'z3' => round(1/(1+EXP(-($listdata['zin3']))),9),
        // 'z4' => round(1/(1+EXP(-($listdata['zin4']))),9),
        // 'z5' => round(1/(1+EXP(-($listdata['zin5']))),9),
        // 'z6' => round(1/(1+EXP(-($listdata['zin6']))),9),
        // ];
        
        //   return redirect('/backpro')->with($listdata)->with($listdata2)->with($listdata3)->with($listdata4);
          return redirect('/backpro')->with(['zin1' => $zin1, 'z1' => $z1,'ng' => $ng, 'ngas'=> $ngas ]);
        //   return redirect('/backpro')->with('z2', $z2);
    }
}
