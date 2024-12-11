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
            <h1 class="text-3xl font-semibold text-center f_gray xs:text-4xl sm:text-5xl lg:text-6xl">รีเซ็ตรหัสผ่าน</h1>
        </div>

        <div class="w-3/4 mt-2 flex_items md:mt-6">
            <form method="POST" action="{{ route('resetPasswordPost.Trainers') }}" name="login">
                @csrf
                <input type="text" hidden value="{{ $token }}" name="token">

                <!-- email -->
                <div class="relative mx-auto mt-2 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="email" type="email" name="email" placeholder=" " class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="email" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">อีเมล</label>
                </div>
                <!-- error email -->
                @error('email')
                    <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                        <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                    </div>
                @enderror

                <!-- Password -->
                <div class="relative mx-auto mt-3 xs:mt-4 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="password" type="password" name="password" placeholder=" " class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="password" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รหัสผ่าน</label>
                </div>

                <!-- confirm_password -->
                <div class="relative mx-auto mt-3 xs:mt-4 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="password_confirmation" type="password" name="password_confirmation" placeholder=" " class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="password_confirmation" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รหัสผ่าน</label>
                </div>

                 <!-- error password -->
                @error('password')
                 <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                     <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                 </div>
                @enderror

                <!-- Submit -->
                <div class="flex mt-4 lg:mt-6" style="min-width: 250px">
                    <button type="submit" id="login" class="w-full p-4 mx-auto text-white rounded-xl sm:rounded-2xl md:text-xl md:p-5 lg:text-2xl">ยืนยัน</button>
                </div>

                @if (session()->has('error'))
                    <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                        <p class="block pl-3 text-sm pointer-events-none f_red">{{ session('success') }}</p>
                    </div>
                @endif

            </form>
        </div>
    </div>

    <script>
        @include('layouts.fullpage')
    </script>

@endsection
