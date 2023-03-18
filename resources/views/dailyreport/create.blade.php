<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            日報作成画面
        </h2>
    </x-slot>
    <div class="container px-5 py-5 mx-auto">
        @if($errors->any())
        <ul class="lg:w-1/2 md:w-2/3 mx-auto list-disc list-inside">
            @foreach($errors->all() as $error)
            <li class="flex justify-items-start">{{$error}}</li>
            @endforeach
        </ul>
        @endif
        <form method="post" action="{{route('dailyreport.store')}}">
            @csrf
            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                <div class="flex flex-col">
                    <div class="w-full w-1/2 flex flex-row-reverse">
                        <label for="user_id" class="leading-7 text-sm text-gray-600"><span class="mr-3">作成者:</span>{{$authuser->name}}</label>
                        <input type="text" id="user_id" name="user_id" value="{{$authuser->id}}" class="invisible">
                    </div>
                    <div class="pl-2 pb-2 w-1/2">
                        <div class="relative">
                            <label for="meeting_date" class="leading-7 text-sm text-gray-600" value="{{old('meeting_date')}}">打合せ日時</label>
                            <input type="date" id="meeting_date" name="meeting_date" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                    <p class="leading-7 text-sm text-gray-600 pl-2 w-1/2">顧客名</p>
                    <select class="text-sm ml-2 pb-2 w-1/2" name="client_id" value="{{old('client_id')}}">
                        @foreach($clients as $client)
                        <option value="{{ $client -> id }}">
                            {{$client->name}}
                        </option>
                        @endforeach
                    </select>
                    <div class="p-2">
                        <div class="relative">
                            <h3 class="leading-7 text-sm text-gray-600">参加者</h3>
                            <label for="participant_matsui" class="leading-7 text-sm text-gray-600">松井色素側:</label>
                            <input type="text" id="participant_matsui" name="participant_matsui" value="{{old('participant_matsui')}}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            <label for="participant_client" class="leading-7 text-sm text-gray-600">顧客側:</label>
                            <input type="text" id="participant_client" name="participant_client" value="{{old('participant_client')}}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                        </div>
                    </div>
                </div>
                <p class="leading-7 text-sm text-gray-600 pl-2 w-1/2">開発案件</p>
                <select class="text-sm ml-2 pb-2 w-1/2" name="project_id" value="{{old('project_id')}}">
                    @foreach($projects as $project)
                    <option value="{{ $project -> id }}">
                        {{$project->name}}
                    </option>
                    @endforeach
                </select>
                <p class="leading-7 text-sm text-gray-600 pl-2 w-1/2">ステータス</p>
                <select class="text-sm ml-2 pb-2 w-1/2" name="status_id" value="{{old('status_id')}}">
                    @foreach($statuses as $status)
                    <option value="{{ $status -> id }}">
                        {{$status->name}}
                    </option>
                    @endforeach
                </select>

                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="content" class="leading-7 text-sm text-gray-600">日報内容</label>
                        <textarea id="content" name="content" value="{{old('content')}}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-60 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                    </div>
                    <div class="relative">
                        <label for="image" class="leading-7 text-sm text-gray-600">Fig</label>
                        <input id="image" name="image" value="{{old('image')}}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
            </div>
            <div class="flex justify-center mx-auto">
                <button class="bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 m-5" type="submit" onclick="">登録</button>
                <a class="bg-gray-300 hover:bg-gray-200 text-white rounded px-4 py-2 m-5" href="{{ route('dailyreport.index') }}">戻る</a>
            </div>
        </form>
    </div>
</x-app-layout>