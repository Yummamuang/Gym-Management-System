<style>
    .fa-solid {
        font-size: 1.5rem;
    }

    @media (min-width: 640px) {
        .fa-solid {
            font-size: 2.6rem;
        }
    }
</style>

<div id="nav" class="flex items-center justify-between w-full grid-cols-3 px-4 pt-4 xs:px-8 sm:px-12 sm:pt-6 md:px-16 ">
    <div class="flex items-center justify-between w-full">
        <div class="flex gap-2">
            <img src="{{ asset('img/Gym_logo.svg') }}" alt="" class="w-20 lg:w-1/2" style="max-width: 150px">
            <h1 class="pt-1 text-xl italic font-semibold readex_font f_red lg:text-3xl">Admin</h1>
        </div>
        <a href="{{ route('logout.Admin') }}" class="block p-2 px-4 ml-auto text-sm lg:text-xl logout rounded-xl lg:p-3 lg:px-10">
            logout
        </a>
    </div>
</div>
