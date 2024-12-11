@extends('layouts.main')
@section('style')
    @vite('resources/css/mems_trains.css')
@endsection

@section('content')
    @include('layouts.logged_nav_admin')
    <div class="flex flex-col items-center justify-center pt-10 mb-20 lg:pl-48">
        @if (session('delete_success'))
            <div class="w-full col-span-7 mx-auto mt-1" style="min-width: 250px; max-width: 450px">
                <p class="block text-sm text-center text-green-500 pointer-events-none lg:text-lg">{{ session('delete_success') }}</p>
            </div>
        @endif

        <div class="w-3/4 mt-2 overflow-auto flex_items display_content">
            <table class="mt-4">
                <thead>
                    <tr>
                        <td class="text-center">ลำดับที่</td>
                        <td class="text-center">รหัสสมาชิก</td>
                        <td class="text-center">ชื่อ</td>
                        <td class="text-center">นามสกุล</td>
                        <td class="text-center">วันเกิด</td>
                        <td class="text-center">อายุ</td>
                        <td class="text-center">เพศ</td>
                        <td class="text-center">น้ำหนัก</td>
                        <td class="text-center">ส่วนสูง</td>
                        <td class="text-center">ที่อยู่</td>
                        <td class="text-center">เบอร์โทร</td>
                        <td class="text-center">ลบ</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($members as $member)
                        <tr>
                            <td class="text-center">{{ $i }}</td>
                            <td>{{ $member->memberid }}</td>
                            <td>{{ $member->mfname }}</td>
                            <td>{{ $member->mlname }}</td>
                            <td>{{ $member->birthday }}</td>
                            <td>{{ $member->age }}</td>
                            <td>{{ $member->sex }}</td>
                            <td>{{ $member->weight }}</td>
                            <td>{{ $member->height }}</td>
                            <td>{{ $member->address }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>
                                <a href="{{ route('deleteMembers.Admin',$member->memberid) }}" class="block text-center underline f_red">ลบ</a>
                            </td>
                        </tr>
                        @php
                            $i += 1;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
