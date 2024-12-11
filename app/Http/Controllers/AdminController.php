<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $members_count = DB::table("members")->count();
        $trainers_count = DB::table("trainers")->count();
        $courses_count = DB::table("courses")->count();
        $courses_count_members = DB::table("courses")->whereNotNull("memberid")->count();
        $cost = DB::table('courses')->select('cost')->get();
        $memberInCourse = DB::table('courses')->select('memberid')->get();

        $membercard_count = DB::table('membercards')->where('status', '1')->count();
        $trainercard_count = DB::table('trainercards')->where('status', '1')->count();
        $all_number_gyms = $membercard_count + $trainercard_count;

        $income_present = DB::table('incomes')->select('income')->first();
        $income_present = $income_present -> income;
        return view("admin",compact("members_count","trainers_count", "income_present", "courses_count", "courses_count_members", "membercard_count", "trainercard_count", "all_number_gyms"));
    }
    public function login() {
        return view('auth.admin_login');
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
            $admin = Admin::where('username', $request->username)->first();
            if ($admin) {
                if(Hash::check($request->password, $admin->password)) {
                    $request->session()->put('loggedInAdmin', $admin->id);
                    return redirect()->route('dashboard.Admin');
                } else {
                    return redirect()->back()->with('error','ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');
                }
            } else {
                return redirect()->back()->with('error','ไม่พบชื่อผู้ใช้');
            }
        }
    }

    public function course() {
        $courses = DB::table('courses')->get();

        return view('admin_course', compact('courses'));
    }

    public function addCourse() {
        $exercises = DB::table('exercises')->get();
        $diets = DB::table('diet_plans')->get();
        $courses = DB::table('courses')->get();
        return view('admin_course_add', compact('exercises', 'diets', 'courses'));
    }
    public function addCoursePost(Request $request) {
        $validator = Validator::make($request->all(), [
            'cname' => 'required',
            'cost' => 'required',
            'course_day' => 'required',
        ],[
            'cname.required' => 'กรุณากรอกข้อมูล',
            'cost.required' => 'กรุณากรอกข้อมูล',
        ]);

        if (($request -> exerciseid) == 'exerciseid' || ($request -> dietid) == 'dietid') {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $courseid = mt_rand(1000, 9999);

        $courseidUnique = false;
        while (!$courseidUnique) {
            $existingCourseid = DB::table('courses')->where('courseid', $courseid)->exists();
            if (!$existingCourseid) {
                $courseidUnique = true;
            } else {
                $courseid = mt_rand(1000, 9999);
            }
        }

        DB::table('courses')->insert([
            'courseid'=> $courseid,
            'cname'=> $request->cname,
            'cost'=> $request->cost,
            'course_day' => $request->course_day,
            'exerciseid'=> $request->exerciseid,
            'dietid'=> $request->dietid,
        ]);

        return redirect()->back()->with('success','เพิ่มคอร์สสำเร็จ');
    }



    public function deleteCourses($id) {
        DB::table('courses')->where('courseid', $id)->delete();
        return redirect()->back()->with('delete_success','ลบคอร์สสำเร็จ');
    }

    public function exercise() {
        $exercises = DB::table('exercises')->get();

        return view('admin_exercise', compact('exercises'));
    }

    public function addExercise() {
        return view('admin_exercise_add');
    }

    public function addExercisePost(Request $request) {
        $validator = Validator::make($request->all(), [
            'exercise_name' => 'required',
            'exercise_type' => 'required',
        ],[
            'exercise_name.required' => 'กรุณากรอกข้อมูล',
            'exercise_types.required' => 'กรุณากรอกข้อมูล',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $exerciseid = mt_rand(1000, 9999);

        $exerciseidUnique = false;
        while (!$exerciseidUnique) {
            $existingExerciseid = DB::table('exercises')->where('exerciseid', $exerciseid)->exists();
            if (!$existingExerciseid) {
                $exerciseidUnique = true;
            } else {
                $exerciseid = mt_rand(1000, 9999);
            }
        }

        DB::table('exercises')->insert([
            'exerciseid'=> $exerciseid,
            'exercise_name'=> $request->exercise_name,
            'exercise_types'=> $request->exercise_type,
        ]);

        return redirect()->back()->with('success','เพิ่มแผนการออกกำลังกายสำเร็จ');
    }

    public function editExercise($id) {
        $exercises = DB::table('exercises')->where('exerciseid',$id)->get()->first();
        return view('admin_exercise_edit', compact('exercises'));
    }

    public function editExercisePost(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'exercise_name' => 'required',
            'exercise_type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('exercises')->where('exerciseid',$id)->update([
            'exercise_name'=> $request->exercise_name,
            'exercise_type'=> $request->exercise_type,
        ]);

        return redirect()->back()->with('success','แก้ไขแผนการออกกำลังกายสำเร็จ');
    }

    public function deleteExercise($id) {
        DB::table('exercises')->where('exerciseid', $id)->delete();
        return redirect()->back()->with('delete_success','ลบแผนการออกกำลังกายสำเร็จ');
    }

    public function diet_plan() {
        $diets = DB::table('diet_plans')->get();
        return view('admin_diet', compact('diets'));
    }

    public function editDiet_plan($id) {
        $diets = DB::table('diet_plans')->where('dietid',$id)->get()->first();
        return view('admin_diet_edit', compact('diets'));
    }

    public function editDiet_planPost(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'diet_name' => 'required',
            'diet_type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::table('diet_plans')->where('dietid',$id)->update([
            'diet_name'=> $request->diet_name,
            'diet_types'=> $request->diet_type,
        ]);

        return redirect()->back()->with('success','แก้ไขแผนไดเอทสำเร็จ');
    }

    public function addDiet_plan() {
        return view('admin_diet_add');
    }

    public function addDiet_planPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'diet_name' => 'required',
            'diet_type' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dietid = mt_rand(1000, 9999);

        $dietidUnique = false;
        while (!$dietidUnique) {
            $existingMember = DB::table('diet_plans')->where('dietid', $dietid)->exists();
            if (!$existingMember) {
                $dietidUnique = true;
            } else {
                $dietid = mt_rand(1000, 9999);
            }
        }

        DB::table('diet_plans')->insert([
            'dietid'=> $dietid,
            'diet_name'=> $request->diet_name,
            'diet_types'=> $request->diet_type,
        ]);

        return redirect()->back()->with('success','เพิ่มแผนไดเอทสำเร็จ');
    }
    public function deleteDiet_plan($id) {
        DB::table('diet_plans')->where('dietid', $id)->delete();
        return redirect()->back()->with('delete_success','ลบแผนไดเอทสำเร็จ');
    }

    public function members() {
        $members = DB::table('members')->get();
        return view('admin_member', compact('members'));
    }

    public function editMembers($id) {
        $members = DB::table('members')->where('memberid',$id)->get()->first();
        return view('admin_member_edit', compact('members'));
    }

    public function deleteMembers($id) {
        DB::table('members')->where('memberid', $id)->delete();
        return redirect()->back()->with('delete_success','ลบสมาชิกสำเร็จ');
    }
    public function trainers() {
        $trainers = DB::table('trainers')->get();
        return view('admin_trainers', compact('trainers'));
    }

    public function deleteTrainers($id) {
        DB::table('trainers')->where('trainerid', $id)->delete();
        return redirect()->back()->with('delete_success','ลบผู้ฝึกสอนสำเร็จ');
    }

    public function logout() {
        if(session()->has('loggedInAdmin')) {
            session()->pull('loggedInAdmin');
            return redirect()->route('login.Admin');
        } else {
            return redirect()->route('home');
        }
    }
}
