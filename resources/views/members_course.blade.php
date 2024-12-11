@extends('layouts.main')
@section('style')
    @vite('resources/css/login.css')

    <style>
        #courses_box {
            max-width: 800px;
            min-height: 200px;
            width: 100%;
            border-radius: 25px;
            background: white;
        }

        .col-span-1 {
            background: var(--red_color);
            border-radius: 25px 0 0 25px;;
        }

        .regis_course {
            background: var(--green_color);
            transition: var(--transition-1)
        }

        .regis_course:hover {
            background: var(--dark_green_color);
        }
    </style>
@endsection

@section('content')
    @include('layouts.logged_nav')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-60 lg:pr-16">

        @if ($course_check == false)
            @foreach ($allcourses as $course)
                @php
                $exercises = DB::table('exercises')->where('exerciseid', $course -> exerciseid)->select('exercise_name')->get();
                foreach ($exercises as $exercise) {
                    $exercise_name = $exercise -> exercise_name;
                }

                $diets = DB::table('diet_plans')->where('dietid', $course -> dietid)->select('diet_name')->get();

                foreach ($diets as $diet) {
                    $diet_name = $diet -> diet_name;
                }
                @endphp

                <div class="grid grid-cols-3 mb-8" id="courses_box">
                    <div class="relative col-span-1">
                        <div class="mt-4 italic font-medium text-white readex_font indent-8" >
                            Course
                        </div>
                        <div class="mx-6 mt-4 text-3xl font-medium text-white">
                        {{ $course -> cname }}
                        </div>
                        <div class="absolute bottom-0 mb-4 text-white mx-9">
                            รหัสคอร์ส : {{ $course -> courseid }}
                        </div>
                    </div>
                    <div class="relative col-span-2">
                        <div class="mx-6 mt-8 text-xl f_gay" >
                            {{ $exercise_name }}
                        </div>
                        <div class="mx-6 mt-2 text-xl f_gray">
                            {{ $diet_name }}
                        </div>
                        <div class="mx-6 mt-2 text-xl f_gray">
                            ระยะเวลา {{ $course -> course_day }} วัน
                        </div>
                        <div class="mx-6 mt-2 text-xl font-medium f_gray">
                            ราคา : {{ $course -> cost }} บาท
                        </div>
                        <div class="absolute bottom-0 right-0 px-5 py-3 mb-4 mr-6 text-white rounded-full regis_course">
                            <a href="{{ route('addcourse.Members', ['memberid' => $members->memberid, 'courseid' => $course->courseid, 'day' => $course -> course_day, 'price' => $course -> cost]) }}">สมัครคอร์ส</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            @foreach ($courses as $course)
                @php
                $exercises = DB::table('exercises')->where('exerciseid', $course -> exerciseid)->select('exercise_name')->get();
                foreach ($exercises as $exercise) {
                    $exercise_name = $exercise -> exercise_name;
                }

                $diets = DB::table('diet_plans')->where('dietid', $course -> dietid)->select('diet_name')->get();

                foreach ($diets as $diet) {
                    $diet_name = $diet -> diet_name;
                }
                @endphp

                <div class="grid grid-cols-3 mb-8" id="courses_box">
                    <div class="relative col-span-1">
                        <div class="mt-4 italic font-medium text-white readex_font indent-8" >
                            Course
                        </div>
                        <div class="mx-6 mt-4 text-3xl font-medium text-white">
                        {{ $course -> cname }}
                        </div>
                        <div class="absolute bottom-0 mb-4 text-white mx-9">
                            รหัสคอร์ส : {{ $course -> courseid }}
                        </div>
                    </div>
                    <div class="relative col-span-2">
                        <div class="mx-6 mt-8 text-xl f_gay" >
                            {{ $exercise_name }}
                        </div>
                        <div class="mx-6 mt-2 text-xl f_gray">
                            {{ $diet_name }}
                        </div>
                        <div class="mx-6 mt-2 text-xl f_gray">
                            หมดเวลาคอร์สวันที่ {{ $course -> end_course }}
                        </div>
                        <div class="mx-6 mt-2 text-xl font-medium f_gray">
                            ราคา : {{ $course -> cost }} บาท
                        </div>
                        <div class="absolute bottom-0 right-0 px-5 py-3 mb-4 mr-6 text-white rounded-full pointer-events-none regis_course">
                            สมัครคอร์สเรียบร้อย
                        </div>
                    </div>
                </div>
            @endforeach
        @endif


    </div>
@endsection
