<style>
    .fa-solid {
        font-size: 1.5rem;
    }

    @media (min-width: 640px) {
        .fa-solid {
            font-size: 2.6rem;
        }
    }

    #profile_pic_nav{
        width: 40px;
        height: 40px;
        object-fit: cover;
    }

    @media (min-width: 1024px) {
        #profile_pic_nav{
            width: 45px;
            height: 45px;
        }
    }
</style>

<div id="nav" class="flex items-center justify-between w-full grid-cols-3 px-4 pt-4 xs:px-8 sm:px-12 sm:pt-6 md:px-16 ">
    <div class="w-14 sm:w-28">
        @include('layouts.logo')
    </div>

    <div class="flex items-center gap-3 pt-1 md:pt-3 xs:gap-4 sm:gap-8">
        <h2 class="italic readex_font xs:text-xl sm:text-2xl sm:font-semibold f_gray">
            @if (isset($members))
                @php
                    $fullName = $members->mfname . ' ' . $members->mlname;
                @endphp

                @if(strlen($fullName) > 15)
                    {{ Str::limit($fullName, 15) }}
                @else
                    {{ $fullName }}
                @endif

            @elseif(isset($trainers))
                @php
                    $fullName = $trainers->tfname . ' ' . $trainers->tlname;
                @endphp

                @if(strlen($fullName) > 15)
                    {{ Str::limit($fullName, 15) }}
                @else
                    {{ $fullName }}
                @endif
            @endif
        </h2>
        @php
            $members_session = session()->get('loggedInMembers', 'default');
            $trainers_session = session()->get('loggedInTrainers', 'default');

            $routeName = "";
            if ($members_session != 'default') {
                $routeName = 'profile.Members';
            }
            if ($trainers_session != 'default') {
                $routeName = 'profile.Trainers';
            }
        @endphp
        <a class="pb-10 pr-14 lg:pr-10 lg:pb-12" href=
            "
                @if ($members_session != 'default')
                    {{ route('profile.Members') }}
                @endif

                @if ($trainers_session != 'default')
                    {{ route('profile.Trainers') }}
                @endif

            " >
            @if (isset($members))
                @if ($members->image == null)
                    <img src="{{ asset('img/circle-user-solid.svg') }}" alt="" class="absolute block" id="profile_pic_nav" width="100px">
                @else
                    <img src="{{ asset($members->image) }}" alt="" class="absolute block rounded-full" id="profile_pic_nav">
                @endif
            @endif
            @if (isset($trainers))
                @if ($trainers->image == null)
                    <img src="{{ asset('img/circle-user-solid.svg') }}" alt="" class="absolute block" id="profile_pic_nav" width="100px">
                @else
                    <img src="{{ asset($trainers->image) }}" alt="" class="absolute block rounded-full" id="profile_pic_nav">
                @endif
            @endif

        </a>
    </div>


</div>
