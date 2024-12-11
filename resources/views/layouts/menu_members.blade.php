<div class="absolute menubar_wrap lg:hidden">
    <div class="fixed flex items-center justify-between gap-4 px-16 cursor-pointer menu_bar">
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'dashboard.Members')
                <i class="block text-xl fa-sharp fa-house f_red"></i>
                <p class="block text-center f_red">หน้าหลัก</p>
            @else
                <a href="{{ route('dashboard.Members') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-house f_gray"></i>
                    <p class="block text-center f_gray">หน้าหลัก</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'course.Members')
                <i class="block text-xl fa-sharp fa-book-bookmark f_red"></i>
                <p class="block text-center f_red">คอร์สเรียน</p>
            @else
                <a href="{{ route('course.Members') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-book-bookmark f_gray"></i>
                    <p class="block text-center f_gray">คอร์สเรียน</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'checkin.Members')
                <i class="block text-xl fa-sharp fa-clock-rotate-left f_red"></i>
                <p class="block text-center f_red">ประวัติการเข้ายิม</p>
            @else
                <a href="{{ route('checkin.Members') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-clock-rotate-left f_gray"></i>
                    <p class="block text-center f_gray">ประวัติการเข้ายิม</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'card.Members')
                <i class="block text-xl fa-sharp fa-address-card f_red"></i>
                <p class="block text-center f_red">สมาชิกการ์ด</p>
            @else
                <a href="{{ route('card.Members') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-address-card f_gray"></i>
                    <p class="block text-center f_gray">สมาชิกการ์ด</p>
                </a>
            @endif
        </div>
    </div>
</div>

{{-- LG --}}
<div class="absolute hidden menubar_wrap_lg lg:block">
    <div class="fixed p-4 menu_bar_lg" id="menu_bar_lg">
        <div class="flex items-center justify-start gap-2 pt-4">
            @if (Route::currentRouteName() == 'dashboard.Members')
                <i class="block text-2xl fa-sharp fa-house f_red"></i>
                <p class="block pt-1 text-lg font-semibold f_red">หน้าหลัก</p>
            @else
                <a href="{{ route('dashboard.Members') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-house f_gray"></i>
                    <p class="block pt-1 text-lg font-semibold f_gray">หน้าหลัก</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'course.Members')
                <i class="block text-2xl fa-sharp fa-book-bookmark f_red" style="width: 24px"></i>
                <p class="block pt-2 pl-1 text-lg font-semibold f_red">คอร์สเรียน</p>
            @else
                <a href="{{ route('course.Members') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-book-bookmark f_gray" style="width: 24px"></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">คอร์สเรียน</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'checkin.Members')
                <i class="block text-2xl fa-sharp fa-clock-rotate-left f_red"></i>
                <p class="block pt-2 pl-1 text-lg font-semibold f_red">ประวัติการเข้ายิม</p>
            @else
                <a href="{{ route('checkin.Members') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-clock-rotate-left f_gray"></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">ประวัติการเข้ายิม</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'card.Members')
                <i class="block text-2xl fa-sharp fa-address-card f_red"></i>
                <p class="block pt-2 pl-1 text-lg font-semibold f_red">สมาชิกการ์ด</p>
            @else
                <a href="{{ route('card.Members') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-address-card f_gray"></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">สมาชิกการ์ด</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}

    <script>
        const menu_bar_lg = document.getElementById('menu_bar_lg');
        const nav = document.getElementById('nav');
        const navHeight = nav.clientHeight

        menu_bar_lg.style.height = `calc(95vh - ${navHeight}px )`;

    </script>
</div>
