@extends('layouts.main')
@section('style')
    @vite('resources/css/admin.css')

    <style>
        .grid_items {
            background: var(--red_color);
        }
    </style>
@endsection

@section('content')
    @include('layouts.logged_nav_admin')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-60">
        <div class="grid w-full grid-cols-2 gap-6 px-8 xs:grid-cols-3 lg:gap-24 xl:grid-cols-4 2xl:grid-cols-5 place-items-center" id="dashboard">
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $members_count }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">จำนวนสมาชิก</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $trainers_count }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">จำนวนผู้ฝึกสอน</div>
                </div>
            </div>
            <div class="flex items-center justify-center w-full col-span-1 mx-auto md:col-span-2 rounded-3xl h-36 grid_items lg:h-56">
                <div>
                    <div class="text-5xl text-center text-white lg:text-5xl">{{ $income_present }} บาท</div>
                    <div class="text-lg text-center text-white lg:text-2xl">รายได้</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $courses_count }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">จำนวนคอร์ส</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $courses_count_members }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">สมัครคอร์ส</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $all_number_gyms }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">จำนวนคนที่อยู่ในยิม</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $membercard_count }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">จำนวนสมาชิกที่อยู่ในยิม</div>
                </div>
            </div>
            <div class="flex items-center justify-center col-span-1 lg:w-56 rounded-3xl h-36 grid_items w-36 lg:h-56">
                <div>
                    <div class="text-center text-white text-7xl lg:text-8xl">{{ $trainercard_count }}</div>
                    <div class="text-lg text-center text-white lg:text-2xl">จำนวนผู้ฝึกสอนที่อยู่ในยิม</div>
                </div>
            </div>

        </div>
    </div>
@endsection
