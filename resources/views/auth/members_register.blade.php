@extends('layouts.main')

@section('style')
    @vite('resources/css/regis.css')
@endsection

@section('content')
    <!-- nav -->
    @include('layouts.nav')

    <div class="flex flex-col items-center justify-center mt-3 mb-14 sm:mt-10 xl:mt-0 xl:mb-0 section">

        <!-- register text -->
        <div class="w-3/4 xl:mb-4 flex_items">
            <h1 class="text-3xl font-semibold text-center f_gray xs:text-4xl sm:text-5xl lg:text-6xl">สมัครสมาชิก</h1>
        </div>

        <div class="w-3/4 mt-2 flex_items md:mt-6" style="max-width: 1366px">
            <form method="POST" action="{{ route('registerPost.Members') }}" class="">
                @csrf
                <div class="grid grid-cols-7 xl:gap-4">
                    <!-- First name -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-2 xl:mt-0" style="max-width: 450px">
                        <input id="firstname" type="text" name="firstname" placeholder=" " value="@if(session('error')){{ session('error')[0] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="firstname" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ชื่อ</label>
                         <!-- error Xl -->
                        @error('firstname')
                            <div class="absolute hidden w-full col-span-2 mx-auto xl:block top-3/4 left-1">
                                <p class="block pl-3 text-xs pointer-events-none f_red indent-2">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- error First name -->
                    @error('firstname')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden" style="max-width: 450px">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Last name -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-2 xl:mt-0" style="max-width: 450px">
                        <input id="lastname" type="text" name="lastname" placeholder=" " value="@if(session('error')){{ session('error')[1] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="lastname" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">นามสกุล</label>
                        <!-- error Xl -->
                        @error('lastname')
                            <div class="absolute hidden w-full col-span-2 mx-auto xl:block top-3/4 left-3">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                         @enderror
                    </div>

                    <!-- error last name -->
                    @error('lastname')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden" style="max-width: 450px">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Birthday -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-2 xl:mt-0" style="max-width: 450px">
                        <input id="birthday" type="text" name="birthday" value="@if(session('error')){{ session('error')[2] }}@else{{ $today }}@endif" onfocus="(this.type='date')" onblur="(this.type='text')" required class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="birthday" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">เดือน/วัน/ปีเกิด (ค.ศ.)</label>
                        <!-- error Xl -->
                        @error('birthday')
                            <div class="absolute hidden w-full col-span-2 mx-auto xl:block top-3/4 left-3">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- error birthday -->
                    @error('birthday')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden" style="max-width: 450px">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Sex -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-1 xl:mt-0" style="max-width: 450px">
                        <select name="sex" id="sex" value="@if(session('error')){{ session('error')[3] }}@endif"  class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray ">
                            <option value="sex" hidden>เลือกเพศ</option>
                            <option value="male" @if(session('error') && session('error')[3] == 'male') selected @endif>ชาย</option>
                            <option value="female" @if(session('error') && session('error')[3] == 'female') selected @endif>หญิง</option>
                        </select>
                        <label for="sex" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">เพศ</label>
                        <i class="absolute pointer-events-none fa-sharp fa-chevron-down"></i>
                        <!-- error Xl -->
                        @error('sex')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                    <!-- error sex -->
                    @error('sex')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror


                    <!-- Weight -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-2 xl:mt-0" style="max-width: 450px">
                        <input id="weight" type="number" name="weight" placeholder=" " value="@if(session('error')){{ session('error')[4] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="weight" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">น้ำหนัก (kg)</label>
                        <!-- error Xl -->
                        @error('weight')
                            <div class="absolute hidden w-full col-span-2 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error weight -->
                    @error('weight')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Height -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-2 xl:mt-0" style="max-width: 450px">
                        <input id="height" type="number" name="height" placeholder=" " value="@if(session('error')){{ session('error')[5] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="height" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ส่วนสูง (cm)</label>
                        <!-- error Xl -->
                        @error('height')
                            <div class="absolute hidden w-full col-span-2 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error height -->
                    @error('height')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Phone -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-3 phone xl:mt-0">
                        <input id="phone" type="tel" name="phone" placeholder=" " value="@if(session('error')){{ session('error')[6] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="phone" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">เบอร์โทรศัพท์</label>
                        <!-- error Xl -->
                        @error('phone')
                            <div class="absolute hidden w-full col-span-3 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error phone -->
                    @error('phone')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Address -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-4 address xl:mt-0">
                        <input id="address" type="text" name="address" placeholder=" " value="@if(session('error')){{ session('error')[7] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="address" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ที่อยู่</label>
                        <!-- error Xl -->
                        @error('address')
                            <div class="absolute hidden w-full col-span-4 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error address -->
                    @error('address')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Username -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-3 username xl:mt-0">
                        <input id="username" type="text" name="username" placeholder=" " value="@if(session('error')){{ session('error')[8] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="username" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ชื่อผู้ใช้ (A-Z หรือ a-z)</label>
                        <!-- error Xl -->
                        @error('username')
                            <div class="absolute hidden w-full col-span-3 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error username -->
                    @error('username')
                        <div class="absolute w-full col-span-7 mx-auto mt-1 xl:hidden top-3/4 left-3 ">
                            <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror


                    <!-- Email -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-4 email xl:mt-0">
                        <input id="email" type="email" name="email" placeholder=" " value="@if(session('error')){{ session('error')[9] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="email" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">อีเมล</label>
                         <!-- error Xl -->
                        @error('email')
                            <div class="absolute hidden w-full col-span-4 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error email -->
                    @error('email')
                        <div class="w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Password -->
                    <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-3 password xl:mt-0">
                        <input id="password" type="password" name="password" placeholder=" " value="@if(session('error')){{ session('error')[10] }}@endif" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="password" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รหัสผ่าน</label>
                         <!-- error Xl -->
                        @error('password')
                            <div class="absolute hidden w-full col-span-3 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error password -->
                    @error('password')
                        <div class="absolute w-full col-span-7 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="xl:col-span-4">
                        <span>
                            <a href="{{ route('login.Members') }}" class="hidden mt-10 text-sm underline text-end f_gray sm:mr-4 lg:text-lg xl:block">เป็นสมาชิกแล้วใช่ไหม? เข้าสู่ระบบเลย</a>
                        </span>
                    </div>

                    <!-- Register Button -->
                    <div class="flex justify-center w-full col-span-7 mx-auto mt-4 jus md:mt-10 xl:justify-end register_btt xl:col-span-3 xl:mt-0">
                        <div class="grid w-full grid-cols-1 mx-auto sm:block sm:mx-0">
                            <button type="submit" id="login" class="w-full p-4 mx-auto mt-4 text-white rounded-2xl xs:rounded-3xl md:text-xl md:p-5 lg:text-2xl" style="min-width: 128px">สมัครสมาชิก</button>
                            <span class="xl:hidden">
                                <a href="{{ route('login.Members') }}" class="block mt-10 mr-2 text-sm text-center underline f_gray sm:mr-4 md:text-base lg:text-lg">เป็นสมาชิกแล้วใช่ไหม? เข้าสู่ระบบเลย</a>
                            </span>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        if (window.innerWidth >= 1280 && window.innerHeight >= 650) {
            @include('layouts.fullpage')
        }
    </script>
@endsection
