@extends('layouts.main')

@section('style')
    @vite('resources/css/login.css')
@endsection

@section('content')
    <!-- nav -->
    @include('layouts.nav')

    <div class="flex flex-col items-center justify-center section">

        <!-- login text -->
        <div class="w-3/4 mt-2 flex_items">
            <h1 class="text-3xl font-semibold text-center f_gray xs:text-4xl sm:text-5xl lg:text-6xl">เข้าสู่ระบบสมาชิก</h1>
        </div>

        <div class="w-3/4 mt-2 flex_items md:mt-6">
            <form method="POST" action="{{ route('loginPost.Members') }}" name="login">
                @csrf

                <!-- Username -->
                <div class="relative mx-auto mt-2 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="username" type="username" name="username" placeholder=" " value="@if (session('error')) {{ session('error')[1] }} @endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="username" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ชื่อผู้ใช้</label>
                </div>
                <!-- error username -->
                @error('username')
                    <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                        <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                    </div>
                @enderror

                <!-- Password -->
                <div class="relative mx-auto mt-3 xs:mt-4 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="password" type="password" name="password" placeholder=" " class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="password" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รหัสผ่าน</label>
                </div>

                <!-- error password -->
                @if (session('error'))
                    <div class="w-full col-span-7 mx-auto mt-1 mb-5" style="min-width: 250px; max-width: 450px">
                        <p class="block pl-3 text-sm pointer-events-none f_red">{{ session('error')[0] }}</p>
                    </div>
                @endif

                <!-- Forgot Password -->
                <div class="pl-3 mx-auto mt-2" style="max-width: 450px">
                    <a href="{{ route('forgot.Members') }}" class="z-0 mr-2 text-sm underline opacity-75 f_gray sm:mr-4 md:text-base lg:text-lg">ลืมรหัสผ่าน?</a>
                </div>

                <!-- Submit -->
                <div class="flex mt-4 lg:mt-6" style="min-width: 250px">
                    <button type="submit" id="login" class="w-full p-4 mx-auto text-white rounded-xl sm:rounded-2xl md:text-xl md:p-5 lg:text-2xl">เข้าสู่ระบบ</button>
                </div>
            </form>
            @if (session()->has('success'))
                <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                    <p class="block pl-3 text-sm text-center text-green-500 pointer-events-none">{{ session('success') }}</p>
                </div>
            @endif
        </div>

        <!-- Register -->
        <div class="w-3/4 mt-12 text-center flex_items md:mt-16">
            <a href="{{ route('register.Members') }}" class="mr-1 text-xs underline f_gray sm:text-sm md:text-base lg:text-lg">สมัครสมาชิก</a>
        </div>
    </div>

    <script>
        @include('layouts.fullpage')
    </script>

@endsection
