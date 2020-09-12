<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $pages;

    public function __construct(){
        $this->pages = array();
    }

    public function index(){
        return view ('pages_index');
    }

    public function login(){
        $data['title'] = "Login";
                          return view('login', $data);
    }

    public function loginAction(Request $request){
        $method = $request->method();
        if($method == "POST"){
            $result = DB::selectOne("SELECT u.id_user, u.nama_user, u.status, u.email, u.alamat, u.hp, r.nama AS role FROM t_user AS u 
                        RIGHT JOIN t_role AS r ON u.t_role_id = r.id WHERE u.email=? AND u.password=?", [
                   $request->input('email'),
                   $request->input('password')
              ]);

              

               if ($result->status == "employee") {
                   $request->session()->put('s_id_user', $result->id_user);
                   $request->session()->put('s_nama_user', $result->nama_user);
                   $request->session()->put('s_status', $result->status);
                   $request->session()->put('s_email', $result->email);
                   $request->session()->put('s_alamat', $result->alamat);
                   $request->session()->put('s_hp', $result->hp);
                   $request->session()->put('s_role', $result->role);
                   return redirect('/employee');

                }else if($result->status == "manager") {
                    $request->session()->put('s_id_user', $result->id_user);
                    $request->session()->put('s_nama_user', $result->nama_user);
                    $request->session()->put('s_status', $result->status);
                    $request->session()->put('s_role', $result->role);
                    return redirect('/manager');

                }else if($result->status == "member") {
                    $request->session()->put('s_id_user', $result->id_user);
                    $request->session()->put('s_nama_user', $result->nama_user);
                    $request->session()->put('s_status', $result->status);
                    $request->session()->put('s_role', $result->role);
                    return redirect('/member');


                }else {
                    return redirect('/login');
                }
                 }else {
              return redirect('/login');
         }
    
}

    public function signOut(Request $request){
        $request->session()->flush();
        return redirect('/');
    }

    public function about(){
        return view ('home_about');
    }

    public function contact(){
        return view ('home_contact');
    }

    public function produk(){
        $data['id_produk'] = DB::select("SELECT t_produk.id_produk, t_produk.nama_produk, t_produk.harga, 
        t_produk.stok, t_kategori.nama_kategori, t_supplier.nama_supplier, foto, t_produk.tgl_masuk 
        FROM t_produk 
        JOIN t_kategori ON t_produk.id_kategori=t_kategori.id_kategori
        JOIN t_supplier ON t_produk.id_supplier=t_supplier.id_supplier");
        return view ('home_produk', $data);
    }
    


    public function signup(){
        // $data['title'] = "Daftar Member";
        return view ('signup');
    }
        public function signupAddPost(Request $request){
        $method = $request->method();
        if($method == "POST"){
        DB::insert("INSERT INTO t_user (id_user, nama_user, email, password, alamat, hp, status, t_role_id) VALUES (?,?,?,?,?,?,'member','3')",
        [ 
        $request->input('id_user'),
        $request->input('nama_user'),
        $request->input('email'),
        $request->input('password'),
        $request->input('alamat'),
        $request->input('hp')
        ]);

        return redirect('/login');
        }else{
        return redirect('/login');
        }
   }
}