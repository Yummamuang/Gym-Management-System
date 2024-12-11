@extends('layouts.main')
@section('style')
    @vite('resources/css/admin.css')
    @vite('resources/css/profiles.css')
@endsection

@section('content')
    @include('layouts.logged_nav_admin')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-48">

        <div class="w-3/4 mt-2 flex_items md:mt-6 display_content" style="max-width: 900px">
            @if (session()->has('success'))
                <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                    <p class="block pl-3 text-sm text-center text-green-500 pointer-events-none">{{ session('success') }}</p>
                </div>
            @endif
            <a href="{{ route('course.Admin') }}" class="block w-3/4 mx-auto underline backtoCourse">ย้อนกลับ</a>
            <form method="POST" action="{{ route('addCourse.Admin') }}" class="">
                @csrf
                <div class="grid grid-cols-2 xl:grid-cols-2 lg:gap-4">

                    <!-- Course Name -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 xl:mt-0" style="max-width: 450px">
                        <input id="cname" type="text" name="cname" placeholder=" " value="" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="cname" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ชื่อคอร์ส</label>
                    </div>

                    <!-- Course Price -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 xl:mt-0" style="max-width: 450px">
                        <input id="cost" type="number" name="cost" placeholder=" " value="" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="cost" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ราคา</label>
                    </div>

                    <!-- Course Day -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 xl:mt-0" style="max-width: 450px">
                        <input id="course_day" type="number" name="course_day" placeholder=" " value="" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="course_day" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ระยะเวลา</label>
                    </div>

                    <!-- Exercise Id -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 xl:mt-0" style="max-width: 450px">
                        <select name="exerciseid" id="exerciseid" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray ">
                            <option value="exerciseid" hidden>เลือกแผนการออกกำลังกาย</option>
                            @foreach ($exercises as $exercise)
                                @if (!$courses->contains('exerciseid', $exercise->exerciseid))
                                    <option value="{{ $exercise->exerciseid }}">{{ $exercise->exercise_name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label for="exerciseid" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">แผนการออกกำลังกาย</label>
                        <i class="absolute pointer-events-none fa-sharp fa-chevron-down"></i>
                    </div>

                    <!-- Diet Plan -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 address xl:mt-0" style="max-width: 450px">
                        <select name="dietid" id="dietid" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray ">
                            <option value="dietid" hidden class="f_gray">เลือกแผนการไดเอท</option>
                            @foreach ($diets as $diet)
                                @if (!$courses->contains('dietid', $diet->dietid))
                                    <option value="{{ $diet -> dietid }}">{{ $diet -> diet_name }}</option>
                                @endif
                            @endforeach

                        </select>
                        <label for="dietid" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">แผนการไดเอท</label>
                        <i class="absolute pointer-events-none fa-sharp fa-chevron-down"></i>
                    </div>


                </div>
                <!-- Confirm Button -->
                <div class="flex justify-center w-full col-span-2 mx-auto mt-4 lg:ml-auto lg:mx-0 xl:justify-end add_btt lg:mt-4">
                    <div class="grid w-full grid-cols-1 sm:block sm:mx-0">
                        <button type="submit" id="addcourse" class="w-full p-4 mx-auto mt-4 text-white rounded-2xl xs:rounded-3xl md:text-xl md:p-5 lg:text-2xl" style="min-width: 128px">เพิ่มคอร์ส</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
