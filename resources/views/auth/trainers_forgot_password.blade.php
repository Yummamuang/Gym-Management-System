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
            <form method="POST" action="{{ route('forgotPost.Trainers') }}" class="">
                @csrf
                
                <!-- Email -->
                <div class="relative mx-auto mt-2 md:mt-6" style="min-width: 250px; max-width: 450px">
                    <input id="email" type="email" name="email" placeholder=" " class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-4 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                    <label for="email" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">อีเมล</label>
                </div>
                <!-- error Email -->
                @error('email')
                    <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                        <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                    </div>
                @enderror

                <!-- Email Sended Successfully -->
                @if (session()->has('success'))
                    <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                        <p class="block pl-3 text-sm text-green-500 pointer-events-none">{{ session('success') }}</p>
                    </div>
                @endif

                <!-- Submit -->
                <div class="flex mt-4 lg:mt-6" style="min-width: 250px">
                    <button type="submit" id="login" class="w-full p-4 mx-auto text-white rounded-xl sm:rounded-2xl md:text-xl md:p-5 lg:text-2xl">รีเซ็ตรหัสผ่าน</button>
                </div>
            </form>
        </div>

        <!-- Register -->
        <div class="w-3/4 mt-12 text-center flex_items md:mt-16">
            <a href="{{ route('register.Members') }}" class="text-xs underline f_gray sm:text-sm md:text-base lg:text-lg">สมัครสมาชิก</a>
        </div>
    </div>

    <script>
        @include('layouts.fullpage')
    </script>

@endsection
