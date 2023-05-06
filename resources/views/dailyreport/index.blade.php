<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            日報一覧
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto">
            <section class="text-gray-600 body-font">
                <div class="container py-12 mx-auto">
                    <div class="w-full mx-5">
                        @foreach($dailyreports as $E)
                        <div class="bg-white text-gray-500 text-xs my-2 p-3">
                            <div class="flex items-start">
                                <div class="text-center">
                                    <p class="m-1 text-gray-500 border-b-2 border-gray-200 bg-blue-100">ID:<span>{{$E->id}}</span></p>
                                </div>
                                <div class="m-1"><span class="font-semibold bg-blue-100">開発品名:</span>{{$E->project->name}}</div>
                                <div class="m-1"><span class="font-semibold bg-blue-100">顧客名:</span>{{$E->client->name}}</div>
                                <div class="flex pl-1 text-xs">
                                    <h2 class="m-1 font-semibold bg-blue-100">参加者：</h2>
                                    <p class="m-1"><span class="font-semibold m-1">松井色素側:</span>{{$E->participant_matsui}}</p>
                                    <p class="m-1"><span class="font-semibold m-1">顧客側:</span>{{$E->participant_client}}</p>
                                    <p class="m-1"><span class="font-semibold bg-blue-100">ステータス:</span>{{$E->status->name}}</p>
                                    <p class="m-1"><span class="font-semibold bg-blue-100">作成者:</span>{{$E->user->name}}</p>
                                    <p class="m-1"><span class="font-semibold bg-blue-100">作成日:</span></p>
                                    <p class="m-1"><span class="font-semibold bg-blue-100">更新日:</span></p>
                                </div>
                              
                            </div> 
                            <div class="m-1"><span class="font-semibold bg-blue-100">日報内容:</span>{{$E->content}}</div>
                        </div>
                        @endforeach      
                    </div>
                </div>
            </section>
        </div>
</x-app-layout>