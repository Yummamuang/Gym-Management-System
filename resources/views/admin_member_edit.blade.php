@extends('layouts.main')
@section('style')
    @vite('resources/css/mems_trains.css')
    @vite('resources/css/admin.css')
    @vite('resources/css/profiles.css')
@endsection

@section('content')
    @include('layouts.logged_nav_admin')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-48">
        @if (session()->has('success'))
                <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                    <p class="block pl-3 text-sm text-center text-green-500 pointer-events-none">{{ session('success') }}</p>
                </div>
        @endif
        <div class="w-3/4 mt-2 flex_items md:mt-6 display_mems_trains">
            @if (session()->has('success'))
                <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                    <p class="block pl-3 text-sm text-center text-green-500 pointer-events-none">{{ session('success') }}</p>
                </div>
            @endif
            <a href="{{ route('members.Admin') }}" class="block w-3/4 mx-auto underline backtoCourse">ย้อนกลับ</a>
            <div class="w-full mt-2 flex_items md:mt-6" style="max-width: 1366px">
                <form method="POST" action="{{ route('editMembersPost.Admin') }}" class="">
                    @csrf
                    <div class="grid grid-cols-7 xl:gap-4">
                        <!-- First name -->
                        <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-2 xl:mt-0" style="max-width: 450px">
                            <input id="firstname" type="text" name="firstname" placeholder=" " value="{{ $members->mfname }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
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
                            <input id="lastname" type="text" name="lastname" placeholder=" " value="{{ $members->mlname }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
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
                        <div class="relative w-full col-span-7 mx-auto mt-3 md:mt-6 xl:col-span-3 xl:mt-0" style="max-width: 450px">
                            <input id="birthday" type="date" name="birthday" value="{{ $members->birthday }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
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
                        <!-- Confirm Button -->
                        <div class="flex justify-center w-full col-span-7 mx-auto mt-4 lg:ml-auto lg:mx-0 xl:justify-end add_btt lg:mt-4">
                            <div class="grid w-full grid-cols-1 sm:block sm:mx-0">
                                <button type="submit" class="w-full p-4 mx-auto mt-4 text-white rounded-2xl xs:rounded-3xl md:text-xl md:p-5 lg:text-2xl" style="min-width: 128px">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
