<div class="mt-1 cursor-pointer flex_items lg:mt-3" style="max-width: 650px" onclick="redirectToHome()">
    <?xml version="1.0" encoding="UTF-8"?>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 191.55 59.25">
    <defs>
        <style>
        .cls-1, .cls-2 {
            opacity: .93;
        }

        .cls-2, .cls-3 {
            fill: #2c2d36;
            stroke-width: 0px;
        }
        @php
            $members = session()->get('loggedInMembers', 'default');
            $trainers = session()->get('loggedInTrainers', 'default');
        @endphp

        @if ($members != 'default')
            .cls-2, .cls-3 {
                fill: #DB5B53 !important;
                stroke-width: 0px;
            }
        @endif
        @if ($trainers  != 'default')
            .cls-2, .cls-3 {
                fill: #DB5B53 !important;
                stroke-width: 0px;
            }
        @endif
        </style>
    </defs>
    <g id="Layer_2" data-name="Layer 2" class="cls-1">
        <g>
        <path class="cls-2" d="m41.48,28.91l-3.77,15.09s-11.54,4.48-18.1-1.3c-.48-.52-.93-1.06-1.34-1.62-2.02-2.77-3.19-6.09-3.19-9.65,0-9.72,8.72-17.6,19.49-17.6,5.76,0,10.92,2.26,14.49,5.85l.2-.09,11.59-9.28C54.43,3.97,45.32,0,35.2,0,15.76,0,0,14.63,0,32.69c0,6.82,1.03,13.28,6.11,18.4,1.21,1.17,1.65,1.29,2.46,1.92,5.95,4.13,22.18,12.4,42.97-1.47l3.77-22.63h-13.83Z"/>
        <polygon class="cls-3" points="61.6 1.26 77.91 1.26 86.74 23.89 105.3 1.26 121.37 1.26 91.77 37.71 88 57.83 71.66 57.83 76.68 36.46 61.6 1.26"/>
        <polygon class="cls-3" points="125.47 1.26 138.26 1.26 152.11 33.94 177.85 1.26 191.55 1.26 181.02 57.83 165.47 57.83 170.97 28.91 152.11 51.54 144.57 51.54 134.51 27.66 128.75 57.83 113.74 57.83 125.47 1.26"/>
        </g>
    </g>
    </svg>
</div>

<script>
    function redirectToHome () {
        window.location.href = "{{ route('home') }}";
    }
</script>
