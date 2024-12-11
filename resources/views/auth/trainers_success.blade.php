@extends('layouts.main')

@section('style')
    @vite('resources/css/login.css')
@endsection

@section('content')
    <!-- nav -->
    @include('layouts.nav')
    <div class="flex flex-col items-center justify-center section">

        <!-- logo -->
        <div class="w-3/4 mt-4" style="max-width: 500px">
            <img src="{{ asset('img/Gym_logo_red.svg') }}" alt="Gym logo">
        </div>

        <!-- login text -->
        <div class="w-3/4 mt-6 md:mt-8 xl:mt-10 flex_items">
            <h1 class="text-3xl font-semibold text-center f_gray xs:text-4xl sm:text-5xl lg:text-6xl">สมัครเป็นผู้สอนสำเร็จ!</h1>
        </div>

        <!-- Submit -->
        <div class="flex w-3/4 mt-6 sm:mt-7 md:mt-8" style="min-width: 250px">
            <a href="{{ route('login.Trainers') }}" type="submit" id="login" class="w-1/2 p-4 mx-auto text-center text-white rounded-xl sm:rounded-2xl md:text-xl md:p-5 lg:text-2xl go_to_login">ไปหน้าเข้าสู่ระบบ</a>
        </div>

    </div>


    <script>
        @include('layouts.fullpage')
    </script>
@endsection
