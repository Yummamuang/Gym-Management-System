@extends('layouts.main')
@section('style')
    @vite('resources/css/exercise.css')
@endsection

@section('content')
    @include('layouts.logged_nav_admin')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-48">
        <div class="w-1/2 mt-6 flex_items" style="max-width: 300px">
            <a href="{{ route('addExercise.Admin') }}" class="block p-2 px-4 ml-auto text-sm text-center lg:text-xl add_course rounded-xl lg:p-3 lg:px-10">
                เพิ่มแผนออกกำลังกาย
            </a>
        </div>
        @if (session('delete_success'))
            <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                <p class="block text-sm text-center text-green-500 pointer-events-none lg:text-lg">{{ session('delete_success') }}</p>
            </div>
        @endif
        <div class="w-3/4 mx-auto mt-2 overflow-auto flex_items exercise_wrap" >
            <table class="mt-4 overflow-auto">
                <thead>
                    <tr>
                        <td class="text-center">ลำดับที่</td>
                        <td class="text-center">รหัสแผนออกกำลังกาย</td>
                        <td class="text-center">ประเภทออกกำลังกาย</td>
                        <td class="text-center">ชื่อออกการกำลังกาย</td>
                        <td class="text-center">แก้ไข</td>
                        <td class="text-center">ลบ</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ( $exercises as $exercise)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $exercise -> exerciseid }}</td>
                            <td>{{ $exercise -> exercise_name }}</td>
                            <td>{{ $exercise -> exercise_types }}</td>
                            <td>
                                <a href="{{ route('editExercise.Admin',$exercise -> exerciseid) }}" class="block text-center text-green-500 underline">แก้ไข</a>
                            </td>
                            <td>
                                <a href="{{ route('deleteExercise.Admin',$exercise -> exerciseid) }}" class="block text-center underline f_red">ลบ</a>
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
