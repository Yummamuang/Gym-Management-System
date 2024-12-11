@extends('layouts.main')

@section('style')
    @vite('resources/css/login.css')
@endsection

@section('content')
    <div class="flex flex-col items-center justify-center section">
        <!-- logo -->
        @include('layouts.logo')

        <!-- login text -->
        <div class="w-3/4 mt-2 flex_items">
            <h1 class="text-3xl italic font-semibold text-center f_gray xs:text-4xl sm:text-5xl lg:text-6xl lg:font-bold" style="font-family: "Readex Pro" >Admin</h1>
        </div>

        <div class="w-3/4 mt-2 flex_items md:mt-6">
            <form method="POST" action="{{ route('loginPost.Admin') }}" class="">
                @csrf

                <!-- Username -->
                <div class="relative mx-auto mt-2 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="username" type="username" name="username" placeholder="" autocomplete="username" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="username" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ชื่อผู้ใช้</label>
                </div>
                <!-- error username -->
                @error('username')
                    <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                        <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                    </div>
                @enderror

                <!-- Password -->
                <div class="relative mx-auto mt-2 xs:mt-4 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="password" type="password" name="password" placeholder="" autocomplete="current-password" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="password" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รหัสผ่าน</label>
                </div>

                <!-- Submit -->
                <div class="flex mt-4 xs:mt-5 md:mt-7 lg:mt-8" style="min-width: 250px">
                    <button type="submit" id="login" class="w-full p-4 mx-auto text-white rounded-xl sm:rounded-2xl md:text-xl md:p-5 lg:text-2xl">เข้าสู่ระบบ</button>
                </div>
            </form>
        </div>
    </div>
@endsection
