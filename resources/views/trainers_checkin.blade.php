@extends('layouts.main')
@section('style')
    @vite('resources/css/login.css')
    <style>
        #display {
            width: 90%;
        }

        #col_head {
            width: 100%;
            height: 50px;
        }

        .head-col {
            background: var(--red_color);
        }

        .row-col {
            background: white;
        }

        @media screen and (min-width: 1024px) {
            #display {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    @include('layouts.logged_nav')

    <div class="flex flex-col items-center justify-center pt-10 mx-auto mb-20 lg:pl-60 lg:pr-16" id="display">
        @if (session()->has('checkin_fail'))
        <div class="w-full col-span-7 mx-auto mb-4" style="min-width: 250px; max-width: 450px">
            <p class="block text-sm text-center pointer-events-none f_red lg:text-lg">{{ session('checkin_fail') }}</p>
        </div>
        @endif
        <div class="grid grid-cols-5" id="col_head" style="max-width: 1200px">
            @php
                $i = 1;
            @endphp
            <div class="relative col-span-1 px-6 py-3 text-center text-white head-col lg:text-2xl" style="min-width: 97px">ลำดับที่</div>
            <div class="relative col-span-2 px-6 py-3 text-center text-white head-col lg:text-2xl">เวลาเข้า</div>
            <div class="relative col-span-2 px-6 py-3 text-center text-white head-col lg:text-2xl">เวลาออก</div>
            @foreach ($trainercards as $trainercard)
                <div class="relative col-span-1 px-6 py-3 text-center f_gray row-col lg:text-2xl" style="min-width: 97px">{{ $i }}</div>
                <div class="relative col-span-2 px-6 py-3 text-center f_gray row-col lg:text-2xl">
                    {{ \Carbon\Carbon::parse($trainercard->checkin)->addYears(543)->isoFormat('วันที่ D เดือน MMMM ปี YYYY เวลา H:mm', 'th') }}
                </div>
                <div class="relative col-span-2 px-6 py-3 text-center f_gray row-col lg:text-2xl">
                    @if ($trainercard->checkout == null)
                        กำลังสอน
                    @else
                    {{ \Carbon\Carbon::parse($trainercard->checkout)->addYears(543)->isoFormat('วันที่ D เดือน MMMM ปี YYYY เวลา H:mm', 'th') }}
                    @endif

                </div>
            @php
                $i += 1;
            @endphp
            @endforeach
            <a href="{{ route('testCheckin.Trainers', [ "trainerid" => $trainers -> trainerid, "fullname" => $trainers -> tfname . " " . $trainers -> tlname])}}" class="underline">test checkin</a>
            <a href="{{ route('testCheckout.Trainers', $trainers -> trainerid ) }}" class="underline">test checkout</a>
        </div>
    </div>
@endsection
