@extends('layouts.main')
@section('style')
    @vite('resources/css/profiles.css')
@endsection

@section('content')
    @include('layouts.logged_nav')

    <div class="mx-auto mt-10 flex_items text-end logout_wrap">
        <a href="{{ route('logout.Members') }}" class="p-2 px-4 ml-auto lg:text-xl logout rounded-xl lg:p-3 lg:px-10">
            Logout
        </a>
    </div>

    <div class="flex flex-col items-center justify-center pt-10 mb-20">

        <!-- login text -->
        <div class="w-3/4 mt-2 flex_items">
            <h1 class="text-3xl font-semibold text-center f_gray xs:text-4xl sm:text-5xl lg:text-6xl">แก้ไขโปรไฟล์</h1>
        </div>

        @if (session()->has('success'))
            <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                <p class="block pl-3 text-sm text-center text-green-500 pointer-events-none">{{ session('success') }}</p>
            </div>
        @endif
        @if (session()->has('success_profile'))
            <div class="w-full col-span-7 mx-auto mt-4" style="min-width: 250px; max-width: 450px">
                <p class="block text-sm text-center text-green-500 pointer-events-none">{{ session('success_profile') }}</p>
            </div>
        @endif

        <div class="w-3/4 mt-2 flex_items md:mt-6 display_content" style="max-width: 750px">


            <form method="POST" action="{{ route('profileUpdatePicture.Members') }}" class="mb-4" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-2 xl:grid-cols-2 lg:gap-4">
                    <!-- Prodfile pic -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 xl:mt-0" style="max-width: 750px">
                        <input id="image" type="file" name="image" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm cursor-pointer rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray" style="max-width: none"/>
                        <label for="image" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รูปโปรไฟล์</label>
                        @if ($members->image == null)
                            <img src="{{ asset('img/circle-user-solid.svg') }}" alt="" class="absolute block profile_pic"  width="100px">
                        @else
                            <img src="{{ asset($members->image) }}" alt="" class="absolute block rounded-full profile_pic" >
                        @endif


                        <button type="submit" class="absolute px-4 py-2 text-white rounded-lg" id="profile_pic_btt">บันทึก</button>
                        <!-- error Xl -->
                        @error('image')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-24 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error Prodfile pic -->
                    @error('image')
                        <div class="w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
            </form>

            <form method="POST" action="{{ route('profileUpdate.Members') }}" class="">
                @csrf

                <div class="grid grid-cols-2 xl:grid-cols-2 lg:gap-4">
                    <!-- Weight -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 xl:mt-0" style="max-width: 450px">
                        <input id="weight" type="number" name="weight" placeholder=" " value="{{ $members->weight }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="weight" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">น้ำหนัก (kg)</label>
                        <!-- error Xl -->
                        @error('weight')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error weight -->
                    @error('weight')
                        <div class="w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Height -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 xl:mt-0" style="max-width: 450px">
                        <input id="height" type="number" name="height" placeholder=" " value="{{ $members->height }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="height" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ส่วนสูง (cm)</label>
                        <!-- error Xl -->
                        @error('height')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error height -->
                    @error('height')
                        <div class="w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Phone -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 phone xl:mt-0" style="max-width: 450px">
                        <input id="phone" type="tel" name="phone" placeholder=" " value="{{ $members->phone }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="phone" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">เบอร์โทรศัพท์</label>
                        <!-- error Xl -->
                        @error('phone')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error phone -->
                    @error('phone')
                        <div class="w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Address -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 address xl:mt-0" style="max-width: 450px">
                        <input id="address" type="text" name="address" placeholder=" " value="{{ $members->address }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="address" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ที่อยู่</label>
                        <!-- error Xl -->
                        @error('address')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error address -->
                    @error('address')
                        <div class="w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Username -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 username xl:mt-0" style="max-width: 450px">
                        <input id="username" type="text" name="username" placeholder=" " value="{{ $members->username }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="username" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ชื่อผู้ใช้ (A-Z หรือ a-z)</label>
                        <!-- error Xl -->
                        @error('username')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error username -->
                    @error('username')
                        <div class="absolute w-full col-span-2 mx-auto mt-1 xl:hidden top-3/4 left-3 ">
                            <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror


                    <!-- Email -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 email xl:mt-0" style="max-width: 450px">
                        <input id="email" type="email" name="email" placeholder=" " value="{{ $members->email }}" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="email" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">อีเมล</label>
                         <!-- error Xl -->
                        @error('email')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error email -->
                    @error('email')
                        <div class="w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Password -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 password xl:mt-0" style="max-width: 450px">
                        <input id="password" type="password" name="password" placeholder=" " value="" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="password" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">รหัสผ่าน</label>
                         <!-- error Xl -->
                        @error('password')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>
                    <!-- error password -->
                    @error('password')
                        <div class="absolute w-full col-span-2 mx-auto mt-1 xl:hidden">
                            <p class="block pl-3 text-sm pointer-events-none f_red">{{ $message }}</p>
                        </div>
                    @enderror

                    <!-- Password -->
                    <div class="relative w-full col-span-2 mx-auto mt-3 lg:col-span-1 password xl:mt-0" style="max-width: 450px">
                        <input id="password_confirmation" type="password" name="password_confirmation" placeholder=" " value="" class="block w-full h-full px-4 pt-6 pb-2 mx-auto text-sm rounded-xl sm:rounded-2xl sm:px-5 sm:text-sm md:px-6 md:text-base md:pt-7 md:pb-4 lg:text-base f_gray "/>
                        <label for="password_confirmation" class="absolute block pl-3 mx-auto pointer-events-none f_gray md:text-lg">ยืนยันรหัสผ่าน</label>
                         <!-- error Xl -->
                        @error('password_confirmation')
                            <div class="absolute hidden w-full col-span-1 mx-auto xl:block top-3/4 left-3 ">
                                <p class="block pl-3 text-xs pointer-events-none f_red">{{ $message }}</p>
                            </div>
                        @enderror
                    </div>

                </div>
                <!-- Confirm Button -->
                <div class="flex justify-center w-full col-span-2 mx-auto mt-4 lg:ml-auto lg:mx-0 xl:justify-end register_btt lg:mt-4">
                    <div class="grid w-full grid-cols-1 sm:block sm:mx-0" style="max-width: 367px">
                        <button type="submit" id="login" class="w-full p-4 mx-auto mt-4 text-white rounded-2xl xs:rounded-3xl md:text-xl md:p-5 lg:text-2xl" style="min-width: 128px">ยืนยัน</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
