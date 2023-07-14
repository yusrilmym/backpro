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
        //hidden layer 1
        $z1v1 = 0.27;
        $z2v1 = 0.17;
        $z3v1 = 0.83;
        $z4v1 = 0.38;
        //2
        $z1v2 = 0.45;
        $z2v2 = 0.44;
        $z3v2 = 0.51;
        $z4v2 = 0.47;
        //3
        $z1v3 = 0.16;
        $z2v3 = 0.75;
        $z3v3 = 0.32;
        $z4v3 = 0.13;
        //4
        $z1v4 = 0.35;
        $z2v4 = 0.37;
        $z3v4 = 0.9;
        $z4v4 = 0.26;
        //5
        $z1v5 = 0.25;
        $z2v5 = 0.27;
        $z3v5 = 0.33;
        $z4v5 = 0.53;
        //6
        $z1v6 = 0.12;
        $z2v6 = 0.26;
        $z3v6 = 0.72;
        $z4v6 = 0.83;

        //hol 1
        $w1gz = 0.43;
        $w2gz = 0.11;
        $w3gz = 0.12;   
        $w4gz = 0.23;       
        $w5gz = 0.38;       
        $w6gz = 0.42;       
        //2
        $w1gk = 0.17;
        $w2gk = 0.9;
        $w3gk = 0.26;
        $w4gk = 0.53;
        $w5gk = 0.83;
        $w6gk = 0.37;
        //3
        $w1gb = 0.23;
        $w2gb = 0.18;	
        $w3gb = 0.25;
        $w4gb = 0.32;
        $w5gb = 0.35;
        $w6gb = 0.41;
        //4
        $w1bg = 0.52;	
        $w2bg = 0.6;	
        $w3bg = 0.78;
        $w4bg = 0.18;	
        $w5bg = 0.21;	
        $w6bg = 0.27;
        //5
        $w1gl = 0.28;	
        $w2gl = 0.81;
        $w3gl = 0.73;
        $w4gl = 0.62;
        $w5gl = 0.58;
        $w6gl = 0.55;
        //6
        $w1o = 0.19;
        $w2o = 0.43;
        $w3o = 0.14;
        $w4o = 0.67;
        $w5o = 0.76;
        $w6o = 0.39;

        //bias
        $Vj1 = 0.73;
        $Vj2 = 0.81;
        $Vj3 = 0.66;
        $Vj4 = 0.57;
        $Vj5 = 0.42;
        $Vj6 = 0.38;

        //bias output
        $wj1 = 0.11;
        $wj2 = 0.28;
        $wj3 = 0.52;
        $wj4 = 0.77;
        $wj5 = 0.2;
        $wj6 = 0.67;

        $listdata = [
        'zin1' => round($Vj1+($usiabackpro*$z1v1)+($beratbackpro*$z2v1)+($tinggibackpro*$z3v1)+($imtbackpro*$z4v1),5),
        'zin2' => round($Vj2+($usiabackpro*$z1v2)+($beratbackpro*$z2v2)+($tinggibackpro*$z3v2)+($imtbackpro*$z4v2),5),
        'zin3' => round($Vj3+($usiabackpro*$z1v3)+($beratbackpro*$z2v3)+($tinggibackpro*$z3v3)+($imtbackpro*$z4v3),5),
        'zin4' => round($Vj4+($usiabackpro*$z1v4)+($beratbackpro*$z2v4)+($tinggibackpro*$z3v4)+($imtbackpro*$z4v4),5),
        'zin5' => round($Vj5+($usiabackpro*$z1v5)+($beratbackpro*$z2v5)+($tinggibackpro*$z3v5)+($imtbackpro*$z4v5),5),
        'zin6' => round($Vj6+($usiabackpro*$z1v6)+($beratbackpro*$z2v6)+($tinggibackpro*$z3v6)+($imtbackpro*$z4v6),5),
        ];

        $listdata2 = [
        'z1' => round(1/(1+EXP(-($listdata['zin1']))),9),
        'z2' => round(1/(1+EXP(-($listdata['zin2']))),9),
        'z3' => round(1/(1+EXP(-($listdata['zin3']))),9),
        'z4' => round(1/(1+EXP(-($listdata['zin4']))),9),
        'z5' => round(1/(1+EXP(-($listdata['zin5']))),9),
        'z6' => round(1/(1+EXP(-($listdata['zin6']))),9),
        ];
        // echo $z1;
        $listdata3 = [
            'ng' => round($wj1+(($listdata2['z1'])*$w1gz)+(($listdata2['z2'])* $w2gz)+(($listdata2['z3'])* $w3gz)+(($listdata2['z4'])* $w4gz)+(($listdata2['z5'])+ $w5gz)+(($listdata2['z6'])+ $w6gz),9),
            'ngk' => round($wj2+(($listdata2['z1'])*$w1gk)+(($listdata2['z2'])* $w2gk)+(($listdata2['z3'])* $w3gk)+(($listdata2['z4'])* $w4gk)+(($listdata2['z5'])* $w5gk)+(($listdata2['z6'])* $w6gk),9),
            'ngb' => round($wj3+(($listdata2['z1'])*$w1gb)+(($listdata2['z2'])* $w2gb)+(($listdata2['z3'])* $w3gb)+(($listdata2['z4'])* $w4gb)+(($listdata2['z5'])* $w5gb)+(($listdata2['z6'])* $w6gb),9),
            'ngz' => round($wj4+(($listdata2['z1'])*$w1bg)+(($listdata2['z2'])* $w2bg)+(($listdata2['z3'])* $w3bg)+(($listdata2['z4'])* $w4bg)+(($listdata2['z5'])* $w5bg)+(($listdata2['z6'])* $w6bg),9),
            'ngl' => round($wj5+(($listdata2['z1'])*$w1gl)+(($listdata2['z2'])* $w2gl)+(($listdata2['z3'])* $w3gl)+(($listdata2['z4'])* $w4gl)+(($listdata2['z5'])* $w5gl)+(($listdata2['z6'])* $w6gl),9),
            'ngo' => round($wj6+(($listdata2['z1'])*$w1o)+(($listdata2['z2'])* $w2o)+(($listdata2['z3'])* $w3o)+(($listdata2['z4'])* $w4o)+(($listdata2['z5'])* $w5o)+(($listdata2['z6'])* $w6o),9),
        ];

        $listdata4 = [
            'ngas' => round(1/(1+EXP(-($listdata3['ng']))),3),
            'ngkas' => round(1/(1+EXP(-($listdata3['ngk']))),3),
            'ngbas' => round(1/(1+EXP(-($listdata3['ngb']))),3),
            'ngzas' => round(1/(1+EXP(-($listdata3['ngz']))),3),
            'nglas' => round(1/(1+EXP(-($listdata3['ngl']))),3),
            'ngoas' => round(1/(1+EXP(-($listdata3['ngo']))),3),
        ];

        $listdata5 = [
          'inipusing1' => round($listdata4['ngas']+1,3),
        ];
      
        
        //   return redirect('/backpro')->with($listdata);
          return redirect('/backpro')->with($listdata)->with($listdata2)->with($listdata3)->with($listdata4);
        //   return redirect('/backpro')->with('z2', $z2);
    }
}
