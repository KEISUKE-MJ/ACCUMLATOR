<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            日報詳細画面
        </h2>
    </x-slot>
    <div class="xl:w-1/2 lg:w-3/4 container py-12 w-full mx-auto text-center">
        <div class="flex justify-between bg-blue-100 p-3">
            <div class="flex flex-col items-start m-1">
                <div>打合せ日時:{{ $dailyreport -> meeting_date }}</div>
                <div>顧客名:{{ $dailyreport -> client ->name}}</div>
            </div>
            <div class="flex p-2">
                @if ($approve==="承認済み")
                <div class="bg-blue-500 p-1 h-6 m-2 text-xs text-white">
                    {{$approve}}
                </div>
                @else
                <div class="bg-red-500 p-1 h-6 m-2 text-xs text-white">
                    {{$approve}}
                </div>
                @endif
                <div class="bg-green-500 p-1 h-6 m-2 text-xs text-white">
                    <a href="{{ route('dailyreport.edit',[$dailyreport->id]) }}">編集</a>
                </div>
                <div class="bg-gray-500 p-1 h-6 m-2 text-xs text-white">
                    <form id="delete_{{$dailyreport->id}}" method="post" action="{{route('dailyreport.destroy',[$dailyreport->id])}}">
                        @csrf
                        @method('delete')
                        <a data-id="{{$dailyreport->id}}" onclick="deletePost(this)" href="#">削除</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-white">
            <div class="flex justify-end">
                <p class="m-3 text-xs"><span class="font-semibold mr-3">作成者:</span>{{ $dailyreport -> user ->name}}</p>
                <p class="m-3 text-xs"><span class="font-semibold mr-3">作成日:</span>{{ $dailyreport -> created_at}}</p>
                <p class="m-3 text-xs"><span class="font-semibold mr-3">更新日:</span>{{ $dailyreport -> updated_at}}</p>
            </div>

            <div class="flex justify-start border-slate-200">
                <h2 class="w-6 text-xs font-semibold flex items-center bg-gray-300">参加者</h2>
                <div class="w-full">
                    <div class="bg-gray-100">
                        <p class="w-full text-left font-semibold text-sm bg-gray-100 p-1">松井色素側:</p>
                        <p class="w-full text-left text-xs p-1 bg-white">{{ $dailyreport -> participant_matsui }}</p>
                    </div>
                    <div class="bg-gray-100 w-full">
                        <p class="w-full text-left font-semibold text-sm p-1">顧客側:</p>
                        <p class="w-full text-left text-xs p-1 bg-white">{{ $dailyreport -> participant_client }}</p>
                    </div>
                </div>
            </div>
            <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-4 mb-3"></span>

            <p class="px-3 text-left tetext-gray-500">
                <span class="pr-2 font-semibold">開発案件:</span>
                <span class="pr-2 font-semibold">{{ $dailyreport -> project ->name}}</span>
                <span class="bg-blue-700 hover:bg-blue-600 text-sm text-white rounded px-1 py-0.5">{{ $dailyreport -> status ->name}}</span>
            </p>
            <p class="my-5 px-5 text-left text-sm"> {{ $dailyreport -> content }}</p>
            <div>{{ $dailyreport -> image }}</div>
        </div>
    </div>
</x-app-layout>
<script>
    function deletePost(e) {
        'use strict'
        if (confirm('本当に削除してもいいですか？')) {
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>