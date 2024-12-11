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
        <div class="grid w-full grid-cols-2 gap-6 px-8 xs:grid-cols-3 lg:gap-24 xl:grid-cols-4 2xl:grid-cols-5 place-items-center" id="dashboard">
            @if ($courses -> cname == null)
            <div class="flex items-center justify-center w-full col-span-2 py-8 xs:col-span-3 xl:col-span-4 2xl:col-span-5 rounded-3xl grid_items" style="max-width: 1200px">
                <div>
                    <div class="mb-6 font-medium text-center text-white mt-6text-5xl lg:text-7xl">กรุณาเลือกคอร์สที่จะสอน!</div>
                </div>
            </div>
            @else
            <div class="flex items-center justify-center w-full col-span-2 py-8 xs:col-span-3 xl:col-span-4 2xl:col-span-5 rounded-3xl grid_items" style="max-width: 1200px">
                <div>
                    <div class="pl-4 mb-3 text-lg italic text-white lg:text-4xl">กำลังสอนคอร์ส</div>
                    <div class="mb-6 text-5xl font-medium text-center text-white lg:text-7xl">{{ $courses -> cname }}</div>
                    <div class="mb-3 text-2xl font-medium text-center text-white lg:text-4xl">การออกกำลังกายที่ต้องสอน: {{ $exercises -> exercise_name }}</div>
                    <div class="text-2xl font-medium text-center text-white lg:text-4xl">แผนการไดเอทที่ต้องสอน: {{ $diets -> diet_name }}</div>
                </div>
            </div>
            @endif

            <div class="flex items-center justify-center w-full col-span-2 py-8 xs:col-span-3 xl:col-span-4 2xl:col-span-5 rounded-3xl grid_items" style="max-width: 1200px">
                <div>
                    <div class="mb-6 text-5xl font-medium text-center text-white lg:text-7xl">{{ number_format($trainers -> salary) }}บาท</div>
                    <div class="w-full pl-4 mb-3 text-2xl text-center text-white lg:text-5xl">เงินเดือนของคุณ</div>
                </div>
            </div>

        </div>
    </div>
@endsection
