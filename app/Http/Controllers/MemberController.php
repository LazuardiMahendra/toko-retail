<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function listProduk(Request $request){
        $data['cart'] = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE id_customer=? 
                        AND status_transaksi='pending'", [$request->session()->get('s_id_user')]);

        $data['id_produk'] = DB::select("SELECT t_produk.id_produk, t_produk.nama_produk, t_produk.harga, 
        t_produk.stok, t_kategori.nama_kategori, t_supplier.nama_supplier, foto, t_produk.tgl_masuk 
        FROM t_produk 
        JOIN t_kategori ON t_produk.id_kategori=t_kategori.id_kategori
        JOIN t_supplier ON t_produk.id_supplier=t_supplier.id_supplier", []);
                          return view('member_list-produk', $data);
    }

    public function apiSearchProduct(Request $request){
        $result  = DB::table('t_produk')
                     ->select('t_produk.id_produk', 't_produk.nama_produk', 't_produk.foto', 't_produk.harga', 't_produk.stok', 't_kategori.nama_kategori AS kategori')
                     ->join('t_kategori', 't_produk.id_kategori', '=', 't_kategori.id_kategori')
                     ->where('t_produk.nama_produk', 'like', '%' . $request->input('keyword') . '%')
                     ->get();
         return response($result);
    }

    public function cart(Request $request){
        //cek nota telah dibuat atau belum
        //berikan filter berdasarkan user tertentu bila ingin berbelanja dengan akun tertentu
        $nota = DB::selectOne("SELECT *, 10/100 * total as jml FROM nota where status_transaksi='pending' 
        AND jenis_faktur='penjualan' AND id_customer=?", [
                    $request->session()->get('s_id_user')
                ]);

                if($nota != null) { // echo "Nota Exist";
                    // jika akses keranjang melalui informasi menu
                    if($request->get('produkId') == null){
                        $cartExist['cart'] = DB::select("SELECT * FROM t_keranjang WHERE nota_id=?", [$nota->id]);
                        $nota = (object)array_merge((array)$nota, (array)$cartExist);
                    }else{
                        //cek apakah produk sudah ada ada dikranjang
                        $chart = DB::selectOne("SELECT COUNT(*) AS jumlah_produk_dibeli FROM t_keranjang WHERE nota_id=? AND produk_id=?",[
                            $nota->id,
                            $request->get('produkId')
                        ]);

                        //produk belum ada dikeranjang
                        if($chart->jumlah_produk_dibeli == 0) {
                            //insert to keranjang
                            $produk = DB::selectOne("SELECT id_produk, nama_produk, harga FROM t_produk WHERE id_produk=?", [
                                $request->get('produkId')
                            ]);
                            DB::insert("INSERT INTO t_keranjang (nama_produk, harga_satuan, kuantitas, subtotal, nota_id, produk_id) 
                            VALUES (?, ?, ?, ?, ?, ?)", [
                                $produk->nama_produk, $produk->harga, 1, $produk->harga * 1,
                                $nota->id, $request->get('produkId')
                            ]);
                            $cartExist['cart'] = DB::select("SELECT * FROM t_keranjang WHERE nota_id=?", [$nota->id]);
                            $nota = (object)array_merge((array)$nota, (array)$cartExist);
                        }else{
                            //produk sudah ada di keranjang
                            $cartExist['cart'] = DB::select("SELECT * FROM t_keranjang WHERE nota_id=?", [$nota->id]);
                            $nota = (object)array_merge((array)$nota, (array)$cartExist);
                        }
                    }
                }else{
                    DB::insert("INSERT INTO nota(id_customer, nama_customer, total, ppn, tagihan, jenis_faktur, status_transaksi)
                                VALUES (?, ?, 0.00, 10.00, 0.00, 'penjualan', 'pending')", [
                                    $request->session()->get('s_id_user'),
                                    $request->session()->get('s_nama_user')
                                ]);
                    return redirect('/member/cart?produkId='. $request->get('produkId'));
                }

        $data['cart'] = DB::selectOne("SELECT COUNT(*) AS jumlah_keranjang FROM nota WHERE id_customer=?
                                        AND status_transaksi='pending'", [$request->session()->get('s_id_user')]);
        $data['nota'] = $nota;
        $data['tanggal'] = date('d-m-y H:i:s');
                            return view('member_nota', $data);
    }


    public function plus (Request $request) {
        DB::update("UPDATE t_keranjang SET kuantitas = kuantitas + 1,  subtotal = subtotal + harga_satuan WHERE produk_id=?",
         [$request->get('produkId')]);
        DB::update("UPDATE nota SET total = (SELECT sum(subtotal) from t_keranjang), 
        tagihan = (10/100 * total) + total WHERE status_transaksi='pending' AND jenis_faktur='penjualan'");
        return Redirect('/member/cart');

    }

    public function minus (Request $request) {
        DB::update("UPDATE t_keranjang SET kuantitas = kuantitas - 1, subtotal = subtotal - harga_satuan WHERE produk_id=?", 
        [$request->get('produkId')]);
        DB::update("UPDATE nota SET total = (SELECT sum(subtotal) from t_keranjang), 
        tagihan = (10/100 * total) + total WHERE status_transaksi='pending' AND jenis_faktur='penjualan'");
        return Redirect('/member/cart');
    }

    public function checkout(Request $request){
        DB::delete("DELETE FROM t_keranjang WHERE nota_id=?", [$request->get('notaId')]);
        DB::update("UPDATE nota SET status_transaksi='success' WHERE id=?", [$request->get('notaId')]);
        return redirect('/member');
    }
    
    public function index(Request $request){
        if($request->session()->get('s_status') == "member"){
            $data['session'] = array(
                'id_user' => $request->session()->get('s_id_user'),
                'nama_user' => $request->session()->get('s_nama_user'),
                'status' => $request->session()->get('s_status'),
                'email' => $request->session()->get('s_email'),
                'hp' => $request->session()->get('s_hp'),
                'alamat' => $request->session()->get('s_alamat'),
                'role' => $request->session()->get('s_role'),
            );
            return view ('member_index',$data);
        }else{
            return redirect('/login');
        }
    }
    
    public function about(){
        return view ('member_about');
    }

    public function contact(){
        return view ('member_contact');
    }
}