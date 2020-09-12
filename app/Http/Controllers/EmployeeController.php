<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Gambar;
use PDF;
class EmployeeController extends Controller
{
    public function __construct(){
        $this->pages = array();
    }

    public function index(Request $request){
        if($request->session()->get('s_status') == "employee"){
            $data['session'] = array(
                'id_user' => $request->session()->get('s_id_user'),
                'nama_user' => $request->session()->get('s_nama_user'),
                'status' => $request->session()->get('s_status'),
                'email' => $request->session()->get('s_email'),
                'hp' => $request->session()->get('s_hp'),
                'alamat' => $request->session()->get('s_alamat'),
                'role' => $request->session()->get('s_role'),
            );
            return view ('employee_index',$data);
        }else{
            return redirect('/login');
        }
        
    }

    public function signOut(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    //produk
    //tampil
    public function produk(){
        $data['id_produk'] = DB::select("SELECT t_produk.id_produk, t_produk.nama_produk, t_produk.harga, 
        t_produk.stok, t_kategori.nama_kategori, t_supplier.nama_supplier, foto, t_produk.tgl_masuk 
        FROM t_produk 
        JOIN t_kategori ON t_produk.id_kategori=t_kategori.id_kategori
        JOIN t_supplier ON t_produk.id_supplier=t_supplier.id_supplier");
        return view ('Produk_Index', $data);
    }
    //add produk 
    public function ProdukAdd(){
        $data['t_kategori']=DB::select("SELECT * FROM t_kategori");
        $data['t_supplier']=DB::select("SELECT * FROM t_supplier");
        $data['id_produk'] = "Form Add Produk";
        return view ('Produk_Add', $data);
    }
        //add produk post
        public function ProdukAddPost(Request $request){
            $method = $request->method();
            if($method == "POST"){
                $directory  ='/assets/produk/';
                $file       =$request->file('file');
                            $file->move($directory, $file->getClientOriginalName());

                            DB::insert("INSERT INTO t_produk (id_produk, nama_produk, harga, stok, id_kategori, 
                            id_supplier, foto, tgl_masuk) VALUES (?,?,?,?,?,?,?,?)", [
                                $request->input('id_produk'),
                                $request->input('nama_produk'),
                                $request->input('harga'),
                                $request->input('stok'),
                                $request->input('id_kategori'),
                                $request->input('id_supplier'),
                                $directory."/".$file->getClientOriginalName(),
                                $request->input('tgl_masuk')
                            ]);
                    return redirect('/employee/produk');
                }else{
                    return redirect('/employee/produk');
                }
            }
        //edit produk 
        public function ProdukEdit($id){
            $data['t_kategori']=DB::select("SELECT * FROM t_kategori");
            $data['t_supplier']=DB::select("SELECT * FROM t_supplier");
            $data['id_produk'] = DB::selectOne("SELECT * FROM t_produk WHERE id_produk=?", [$id]);
            return view ('produk_edit', $data);
        }
        //edit produk post
        public function ProdukEditPost(Request $request){
            $method = $request->method();
            if($method == "POST"){
                $directory  ='/assets/produk/';
                $file       =   $request->file('file');
                                $file->move($directory, $file->getClientOriginalName());
                            
                            DB::update("UPDATE t_produk SET nama_produk=?, harga=?, stok=?, id_kategori=?, id_supplier=?,
                            foto=?, tgl_masuk=? WHERE id_produk=?", [
                            $request->input('nama_produk'),
                            $request->input('harga'),
                            $request->input('stok'),
                            $request->input('id_kategori'),
                            $request->input('id_supplier'),
                            $request->$directory."/assets/produk/".$file->getClientOriginalName(),
                            $request->input('tgl_masuk'),
                            $request->input('id_produk')
                            ]);
                        return redirect('/employee/produk');
                    }else{
                        return redirect('/employee/produk');
                }
        }
            //delete produk
            public function ProdukDelete($id){
                DB::delete("DELETE FROM t_produk WHERE id_produk=?", [$id]);
                return redirect('/employee/produk');
            }

        //reporting produk
        public function previewPdf(){
            $data['produk'] = DB::select("SELECT t_produk.id_produk, t_produk.nama_produk, t_produk.harga, 
            t_produk.stok, t_kategori.nama_kategori, t_supplier.nama_supplier, t_produk.tgl_masuk 
            FROM t_produk 
            JOIN t_kategori ON t_produk.id_kategori=t_kategori.id_kategori
            JOIN t_supplier ON t_produk.id_supplier=t_supplier.id_supplier");
            $pdf            = PDF::loadview('Reporting-wrap',$data);
                              return $pdf->stream();
    
        }
        public function printPdf(){
            $data['produk'] = DB::select("SELECT t_produk.id_produk, t_produk.nama_produk, t_produk.harga, 
            t_produk.stok, t_kategori.nama_kategori, t_supplier.nama_supplier, t_produk.tgl_masuk 
            FROM t_produk 
            JOIN t_kategori ON t_produk.id_kategori=t_kategori.id_kategori
            JOIN t_supplier ON t_produk.id_supplier=t_supplier.id_supplier");
            $pdf            = PDF::loadview('Reporting-wrap',$data);
                              return $pdf->download('reporting-file.pdf');
    
        }
            
            
            //kategori
            //tampil
            public function kategori(){
                $data['id_kategori'] = DB::select("SELECT * FROM t_kategori");
                return view ('Kategori_Index', $data);
            }
            //add kategori 
            public function KategoriAdd(){
                $data['id_kategori'] = "Form Add Kategori";
                return view ('Kategori_Add', $data);
            }
            //add kategori post
            public function KategoriAddPost(Request $request){
                $method = $request->method();
                if($method == "POST"){
                    DB::insert("INSERT INTO t_kategori (id_kategori, nama_kategori) VALUES (?,?)",
                    [ 
                        $request->input('id_kategori'),
                        $request->input('nama_kategori'),
                        ]);
                        return redirect('/employee/kategori');
                    }else{
                        return redirect('/employee/kategori');
                    }
                }
                //edit kategori 
                public function KategoriEdit($id){
                    $data['id_kategori'] = DB::selectOne("SELECT * FROM t_kategori WHERE id_kategori=?", [$id]);
                    return view ('kategori_edit', $data);
                }
                //edit kategori post
                public function KategoriEditPost(Request $request){
                    $method = $request->method();
                    if($method == "POST"){
                        DB::update("UPDATE t_kategori SET nama_kategori=? WHERE id_kategori=?",
                        [ 
                            $request->input('nama_kategori'),
                            $request->input('id_kategori')
                            ]);
                            return redirect('/employee/kategori');
                        }else{
                            return redirect('/employee/kategori');
                        }
                    }
                    //delete kategori
                    public function KategoriDelete($id){
                        DB::delete("DELETE FROM t_kategori WHERE id_kategori=?", [$id]);
                        return redirect('/employee/kategori');
                    }


            //supplier
            //tampil
            public function supplier(){
                $data['id_supplier'] = DB::select("SELECT * FROM t_supplier");
                return view ('Supplier_Index', $data);
            }
            //add supplier 
            public function supplierAdd(){
                $data['id_supplier'] = "Form Add Supplier";
                return view ('Supplier_Add', $data);
            }
            //add supplier post
            public function supplierAddPost(Request $request){
                $method = $request->method();
                if($method == "POST"){
                    DB::insert("INSERT INTO t_supplier (id_supplier, nama_supplier, email_supplier, no_supplier, kecamatan_supplier, kota_supplier, provinsi_supplier, kodepos_supplier, alamat_supplier) VALUES (?,?,?,?,?,?,?,?,?)",
                    [ 
                        $request->input('id_supplier'),
                        $request->input('nama_supplier'),
                        $request->input('email_supplier'),
                        $request->input('no_supplier'),
                        $request->input('kecamatan_supplier'),
                        $request->input('kota_supplier'),
                        $request->input('provinsi_supplier'),
                        $request->input('kodepos_supplier'),
                        $request->input('alamat_supplier')
                        ]);
                        return redirect('/employee/supplier');
                    }else{
                        return redirect('/employee/supplier');
                    }
                }
                //edit
                public function SupplierEdit($id){
                    $data['id_supplier'] = DB::selectOne("SELECT * FROM t_supplier WHERE id_supplier=?", [$id]);
                    return view ('supplier_edit', $data);
                }
                //edit post
                public function SupplierEditPost(Request $request){
                    $method = $request->method();
                    if($method == "POST"){
                        DB::update("UPDATE t_supplier SET nama_supplier=?, email_supplier=?, no_supplier=?, kecamatan_supplier=?, kota_supplier=?, provinsi_supplier=?, kodepos_supplier=?, alamat_supplier=? WHERE id_supplier=?",
                        [ 
                            $request->input('nama_supplier'),
                            $request->input('email_supplier'),
                            $request->input('no_supplier'),
                            $request->input('kecamatan_supplier'),
                            $request->input('kota_supplier'),
                            $request->input('provinsi_supplier'),
                            $request->input('kodepos_supplier'),
                            $request->input('alamat_supplier'),
                            $request->input('id_supplier')
                            ]);
                            return redirect('/employee/supplier');
                        }else{
                            return redirect('/employee/supplier');
                        }
                    }
                    //delete supplier
                    public function supplierDelete($id){
                        DB::delete("DELETE FROM t_supplier WHERE id_supplier=?", [$id]);
                        return redirect('/employee/supplier');
                    }
                }

        
    
                    
