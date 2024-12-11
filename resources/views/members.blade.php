@extends('layouts.main')
@section('style')
    @vite('resources/css/login.css')

    <style>
        .grid_items {
            background: var(--red_color);
        }
    </style>
@endsection

@section('content')
    @include('layouts.logged_nav')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-60">
        <div class="grid w-full grid-cols-2 gap-6 px-8 xs:grid-cols-3 lg:gap-8 xl:grid-cols-4 2xl:grid-cols-5 place-items-center" id="dashboard">

            <div class="flex items-center justify-center col-span-1 lg:w-full rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-5xl text-center text-white lg:text-7xl">{{ $bmi }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">ค่า BMI ของคุณ</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-full rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="px-5 text-3xl text-center text-white lg:text-5xl">{{ $bmi_text }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl"></div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:col-span-2 lg:w-full rounded-3xl h-36 grid_items w-36 lg:h-56">
               @if (empty($courses) || $courses -> cname == null)
                <div>
                    <div class="px-5 text-5xl text-center text-white lg:text-5xl">คุณไม่มีคอร์สเรียน</div>
                    <div class="mt-2 text-lg text-center text-white lg:text-2xl"></div>
                </div>
               @elseif (!empty($courses) || $courses -> cname != null)
                <div>
                    <div class="px-5 text-2xl text-center text-white lg:text-5xl">{{ $courses -> cname }}</div>
                    <div class="mt-2 text-lg text-center text-white lg:text-2xl">กำลังเรียนคอร์ส</div>
                </div>
               @endif
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-full rounded-3xl h-36 grid_items w-36 lg:h-56">
               @if ($checkin_count == null)
                <div>
                    <div class="px-5 text-5xl text-center text-white lg:text-5xl">ไปออกกำลังกายกันเถอะ</div>
                    <div class="mt-2 text-lg text-center text-white lg:text-2xl"></div>
                </div>
               @else
                <div>
                    <div class="px-5 text-5xl text-center text-white lg:text-7xl">{{ $checkin_count }}</div>
                    <div class="mt-2 text-lg text-center text-white lg:text-2xl">เข้ายิมไปแล้วทั้งหมด (ครั้ง)</div>
                </div>
               @endif
            </div>

        </div>
    </div>

@endsection
