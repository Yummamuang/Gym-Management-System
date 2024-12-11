<div class="absolute menubar_wrap lg:hidden">
    <div class="fixed flex items-center justify-between gap-4 px-4 cursor-pointer menu_bar">
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'dashboard.Admin')
                <i class="block text-xl fa-sharp fa-house f_red"></i>
                <p class="block text-center f_red">หน้าหลัก</p>
            @else
                <a href="{{ route('dashboard.Admin') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-house f_gray"></i>
                    <p class="block f_gray">หน้าหลัก</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'course.Admin' || Route::currentRouteName() == 'addCourse.Admin')
                <i class="block text-xl fa-sharp fa-book-medical f_red"></i>
                <p class="block text-center f_red">คอร์สเรียน</p>
            @else
                <a href="{{ route('course.Admin') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-book-medical f_gray"></i>
                    <p class="block text-center f_gray">คอร์สเรียน</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'exercise.Admin' || Route::currentRouteName() == 'addExercise.Admin' || Route::currentRouteName() == 'editExercise.Admin')
                <i class="block text-xl fa-sharp fa-person-walking f_red"></i>
                <p class="block text-center f_red" style="font-size: 0.6rem">ท่าออกกำลังกาย</p>
            @else
                <a href="{{ route('exercise.Admin') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-person-walking f_gray"></i>
                    <p class="block text-center f_gray" style="font-size: 0.6rem">ท่าออกกำลังกาย</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'dietPlan.Admin' || Route::currentRouteName() == 'addDietPlan.Admin' || Route::currentRouteName() == 'editDietPlan.Admin')
                <i class="block text-xl fa-sharp fa-plate-wheat f_red"></i>
                <p class="block text-center f_red">แผนไดเอท</p>
            @else
                <a href="{{ route('dietPlan.Admin') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-plate-wheat f_gray"></i>
                    <p class="block text-center f_gray">แผนไดเอท</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'members.Admin' || Route::currentRouteName() == 'editMembers.Admin')
                <i class="block text-xl fa-sharp fa-user-pen f_red"></i>
                <p class="block text-center f_red">จัดการสมาชิก</p>
            @else
                <a href="{{ route('members.Admin') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-user-pen f_gray"></i>
                    <p class="block text-center f_gray">จัดการสมาชิก</p>
                </a>
            @endif
        </div>
        <div class="grid gap-1 menu_items place-items-center">
            @if (Route::currentRouteName() == 'trainers.Admin' || Route::currentRouteName() == 'editTrainers.Admin')
                <i class="block text-xl fa-sharp fa-chalkboard-user f_red"></i>
                <p class="block text-center f_red">จัดการผู้ฝึกสอน</p>
            @else
                <a href="{{ route('trainers.Admin') }}" class="grid w-full gap-1 place-items-center">
                    <i class="block text-xl fa-sharp fa-chalkboard-user f_gray"></i>
                    <p class="block text-center f_gray">จัดการผู้ฝึกสอน</p>
                </a>
            @endif
        </div>
    </div>
</div>
<div class="absolute hidden menubar_wrap_lg lg:block">
    <div class="fixed p-4 menu_bar_lg" id="menu_bar_lg">
        <div class="flex items-center justify-start gap-2 pt-4">
            @if (Route::currentRouteName() == 'dashboard.Admin')
                <i class="block text-2xl fa-sharp fa-house f_red"></i>
                <p class="block pt-1 text-lg font-semibold f_red">หน้าหลัก</p>
            @else
                <a href="{{ route('dashboard.Admin') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-house f_gray"></i>
                    <p class="block pt-1 text-lg font-semibold f_gray">หน้าหลัก</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'course.Admin' || Route::currentRouteName() == 'addCourse.Admin')
                <i class="block text-2xl fa-sharp fa-book-medical f_red" style="width: 24px"></i>
                <p class="block pl-1 text-lg font-semibold f_red">คอร์สเรียน</p>
            @else
                <a href="{{ route('course.Admin') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-book-medical f_gray" style="width: 24px"></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">คอร์สเรียน</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'exercise.Admin' || Route::currentRouteName() == 'addExercise.Admin' || Route::currentRouteName() == 'editExercise.Admin')
                <i class="block text-2xl fa-sharp fa-person-walking f_red" style="width: 24px"></i>
                <p class="block pl-1 text-lg font-semibold f_red">ท่าออกกำลังกาย</p>
            @else
                <a href="{{ route('exercise.Admin') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-person-walking f_gray" style="width: 24px"></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">ท่าออกกำลังกาย</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'dietPlan.Admin' || Route::currentRouteName() == 'addDietPlan.Admin' || Route::currentRouteName() == 'editDietPlan.Admin')
                <i class="block text-2xl fa-sharp fa-plate-wheat f_red" ></i>
                <p class="block pl-1 text-lg font-semibold f_red">แผนไดเอท</p>
            @else
                <a href="{{ route('dietPlan.Admin') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-plate-wheat f_gray" ></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">แผนไดเอท</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'members.Admin' || Route::currentRouteName() == 'editMembers.Admin')
                <i class="block text-2xl fa-sharp fa-user-pen f_red"></i>
                <p class="block pl-1 text-lg font-semibold f_red">จัดการสมาชิก</p>
            @else
                <a href="{{ route('members.Admin') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-user-pen f_gray" ></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">จัดการสมาชิก</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
        <div class="flex items-center justify-start gap-2 py-2">
            @if (Route::currentRouteName() == 'trainers.Admin' || Route::currentRouteName() == 'editTrainers.Admin')
                <i class="block text-2xl fa-sharp fa-chalkboard-user f_red"></i>
                <p class="block pl-1 text-lg font-semibold f_red">จัดการผู้ฝึกสอน</p>
            @else
                <a href="{{ route('trainers.Admin') }}" class="flex items-center justify-center gap-2 menu_items_lg">
                    <i class="block text-2xl fa-sharp fa-chalkboard-user f_gray" ></i>
                    <p class="block pl-1 text-lg font-semibold f_gray">จัดการผู้ฝึกสอน</p>
                </a>
            @endif
        </div>
        {{-- Line --}}
        <div class="line"></div>
        {{-- Line --}}
    </div>


    <script>
        const menu_bar_lg = document.getElementById('menu_bar_lg');
        const nav = document.getElementById('nav');
        const navHeight = nav.clientHeight

        menu_bar_lg.style.height = `calc(95vh - ${navHeight}px )`;

    </script>
</div>
