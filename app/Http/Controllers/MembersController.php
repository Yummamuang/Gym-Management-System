<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Members;
use Carbon\Carbon;

class MembersController extends Controller
{
    public function index() {
        $members = $this->nav();
        $weight = $members -> weight;
        $height = $members -> height;

        $bmi = $weight / (($height/100) * ($height/100));
        $bmi = number_format($bmi, 2);

        if ($bmi < 18.5) {
            $bmi_text = "น้ำหนักต่ำกว่าเกณฑ์";
        } elseif ($bmi >= 18.5 || $bmi < 22.9) {
            $bmi_text = "น้ำหนักสมส่วน";
        } elseif ($bmi >= 18.5 || $bmi < 22.9) {
            $bmi_text = "น้ำหนักสมส่วน";
        } elseif ($bmi >= 23 || $bmi < 24.9) {
            $bmi_text = "น้ำหนักเกินมาตรฐาน";
        } elseif ($bmi >= 25 || $bmi < 29.9) {
            $bmi_text = "อ้วน";
        } elseif ($bmi >= 30) {
            $bmi_text = "อ้วนมาก";
        }

        $checkin_count = DB::table("membercards")->where("memberid", $members -> memberid)->count();
        $courses = DB::table("courses")->where("memberid", $members -> memberid)->get()->first();

        return view("members", compact("members", "bmi", "bmi_text", "courses", "checkin_count"));
    }
    public function login() {
        return view('auth.members_login');
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
            $members = Members::where('username', $request->username)->first();
            if ($members) {
                if(Hash::check($request->password, $members->password)) {
                    $request->session()->put('loggedInMembers', $members->memberid);
                    return redirect()->route('dashboard.Members');
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

        return view('auth.members_register', compact('today'));
    }

    public function registerPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'birthday' => 'required|date|before:' . Carbon::now()->subYears(12)->format('Y-m-d'),
            'sex' => 'required|in:male,female',
            'weight'=> 'required|numeric|between:20,150',
            'height'=> 'required|numeric|between:100,250',
            'phone'=> 'required|regex:/^0\d{9}$/|unique:members',
            'address'=> 'required',
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
            'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
            'phone.regex' => 'กรุณากรอกเบอร์โทรศัพท์ให้ถูกต้อง',
            'address.required' => 'กรุณากรอกที่อยู่',
            'username.required' => 'กรุณากรอกชื่อผู้ใช้',
            'username.unique' => 'ชื่อผู้ใช้นี้ถูกใช้ไปแล้ว',
            'email.unique' => 'อีเมลนี้ถูกใช้ไปแล้ว',
            'email.required' => 'กรุณากรอกอีเมล',
            'username.regex' => 'กรุณากรอก A-Z หรือ a-z',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
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
            $email = $request->email;
            $password = $request->password;
            return redirect()->back()->with('error',[$fname, $lname, $birth, $sex, $weight, $height, $phone, $add, $username, $email, $password])
            ->withErrors($validator);
        } else {

            $memberId = mt_rand(10000000, 99999999);
            $memberIdUnique = false;
            while (!$memberIdUnique) {
                $existingMember = Members::where('memberid', $memberId)->exists();
                if (!$existingMember) {
                    $memberIdUnique = true;
                } else {
                    $memberId = mt_rand(10000000, 99999999);
                }
            }

            $members = new Members();
            $members->memberid = $memberId;
            $members->mfname = $request->firstname;
            $members->mlname = $request->lastname;
            $members->birthday = $request->birthday;
            $members->age = Carbon::parse($request->birthday)->age;
            $members->sex = $request->sex;
            $members->weight = $request->weight;
            $members->height = $request->height;
            $members->phone = $request->phone;
            $members->address = $request->firstname;
            $members->email = $request->email;
            $members->username = $request->username;
            $members->password = Hash::make($request->password);
            $members->save();

            return redirect()->route('registerSuccess.Members');
        }
    }

    public function success() {
        return view('auth.members_success');
    }

    public function forgot_password() {
        return view('auth.members_forgot_password');
    }

    public function forgot_passwordPost(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:members,email',
        ],[
            'email.required' => 'กรุณากรอกอีเมล',
            'email.exists' => 'ไม่พบอีเมลของคุณ',
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email'=> $request->email,
            'token'=> $token,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('resetPassword.Members', $token);
    }

    public function reset_password($token) {
        return view('auth.members_reset_password', compact('token'));
    }

    public function reset_passwordPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:members,email',
            'password' => 'required|regex:/^[a-zA-Z0-9]+$/|min:8|confirmed',
            'password_confirmation' => 'required',
        ],[
            'email.required' => 'กรุณากรอกอีเมล',
            'email.exists' => 'ไม่พบอีเมลของคุณ',
            'password.required' => 'กรุณากรอกรหัสผ่าน',
            'password.confirmed' => 'กรุณากรอกรหัสผ่านให้ตรงกัน',
            'password.min' => 'กรุณากรอกรหัสผ่านให้มากกว่า 8 ตัวอักษร',
        ]);

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

        Members::where('email', $request->email)->update([
            'password'=> Hash::make($request->password),
        ]);

        DB::table('password_reset_tokens')->where([
            'email'=> $request->email,
        ])->delete();

        return redirect()->route('login.Members')->with('success','รีเซ็ตรหัสผ่านสำเร็จ');
    }

    public function profile() {
        $members = $this->nav();

        return view('members_profile', compact('members'));
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

        Members::where('memberid', Session::get("loggedInMembers"))->update([
            'weight' => $request->weight,
            'height' => $request->height,
            'phone' => $request->phone,
            'address' => $request->address,
            'username' => $request->username,
            'email' => $request->email,
            'password'=> Hash::make($request->password),
        ]);

        return redirect()->route('profile.Members')->with('success','บันทึกข้อมูลสำเร็จ');
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

        Members::where('memberid', Session::get("loggedInMembers"))->update([
            'image' => $path ? $path.$filename : null,
        ]);

        return redirect()->route('profile.Members')->with('success_profile','บันทึกรูปโปรไฟล์สำเร็จ');
    }

    public function course() {
        $members = $this->nav();
        $allcourses = DB::table('courses')->whereNotNull('trainerid')->get();

        $coursesid = DB::table('courses')->pluck('memberid');
        $course_check = false;
        $courses = [];
        if ($coursesid->contains($members->memberid)) {
            $courses = DB::table('courses')->where('memberid', $members->memberid)->get();
            $course_check = true;
        }

        return view('members_course', compact('members', 'courses','allcourses', 'course_check'));
    }

    public function addcourse($memberid, $courseid, $day, $price) {
        $today = Carbon::now();
        $endcourse = $today->addDays($day);

        DB::table('courses')->where('courseid', $courseid)->update([
            'memberid' => $memberid,
            'start_course' =>$today,
            'end_course' => $endcourse,
        ]);

        $income_present = DB::table('incomes')->select('income')->get()->first();

        $income_present = intval($income_present->income);
        $price = intval($price);

        DB::table('incomes')->update([
            'income'=> $price + $income_present,
        ]);

        return redirect()->back()->with('success','ลงสมัครคอร์สสำเร็จ');
    }

    public function checkin() {
        $members = $this->nav();
        $membercards = DB::table('membercards')->where('memberid', $members->memberid)->get();
        return view('members_checkin', compact('members', 'membercards'));
    }

    public function memberCard() {
        $members = $this->nav();
        return view('members_card', compact('members'));
    }

    public function nav() {
        if (Session::has("loggedInMembers")) {
            $members = Members::where('memberid', Session::get("loggedInMembers"))->first();
        }
        return $members;
    }

    public function logout() {
        if(session()->has('loggedInMembers')) {
            session()->pull('loggedInMembers');
            return redirect()->route('login.Members');
        } else {
            return redirect()->back();
        }
    }
}
