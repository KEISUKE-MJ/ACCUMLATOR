<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            日報一覧
        </h2>
    </x-slot>
    <div class="text-gray-600 mx-auto container py-12 flex flex-wrap">
        @foreach($dailyreports as $E)
        <div class="bg-white m-2 border-2 border-gray-200 border-opacity-60 text-gray-500 shadow shadow-slate-500">
            <a href="{{ route('dailyreport.show',[$E->id]) }}">
                <div class="flex justify-between">
                    <div class="flex flex-col">
                        <div class="flex text-left text-gray-500">
                            <span class="text-xs pr-2">ID</span>
                            <span class="text-base">{{$E->id}}</span>
                        </div>
                        <div class="flex items-start flex-col p-1">
                            <div class="flex flex-col mb-1">
                                <p class="text-xs">開発品名</p>
                                <p class="font-semibold text-sm">{{$E->project->name}}</p>

                            </div>
                            <div class="flex flex-col mb-1">
                                <p class="text-xs">顧客名</p>
                                <p class="font-semibold text-sm">{{$E->client->name}}</p>
                            </div>
                            <div class="flex flex-col mb-1">
                                <p class="text-xs">打合せ日時</p>
                                <p class="font-semibold text-sm">{{$E->meeting_date}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col justify-between pl-1 text-xs">
                        <div class="font-semibold bg-green-100 align-middle w-20 h-4 text-xs text-center">{{$E->status->name}}</div>
                        <div class="flex flex-col">
                            <div class="flex flex-col mb-1">
                                <p class="text-xs">作成日</p>
                                <p class="font-semibold text-xs">{{$E->created_at->year}}年{{$E->created_at->month}}月{{$E->created_at->day}}日</p>

                            </div>
                            <div class="flex flex-col mb-1">
                                <p class="text-xs">作成者</p>
                                <p class="font-semibold text-xs">{{$E->user->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
    <div class="mx-auto py-2 flex justify-center">
        {{ $dailyreports->links()}}
    </div>

</x-app-layout>