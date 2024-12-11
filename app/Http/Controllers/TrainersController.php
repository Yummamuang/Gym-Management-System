<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Trainers;
use Illuminate\Support\Str;
use Carbon\Carbon;



class TrainersController extends Controller
{

    public function index() {
        $trainers = $this->nav();

        $courses = DB::table("courses")->where("trainerid", $trainers -> trainerid)->get()->first();
        $exercises = DB::table("exercises")->where("exerciseid", $courses -> exerciseid)->get()->first();
        $diets = DB::table("diet_plans")->where("dietid", $courses -> dietid)->get()->first();

        return view("trainers", compact('trainers', 'courses', 'exercises', 'diets'));
    }
    public function login() {
        return view('auth.trainers_login');
    }

    public function loginPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ],[
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $trainer = Trainers::where('username', $request->username)->first();
            if ($trainer) {
                if(Hash::check($request->password, $trainer->password)) {
                    $request->session()->put('loggedInTrainers', $trainer->trainerid);
                    return redirect()->route('dashboard.Trainers');
                } else {
                    return redirect()->back()->with('error',['ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',($request->username)]);
                }
            } else {
                return redirect()->back()->with('error',['ไม่พบชื่อผู้ใช้', ($request->username)]);
            }
        }
    }

    public function register(Request $request) {
        $today = date('Y-m-d');

        return view('auth.trainers_register', compact('today'));
    }

    public function registerPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required|date|before:' . Carbon::now()->subYears(20)->format('Y-m-d'),
            'sex' => 'required|in:male,female',
            'weight'=> 'required|numeric|between:20,150',
            'height'=> 'required|numeric|between:100,250',
            'phone'=> 'required|regex:/^0\d{9}$/|unique:members',
            'address'=> 'required',
            'experience' =>'required|numeric|min:3|max:90',
            'username'=> 'required|regex:/^[a-zA-Z]+$/|min:6|unique:members',
            'email'=> 'required|email|unique:members',
            'password'=> 'required|regex:/^[a-zA-Z0-9]+$/|min:8',
        ],[
            'firstname.required'=> 'กรุณากรอกชื่อ',
            'lastname.required' => 'กรุณากรอกนามสกุล',
            'birthday.before' => 'กรุณาใส่วันเกิดให้ถูกต้อง',
            'sex.in' => 'กรุณาเลือกเพศ',
            'weight.required' => 'กรุณากรอกน้ำหนัก',
            'weight.between' => 'กรุณากรอกน้ำหนักให้ถูกต้อง',
            'height.required' => 'กรุณากรอกส่วนสูง',
            'height.between' => 'กรุณากรอกส่วนสูงให้ถูกต้อง',
            'phone.unique' => 'เบอร์โทรศัพท์นี้ถูกใช้ไปแล้ว',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.regex' => 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง',
            'address.required' => 'กรุณากรอกที่อยู่',
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว',
            'experience.required'=> 'กรุณากรอกประสบการณ์',
            'experience.min' => 'ประสบการณ์ต้องมากกว่า 3 ปีขึ้นไป',
            'email.unique' => 'อีเมลนี้ถูกใช้ไปแล้ว',
            'email.required' => 'กรุณากรอกอีเมล',
            'username.regex' => 'กรุณากรอก A-Z หรือ a-z',
            'password.min' => 'กรุณากรอกรหัสผ่านให้มากกว่า 8 ตัวอักษร',
        ]) ;

        if ($validator->fails()) {
            $fname = $request->firstname;
            $lname = $request->lastname;
            $birth = $request->birthday;
            $sex = $request->sex;
            $weight = $request->weight;
            $height = $request->height;
            $phone = $request->phone;
            $add = $request->address;
            $username = $request->username;
            $exp = $request->experience;
            $email = $request->email;
            $password = $request->password;
            return redirect()->back()->with('error', [$fname, $lname, $birth, $sex, $weight, $height, $phone, $add, $username, $exp, $email, $password])
            ->withErrors($validator);
        } else {

            $trainersId = mt_rand(10000000, 99999999);
            $trainersIdUnique = false;
            while (!$trainersIdUnique) {
                $existingtrainers = Members::where('memberid', $trainersId)->exists();
                if (!$existingtrainers) {
                    $trainersIdUnique = true;
                } else {
                    $trainersId = mt_rand(10000000, 99999999);
                }
            }

            $trainers = new Trainers();
            $trainers->trainerid = $trainersId;
            $trainers->tfname = $request->firstname;
            $trainers->tlname = $request->lastname;
            $trainers->birthday = $request->birthday;
            $trainers->age = Carbon::parse($request->birthday)->age;
            $trainers->sex = $request->sex;
            $trainers->weight = $request->weight;
            $trainers->height = $request->height;
            $trainers->phone = $request->phone;
            $trainers->address = $request->firstname;
            $trainers->email = $request->email;
            $trainers->experience = $request->experience;
            $trainers->username = $request->username;
            $trainers->password = Hash::make($request->password);
            $trainers->salary = 20000;
            $trainers->save();

            return redirect()->route('registerSuccess.Trainers');
        }
    }

    public function profileUpdate(Request $request) {
        $validator = Validator::make($request->all(), [
            'weight'=> 'required|numeric|between:20,150',
            'height'=> 'required|numeric|between:100,250',
            'phone'=> 'required|regex:/^0\d{9}$/',
            'address'=> 'required',
            'username'=> 'required|regex:/^[a-zA-Z]+$/|min:6',
            'email'=> 'required|email',
            'password'=> 'required|regex:/^[a-zA-Z0-9]+$/|min:8|confirmed',
            'password_confirmation' => 'required',
        ],[
            'weight.required' => 'กรุณากรอกน้ำหนัก',
            'weight.between' => 'กรุณากรอกน้ำหนักให้ถูกต้อง',
            'height.required' => 'กรุณากรอกส่วนสูง',
            'height.between' => 'กรุณากรอกส่วนสูงให้ถูกต้อง',
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.regex' => 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง',
            'address.required' => 'กรุณากรอกที่อยู่',
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'email.required' => 'กรุณากรอกอีเมล',
            'username.regex' => 'กรุณากรอก A-Z หรือ a-z',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.min' => 'กรุณากรอกรหัสผ่านให้มากกว่า 8 ตัวอักษร',
            'password.confirmed' => 'กรุณากรอกรหัสผ่านให้ตรงกัน',
            'password_confirmation.required' => 'กรุณากรอกรหัสผ่านอีกครั้ง',
        ]) ;

        if ($validator->fails()) {
            return redirect()->back()->with('error', '')->withErrors($validator);
        }

        Members::where('memberid', Session::get("loggedInTrainers"))->update([
            'weight' => $request->weight,
            'height' => $request->height,
            'phone' => $request->phone,
            'address' => $request->address,
            'username' => $request->username,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('profile.Trainers')->with('success','บันทึกข้อมูลสำเร็จ');
    }

    public function profilePicture(Request $request) {
        $validator = Validator::make($request->all(), [
            'image'=> 'nullable|mimes:png,jpg,jpeg,webp,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', '')->withErrors($validator);
        }

        $path = null;
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() .'.'. $extension;
            $path = 'uploads/user/';

            $file->move($path, $filename);
        }

        Trainers::where('trainerid', Session::get("loggedInTrainers"))->update([
            'image' => $path ? $path.$filename : null,
        ]);

        return redirect()->route('profile.Trainers')->with('success_profile','บันทึกรูปโปรไฟล์สำเร็จ');
    }

    public function checkin() {
        $trainers = $this->nav();
        $trainercards = DB::table('trainercards')->where('trainerid', $trainers->trainerid)->get();
        return view('trainers_checkin', compact('trainers', 'trainercards'));
    }

    public function trainerCard() {
        $trainers = $this->nav();
        return view('trainers_card', compact('trainers'));
    }

    public function success() {
        return view('auth.trainers_success');
    }

    public function forgot_password() {
        return view('auth.trainers_forgot_password');
    }

    public function forgot_passwordPost(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:trainers,email',
        ],[
            'email.required' => 'กรุณากรอกอีเมล',
            'email.exists' => 'ไม่พบอีเมลของคุณ',
        ]) ;

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email'=> $request->email,
            'token'=> $token,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('resetPassword.Trainers', $token);
    }

    public function reset_password($token) {
        return view('auth.trainers_reset_password', compact('token'));
    }

    public function reset_passwordPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:trainers,email',
            'password'=> 'required|regex:/^[a-zA-Z0-9]+$/|min:8|confirmed',
            'password_confirmation' => 'required',
        ],[
            'email.required' => 'กรุณากรอกอีเมล',
            'email.exists' => 'ไม่พบอีเมลของคุณ',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.confirmed' => 'กรุณากรอกรหัสผ่านให้ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านให้มากกว่า 8 ตัวอักษร',
        ]) ;

        if ($validator->fails()) {
            $email = $request->email;
            $password = $request->password;
            $password_confirms = $request->password_confirmation;
            return redirect()->back()->with('error', [$email, $password, $password_confirms])->withErrors($validator);
        }

        $updatePassword = DB::table('password_reset_tokens')->where([
            'email'=> $request->email,
            'token' => $request->token,
        ])->first();

        if (!$updatePassword) {
            return redirect()->route('resetPassword.Members')->with('error','อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        }

        Trainers::where('email', $request->email)->update([
            'password'=> Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where([
            'email'=> $request->email,
        ])->delete();

        return redirect()->route('login.Trainers')->with('success','รีเซ็ตรหัสผ่านสำเร็จ');
    }

    public function profile() {
        $trainers = $this->nav();

        return view('trainers_profile', compact('trainers'));
    }

    public function course() {
        $trainers = $this->nav();
        $allcourses = DB::table('courses')->get();

        $coursesid = DB::table('courses')->pluck('trainerid');
        $course_check = false;
        $courses = [];
        if ($coursesid->contains($trainers->trainerid)) {
            $courses = DB::table('courses')->where('trainerid', $trainers->trainerid)->get();
            $course_check = true;
        }

        return view('trainers_course', compact('trainers', 'courses','allcourses', 'course_check'));
    }

    public function addcourse($trainerid, $courseid) {

        DB::table('courses')->where('courseid', $courseid)->update([
            'trainerid' => $trainerid,
        ]) ;
        return redirect()->back()->with('success','ลงสอนคอร์สสำเร็จ');
    }

    public function nav() {
        if (Session::has("loggedInTrainers")) {
            $trainers = Trainers::where('trainerid', Session::get("loggedInTrainers"))->first();
        }
        return $trainers;
    }


    public function logout() {
        if(session()->has('loggedInTrainers')) {
            session()->pull('loggedInTrainers');
            return redirect()->route('login.Trainers');
        } else {
            return redirect()->back();
        }
    }
}
