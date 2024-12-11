@extends('layouts.main')

@section('style')
    @vite('resources/css/welcome.css')
@endsection

@section('content')
    <div class="relative flex flex-col items-center justify-center overflow-hidden section xl:justify-end" style="min-width: 316px">

        <!-- logo -->
        <div class="absolute z-10 w-3/4 mt-4 lg:top-1/3 top-28"  style="max-width: 500px">
            <img src="{{ asset('img/Gym_logo.svg') }}" alt="Gym logo">
        </div>

        <!-- choose user button -->
        <div class="z-10 grid items-end w-full h-full grid-cols-2 gap-4 mt-7 flex_items justify-items-center" style="max-width: 2400px">
            <a href="{{ route('login.Trainers') }}" class="hidden w-full col-span-1 lg:block select" style="max-width: 650px">
                <img src="{{ asset('img/Trainer.png') }}" alt="">
            </a>
            <a href="{{ route('login.Trainers') }}" class="block w-full col-span-1 lg:hidden select" style="max-width: 650px">
                <img src="{{ asset('img/Trainer_mobile.png') }}" alt="" >
            </a>

            <a href="{{ route('login.Members') }}" class="hidden col-span-1 lg:block select" style="max-width: 650px">
                <img src="{{ asset('img/Member.png') }}" alt="">
            </a>
            <a href="{{ route('login.Members') }}" class="block w-full col-span-1 lg:hidden select" style="max-width: 650px">
                <img src="{{ asset('img/Member_mobile.png') }}" alt="" class="block ml-auto">
            </a>
        </div>

        <div class="fixed z-0 top-6 xs:top-16 sm:top-28" style="min-width: 800px" id="bg">
            <img src="{{ asset('img/bg.svg') }}" alt="Gym logo" class="block mx-auto">
        </div>

    </div>

@endsection
