@extends('layouts.main')
@section('style')
    @vite('resources/css/login.css')
    <style>
        #courses_box {
            max-width: 800px;
            min-height: 200px;
            width: 90%;
            border-radius: 25px;
            background: white;
        }

        .col-span-1 {
            height: 100%;
            background: var(--red_color);
            border-radius: 25px 0 0 25px;
        }

        .regis_course {
            background: var(--green_color);
            transition: var(--transition-1)
        }

        .regis_course:hover {
            background: var(--dark_green_color);
        }

        .profile_pic {
            width: 150px;
            margin-top: 30px
        }

        @media screen and (min-width: 1024px) {
            #courses_box {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    @include('layouts.logged_nav')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-60 lg:pr-16">
        <div class="grid grid-cols-3 mb-8" id="courses_box">
            <div class="relative col-span-1">
                <div class="mt-4 ml-3 text-xs italic font-medium text-white readex_font lg:indent-8 sm:text-base md:text-xl"  >
                    Member Card
                </div>
                <div class="mx-2 lg:mx-6 translate-y-1/4">
                    @if ($members->image == null)
                        <img src="{{ asset('img/circle-user-solid.svg') }}" alt="" class="block mx-auto profile_pic" width="100px" style="min-width: 60px">
                    @else
                        <img src="{{ asset($members->image) }}" alt="" class="block mx-auto rounded-full profile_pic" style="min-width: 60px">
                    @endif
                </div>
            </div>
            <div class="relative col-span-2">
                <div class="mx-6 mt-8 lg:text-xl f_gay" >
                    <h1 class="font-semibold lg:text-4xl">{{ Str::limit($members->mfname . " " . $members->mlname, 20) }}</h1>
                </div>
                <div class="mx-6 mt-2 lg:text-xl f_gray">
                    <h1 class="font-semibold lg:text-4xl">{{ "#" . $members->memberid }}</h1>
                </div>
                <div class="mx-6 mt-5 lg:text-xl f_gray">
                    <h2 class="lg:text-2xl"><span class="font-medium">ที่อยู่&nbsp;</span> {{ $members -> address }} </h2>
                </div>
                <div class="mx-6 mt-3 lg:text-xl f_gray">
                    <h2 class="lg:text-2xl"><span class="font-medium">เบอร์โทรศัพท์&nbsp;</span> {{ $members -> phone }} </h2>
                </div>
                <div class="flex justify-center my-4">
                   {!! DNS1D::getBarcodeHTML("$members->memberid", 'PHARMA', 5, 60) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
