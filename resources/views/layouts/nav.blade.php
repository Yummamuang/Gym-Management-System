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
    <div class="w-14 sm:w-28">
        @include('layouts.logo')
    </div>

    <div class="pt-1 md:pt-3">
        <i class="fa-solid fa-circle-user" style="color: var(--gray_color)" {{-- onMouseOver="this.style.color='var(--red_color)'" onMouseOut="this.style.color='var(--gray_color)'" --}}></i>
    </div>
</div>
