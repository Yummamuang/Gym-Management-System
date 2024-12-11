@extends('layouts.main')
@section('style')
    @vite('resources/css/admin.css')
@endsection

@section('content')
    @include('layouts.logged_nav_admin')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-48">
        <div class="w-1/2 mt-6 flex_items" style="max-width: 250px">
            <a href="{{ route('addCourse.Admin') }}" class="block p-2 px-4 ml-auto text-sm text-center lg:text-xl add_course rounded-xl lg:p-3 lg:px-10">
                เพิ่มคอร์ส
            </a>
        </div>
        @if (session('success'))
            <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                <p class="block text-sm text-center text-green-500 pointer-events-none lg:text-lg">{{ session('success') }}</p>
            </div>
        @endif
        @if (session('delete_success'))
            <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                <p class="block text-sm text-center text-green-500 pointer-events-none lg:text-lg">{{ session('delete_success') }}</p>
            </div>
        @endif
        <div class="w-3/4 mt-2 overflow-auto flex_items display_content">
            <table class="mt-4" style="width: 2100px">
                <thead>
                    <tr>
                        <td class="text-center">ลำดับที่</td>
                        <td class="text-center">ชื่อคอร์ส</td>
                        <td class="text-center">รหัสคอร์ส</td>
                        <td class="text-center">ราคา</td>
                        <td class="text-center">รหัสสมาชิก</td>
                        <td class="text-center">รหัสผู้ฝึกสอน</td>
                        <td class="text-center">สมัครเมื่อ</td>
                        <td class="text-center">วันหมดอายุคอร์ส</td>
                        <td class="text-center">แผนการออกกำลังกาย</td>
                        <td class="text-center">แผนการไดเอท</td>
                        <td class="text-center">ระยะเวลา</td>
                        <td class="text-center">ลบ</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ( $courses as $course )
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $course -> cname }}</td>
                            <td>{{ $course -> courseid }}</td>
                            <td>{{ $course -> cost }}</td>
                            <td>{{ $course -> memberid }}</td>
                            <td>{{ $course -> trainerid }}</td>
                            <td>{{ $course -> start_course }}</td>
                            <td>{{ $course -> end_course }}</td>
                            <td>{{ $course -> exerciseid }}</td>
                            <td>{{ $course -> dietid }}</td>
                            <td>{{ $course -> course_day }}</td>
                            <td>
                                <a href="{{ route('deleteCourses.Admin',$course-> courseid) }}" class="block text-center underline f_red">ลบ</a>
                            </td>
                        </tr>
                        @php
                        $i += 1;
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
