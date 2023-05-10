<?php

namespace App\Http\Controllers;
use DB;
use Crypt;
use Datatables;
use Illuminate\Http\Request;

class ReportActivityController extends Controller
{
    public function index()
    {
        $data = DB::Connection('mysql')
        ->table(DB::raw("(
            select * from store_sortir
        )Z"))->get();
        return view('index')->with(compact(['data']));
    }

    public function create()
    {
        return view('create');
    }

    public function edit($no_doc)
    {
        // dd($no_doc);
        $data = DB::Connection('mysql')
        ->table(DB::raw("(
            select * from store_sortir where no_doc = '$no_doc'
        )Z"))->first();

        $qty_total = ($data->qty_ok)+($data->qty_ng);

        if (!empty($data->foto_problem)) {
            $file_temp = '';
            if (!empty($data->foto_problem)) {
                $file_temp = public_path() . DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR .$data->foto_problem;
            }
        
            if ($file_temp != '') {
                if (file_exists($file_temp)) {
                    $loc_image = file_get_contents('file:///'.str_replace("\\\\","\\",$file_temp));
                    $img_prob = "data:".mime_content_type($file_temp).";charset=utf-8;base64,".base64_encode($loc_image);
                }
            }
        } else {
            $img_prob = null;
        }
        
        // dd($data);
        return view('edit')->with(compact(['data','qty_total','img_prob']));
    }

    public function store(Request $request){
        $data = $request->all();
        $kd_supp = $data['kd_supplier'];
        // dd($data);
            try {
                // get no urut no.Doc
                $no_doc = DB::connection('mysql')
                ->table("store_sortir")
                ->where('no_doc', 'like', $kd_supp.'%')
                ->orderBy('no_doc', 'desc')
                ->value('no_doc');

                if ($no_doc == null) {
                    $no_doc = $kd_supp.'-00001';
                } else {
                    $lastincrement = substr($no_doc, -5);
                    $no_doc = $kd_supp."-". str_pad($lastincrement + 1, 5, 0, STR_PAD_LEFT);
                }
                            
                $img1 = $request->file('foto_problem');
                if(isset($img1)) {
                    $probfilename = $img1;
                    $probfilename = base64_encode($probfilename);
                    $img1->move('/uploads', $probfilename);
                } else {
                    $probfilename = null;
                }

                $img2 = $request->file('foto_activity');
                if(isset($img2)) {
                    $actfilename = $no_doc."/ACT".".". $img2;
                    $actfilename = base64_encode($actfilename);
                    $img2->move('/uploads', $actfilename);
                } else {
                    $actfilename = null;
                }

                DB::connection('mysql')
                ->table('store_sortir')
                ->insert([
                    'no_doc'=>$no_doc,
                    'kd_supplier'=>$data['kd_supplier'],
                    'nm_picsupp'=>$data['nm_picsupp'],
                    'nm_picstore'=>$data['nm_picstore'],
                    'no_barang'=>$data['no_barang'],
                    'nm_barang'=>$data['nm_barang'],
                    'model'=>$data['model'],
                    'tanggal_sortir'=>$data['tanggal_sortir'],
                    'waktu_sortir'=>$data['waktu_sortir'],
                    'problem'=>$data['problem'],
                    'qty_ok'=>$data['qty_ok'],
                    'qty_ng'=>$data['qty_ng'],
                    'qty_mp'=>$data['qty_mp'],
                    'consumable'=>$data['consumable'],
                    'ket'=>$data['ket'],
                    'foto_problem'=>$probfilename,
                    'foto_activity'=>$actfilename
                ]);
                
                DB::connection("mysql")->commit();
                $msg = "Data berhasil disimpan";
                $indctr = "1";
                return response()->json(['msg' => $msg, 'indctr' => $indctr]);
                
            }catch (Exception $ex) {
                DB::connection("mysql")->rollback();
                $msg = "Terjadi kesalahan pada :" . $ex;
                $indctr = "0";
                return response()->json(['msg' => $msg, 'indctr' => $indctr]);
            }   
            {
                return view('errors.404');
            }
    }

    public function update(Request $request, $no_doc){
        $data = $request->all();
        $no_doc = base64_decode($no_doc);
        try {

            $img1 = $request->file('foto_problem');
            if(isset($img1)) {
                $probfilename = $no_doc."/PROB".".". $img1;
                $probfilename = base64_encode($probfilename);
                $img1->move('public/uploads', $probfilename);
            } else {
                $probfilename = null;
            }

            $img2 = $request->file('foto_activity');
            if(isset($img2)) {
                $actfilename = $no_doc."/ACT".".". $img2;
                $actfilename = base64_encode($actfilename);
                $img2->move('public/uploads', $actfilename);
            } else {
                $actfilename = null;
            }

            DB::connection('mysql')
            ->table('store_sortir')
            ->where("no_doc", $no_doc)
            ->update([
                'kd_supplier'=>$data['kd_supplier'],
                'nm_picsupp'=>$data['nm_picsupp'],
                'nm_picstore'=>$data['nm_picstore'],
                'no_barang'=>$data['no_barang'],
                'nm_barang'=>$data['nm_barang'],
                'model'=>$data['model'],
                'tanggal_sortir'=>$data['tanggal_sortir'],
                'waktu_sortir'=>$data['waktu_sortir'],
                'problem'=>$data['problem'],
                'qty_ok'=>$data['qty_ok'],
                'qty_ng'=>$data['qty_ng'],
                'qty_mp'=>$data['qty_mp'],
                'consumable'=>$data['consumable'],
                'ket'=>$data['ket'],
                'foto_problem'=>$probfilename,
                'foto_activity'=>$actfilename
            ]);
            
            DB::connection("mysql")->commit();
            $msg = "Data berhasil disimpan";
            $indctr = "1";
            return response()->json(['msg' => $msg, 'indctr' => $indctr]);
            
        }catch (Exception $ex) {
            DB::connection("mysql")->rollback();
            $msg = "Terjadi kesalahan pada :" . $ex;
            $indctr = "0";
            return response()->json(['msg' => $msg, 'indctr' => $indctr]);
        }   
        {
            return view('errors.404');
        }
    }

    public function delete($no_doc)
    {
        DB::table(DB::raw("store_sortir"))
        ->where("no_doc", $no_doc)
        ->delete();
        
        return response()->json(['success' => true, 'message' => 'Data has been successfully deleted!']);
    }


}
