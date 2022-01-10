<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Auth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Firebase\Auth\Token\Exception\InvalidToken;
use Kreait\Firebase\Exception\Auth\RevokedIdToken;
use Illuminate\Http\Request;

class FirebaseController extends Controller
{

    /*public function index(){
        
        $factory = (new Factory)->withServiceAccount('studentsystem_firebase_config.json');
        
    }*/

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

    public function index(){
        $data['fakulteler'] = $this->database->getReference('fakulteler')->getValue();
        return view('login_pages.student_signUp',compact('fakulteler'));
        /*$snapshot = $reference->getSnapshot();
        $value = $snapshot->getValue();*/
    
    }

    public function signUp(Request $request)
    {
        $validationRules = [
            'name' => 'required | min:3',
            'surname' => 'required | min:3',
            'email' => 'required | email',
            'password' => 'required | min:6',
        ];

        $rules = Validator::make($request->all(), $validationRules, [
            //'min'=>'Ad Soyad alanı minimum :min karakter olmalıdır'
            'min' => ':attribute alanı minimum :min karakter olmalıdır',
            'required' => ':attribute alanı boş bırakılamaz',
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $password = $request->input('password');
        $tc = $request->input('tc');
        $telefon = $request->input('telefon');
        $ogrenciNo = $request->input('ogrenciNo');
        $universite = $request->input('universite');
        $sinif = $request->input('sinif');
        $adres = $request->input('adres');
        $fakulte = $request->input('fakulte');
        $bolum = $request->input('bolum');
        $dogumTarihi = $request->input('dogumTarihi');

        try {
            if ($rules->fails()) {
                return redirect()->back()->withErrors($rules)->withInput();
            } else {
                $newUser = $this->auth->createUserWithEmailAndPassword($email, $password);

                $ref_tablename = 'users';
                $postData = [
                    'uid' => $newUser->uid,
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'bolum' => $bolum,
                    'fakulte' => $fakulte,
                    'tc' => $tc,
                    'telefon ' => $telefon ,
                    'ogrenciNo' => $ogrenciNo,
                    'universite' => $universite,
                    'sinif' => $sinif,
                    'adres' => $adres,
                    'dogumTarihi' => $dogumTarihi,

                ];
                $postRef = $this->database->getReference($ref_tablename)->push($postData);

                if ($postRef) {
                    $signInResult = $this->auth->signInWithEmailAndPassword($email, $password);
                    // dump($signInResult->data());
                    if ($signInResult) {
                        Session::put('firebaseUserId', $signInResult->firebaseUserId());
                        Session::put('idToken', $signInResult->idToken());
                        Session::save();

                        return view('student_pages.main');
                    } else {
                        return redirect()->back()->withErrors($rules)->withInput();
                        echo ($signInResult);
                    }
                    return redirect()->route('main')->with('status', 'Başarıyla eklendi');
                }
            }
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return redirect()->back()->withErrors("Şifre yanlış")->withInput();
                    break;
                case 'EMAIL_NOT_FOUND':
                    return redirect()->back()->withErrors("Email bulunamadı")->withInput();
                    break;
                default:
                    return redirect()->back()->withErrors($e->getMessage())->withInput();
                    break;
            }
        }
    }

    public function toSignUp()
    {
        $data['fakulteler'] = $this->database->getReference('fakulteler')->getValue();
        $data['bolumler'] = $this->database->getReference('bolumler/f1')->getValue();
        return view('login_pages.student_signUp',$data);
        //return view('login_pages.student_signUp');
    }

    public function toLoginAdmin()
    {
        return view('login_pages.admin_login');
    }

    public function getBolum($fakulteId)
    {
        $data['bolumler'] = $this->database->getReference('bolumler/f'.$fakulteId)->getValue();
        return redirect()->route('signUp.id')->with($data);
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $validationRules = [
            'email' => 'required | email',
            'password' => 'required | min:6',
        ];

        $rules = Validator::make($request->all(), $validationRules, [
            //'min'=>'Ad Soyad alanı minimum :min karakter olmalıdır'
            'min' => ':attribute alanı minimum :min karakter olmalıdır',
            'required' => ':attribute alanı boş bırakılamaz',
        ]);

        try {
            if ($rules->fails()) {
                return redirect()->back()->withErrors($rules)->withInput();
            } else {
                $signInResult = $this->auth->signInWithEmailAndPassword($email, $password);
                // dump($signInResult->data());
                if ($signInResult) {
                    Session::put('firebaseUserId', $signInResult->firebaseUserId());
                    Session::put('idToken', $signInResult->idToken());
                    Session::save();

                    return view('student_pages.main');
                } else {
                    return redirect()->back()->withErrors($rules)->withInput();
                    echo ($signInResult);
                }
            }
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return redirect()->back()->withErrors("Şifre yanlış")->withInput();
                    break;
                case 'EMAIL_NOT_FOUND':
                    return redirect()->back()->withErrors("Email bulunamadı")->withInput();
                    break;
                default:
                    return redirect()->back()->withErrors($e->getMessage())->withInput();
                    break;
            }
        }
    }

    public function loginAdmin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $validationRules = [
            'email' => 'required | email',
            'password' => 'required | min:6',
        ];

        $rules = Validator::make($request->all(), $validationRules, [
            //'min'=>'Ad Soyad alanı minimum :min karakter olmalıdır'
            'min' => ':attribute alanı minimum :min karakter olmalıdır',
            'required' => ':attribute alanı boş bırakılamaz',
        ]);

        try {
            if ($rules->fails()) {
                return redirect()->back()->withErrors($rules)->withInput();
            } else {
                $signInResult = $this->auth->signInWithEmailAndPassword($email, $password);
                // dump($signInResult->data());
                if ($signInResult) {
                    Session::put('firebaseUserId', $signInResult->firebaseUserId());
                    Session::put('idToken', $signInResult->idToken());
                    Session::save();

                    return view('admin_pages.main');
                } else {
                    return redirect()->back()->withErrors($rules)->withInput();
                    echo ($signInResult);
                }
            }
        } catch (\Throwable $e) {
            switch ($e->getMessage()) {
                case 'INVALID_PASSWORD':
                    return redirect()->back()->withErrors("Şifre yanlış")->withInput();
                    break;
                case 'EMAIL_NOT_FOUND':
                    return redirect()->back()->withErrors("Email bulunamadı")->withInput();
                    break;
                default:
                    return redirect()->back()->withErrors($e->getMessage())->withInput();
                    break;
            }
        }
    }

    public function signOut()
    {
        if (Session::has('firebaseUserId') && Session::has('idToken')) {
            $this->auth->revokeRefreshTokens(Session::get('firebaseUserId'));
            Session::forget('firebaseUserId');
            Session::forget('idToken');
            Session::save();
            return redirect()->route('student_login')->with('status', 'Başarıyla çıkış yapıldı');
            //return view('login_pages.student_login');
        } else {
            return redirect()->back()->withErrors("Çıkış yapılamadı.");
            //echo ("Çıkış yapılamadı.");
        }
    }

    public function basvurularim()
    {

        $uid = Session::get('firebaseUserId');

        $data['basvurular']  = $this->database->getReference('basvurular')->orderByChild('uid')->equalTo($uid)->getValue();
        
        return view('student_pages.basvurularim',$data);
    }

    public function capBasvurulari()
    {
        $data['basvurular']  = $this->database->getReference('basvurular')->orderByChild('kategoriKod')->equalTo("cap")->getValue();
        
        return view('admin_pages.cap',$data);
    }
}
