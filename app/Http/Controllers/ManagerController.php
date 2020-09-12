<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Charts;

class ManagerController extends Controller
{
    public function __construct(){
        $this->pages = array();
    }

    public function index(Request $request){
        if($request->session()->get('s_status') == "manager"){
            $data['session'] = array(
                'id_user' => $request->session()->get('s_id_user'),
                'nama_user' => $request->session()->get('s_nama_user'),
                'status' => $request->session()->get('s_status'),
                'email' => $request->session()->get('s_email'),
                'hp' => $request->session()->get('s_hp'),
                'alamat' => $request->session()->get('s_alamat'),
                'role' => $request->session()->get('s_role'),
            );
        $data['quality_t']=DB::selectOne("SELECT sum(quantity) as qt FROM item_sell");
        $data['quality_w']=DB::selectOne("SELECT sum(quantity) as qw FROM item_sell WHERE YEARWEEK(`date`, 1) = YEARWEEK(CURDATE(), 1) ");
        $data['member_t']=DB::selectOne("SELECT count(t_role_id) as t_user FROM t_user WHERE t_role_id = 3");
        $data['earning_t']=DB::selectOne("SELECT sum(total) as total FROM item_sell");

        $data['kategori']=DB::select("SELECT nama_kategori FROM t_kategori");

        $data['month_s'] = DB::selectOne("SELECT MONTHNAME(date) as namabulan FROM item_sell");
        $data['earning_s']=DB::selectOne("SELECT sum(total) as total FROM item_sell WHERE date = date");

        $data['all'] = DB::select("SELECT * FROM item_sell WHERE quantity > 0");
        return view ('manager_index', $data);
    }else{
        return redirect('/login');
            }
    }

    public function chart(){
        $data = DB::table('item_sell')
                -> select(
                    DB::raw("MONTHNAME(date) as namabulan"),
                    DB::raw("sum(quantity) as total")
                )
                -> groupBy('namabulan')
                -> orderBy ('date', 'ASC')
                -> get();
        return response()->json($data);
    }

    public function percent(){
        $data =  DB::table('t_produk')
        ->select(
            DB::raw("COUNT(id_kategori) as kategori"),
            DB::raw("id_kategori")
        )
        ->join('item_sell', 't_produk.nama_produk', '=', 'item_sell.produkName')
        ->groupBy('id_kategori')
        ->get();
        return response()->json($data);
    }

}
