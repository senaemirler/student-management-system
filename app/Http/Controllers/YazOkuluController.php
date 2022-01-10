<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Kreait\Firebase\Factory;

use Illuminate\Http\Request;

class YazOkuluController extends Controller
{
    protected $auth, $database, $firebase;

    public function __construct()
    {
        $factory = (new Factory)
            ->withServiceAccount(__DIR__ . '/studentsystem.json');

        $this->auth = $factory->createAuth();

        $firebase = $factory
            ->withDatabaseUri('https://studentsystem-bd73b-default-rtdb.firebaseio.com/')
            ->createDatabase();

        $this->database = $firebase;
    }

    public function yazOkuluBasvuru(Request $request)
    {

        $validationRules = [
            'name' => 'required | min:3',
            'surname' => 'required | min:3',
            'email' => 'required | email',
            'tc' => 'required | min:11 | max:11',
            'ogrenciNo' => 'required | min:9 | max:9',
            'dogumTarihi' => 'required',
        ];

        $rules = Validator::make($request->all(), $validationRules, [
            //'min'=>'Ad Soyad alanı minimum :min karakter olmalıdır'
            'min' => ':attribute alanı minimum :min karakter olmalıdır',
            'max' => ':attribute alanı maximum :max karakter olmalıdır',
            'required' => ':attribute alanı boş bırakılamaz',
        ]);

        $uid = Session::get('firebaseUserId');

        $ref_tablename = 'basvurular';

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $tc = $request->input('tc');
        $telefon = $request->input('telefon');
        $ogrenciNo = $request->input('ogrenciNo');
        $universite = $request->input('universite');
        $sinif = $request->input('sinif');
        $adres = $request->input('adres');
        $fakulte = $request->input('fakulte');
        $bolum = $request->input('bolum');
        $dogumTarihi = $request->input('dogumTarihi');
        $kategoriKod = 'yazOkulu';
        $durum = '0';

        $postData = [
            'uid' => $uid,
            'name' => $name,
            'surname' => $surname,
            'email' => $email,
            'bolum' => $bolum,
            'fakulte' => $fakulte,
            'tc' => $tc,
            'telefon ' => $telefon,
            'ogrenciNo' => $ogrenciNo,
            'universite' => $universite,
            'sinif' => $sinif,
            'adres' => $adres,
            'dogumTarihi' => $dogumTarihi,
            'kategoriKod' => $kategoriKod,
            'durum' => $durum,

        ];
        try {
            if ($rules->fails()) {
                return redirect()->back()->withErrors($rules)->withInput();
            } else {
                $postRef = $this->database->getReference($ref_tablename)->push($postData);

                if ($postRef) {
                    return redirect()->route('main')->with('status', 'Başarıyla eklendi');
                }
            }
        } catch (\Throwable $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }
    }
}
