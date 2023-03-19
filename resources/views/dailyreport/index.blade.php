<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            日報一覧
        </h2>
    </x-slot>
    <div class="flex justify-center text-gray-600">
        <form method="get" action="{{ route('dailyreport.index') }}">
            <div class="flex flex-wrap justify-start my-2">
                <div class="flex flex-col mr-2">
                    <span class="text-xs">表示順</span>
                    <select id="sort" name="sort" class="text-xs">
                        <option value="0" @if(\Request::get('sort')=="0" ) selected @endif>
                            新しく順（作成日）
                        </option>
                        <option value="1" @if(\Request::get('sort')=="1" ) selected @endif>
                            古い順（作成日）
                        </option>
                        <option value="2" @if(\Request::get('sort')=="2" ) selected @endif>
                            昇順（ID）
                        <option value="3" @if(\Request::get('sort')=="3" ) selected @endif>
                            降順（ID）
                        </option>
                    </select>
                </div>
                <div class="flex flex-col mr-2">
                    <span class="text-xs text-gray-600">作成者</span>
                    <select class="text-xs " name="user">
                        <option value="0" @if(\Request::get('user')==='0' ) selected @endif>全て</option>
                        @foreach($users as $user)
                        <option value="{{ $user -> id }}" @if(\Request::get('user')==$user->id ) selected @endif>
                            {{$user->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-2">
                    <span class="text-xs text-gray-600">顧客名</span>
                    <select class="text-xs " name="client">
                        <option value="0" @if(\Request::get('client')==='0' ) selected @endif>全て</option>
                        @foreach($clients as $client)
                        <option value="{{ $client -> id }}" @if(\Request::get('client')==$client->id ) selected @endif>
                            {{$client->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-2">
                    <span class="text-xs text-gray-600">開発案件</span>
                    <select class="text-xs " name="project">
                        <option value="0" @if(\Request::get('project')==='0' ) selected @endif>全て</option>
                        @foreach($projects as $project)
                        <option value="{{ $project -> id }}" @if(\Request::get('project')==$project->id ) selected @endif>
                            {{$project->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mr-2">
                    <span class="text-xs text-gray-600">ステータス</span>
                    <select class="text-xs" name="status" value="{{old('status_id')}}">
                        <option value="0" @if(\Request::get('status')==='0' ) selected @endif>全て</option @foreach($statuses as $status) <option value="{{ $status -> id }}" @if(\Request::get('status')==$status -> id ) selected @endif>
                        {{$status->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="inline-flex text-white bg-indigo-500 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-600 rounded">検索する</button>
        </form>
    </div>

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
    <script>
        const select = document.getElementById('sort')
        select.addEventListener('change', function() {
            this.form.submit()
        })
    </script>
</x-app-layout>