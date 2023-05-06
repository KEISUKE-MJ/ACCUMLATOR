<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            日報編集画面
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto">
            <section class="text-gray-600 body-font">
                <div class="container px-5">

                    <form method="post" action="{{route('dailyreport.update',[ $dailyreport -> id ]) }}">
                        @method('PUT')
                        @csrf
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-col">
                                <div class="flex justify-end">
                                    <p class="m-3 text-xs"><span class="font-semibold mr-3">作成者:</span>{{ $dailyreport -> user ->name}}</p>
                                    <p class="m-3 text-xs"><span class="font-semibold mr-3">作成日:</span>{{ $dailyreport -> created_at}}</p>
                                    <p class="m-3 text-xs"><span class="font-semibold mr-3">更新日:</span>{{ $dailyreport -> updated_at}}</p>
                                </div>
                                <div class="pl-2 pb-2 w-1/2">
                                    <div class="relative">
                                        <label for="approval" class="leading-7 text-sm text-gray-600">承認</label>
                                        <input type="checkbox" id="approval" name="approval" value="{{ $dailyreport -> approval }}" class="bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <div class="pl-2 pb-2 w-1/2">
                                    <div class="relative">
                                        <label for="meeting_date" class="leading-7 text-sm text-gray-600">打合せ日時</label>
                                        <input type="date" id="meeting_date" name="meeting_date" value="{{ $dailyreport -> meeting_date }}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                                <p class="leading-7 text-sm text-gray-600 pl-2 w-1/2">顧客名</p>
                                <select class="text-sm ml-2 pb-2 w-1/2" name="client_id" value="{{ $dailyreport -> client ->name}}">
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
                                        <input type="text" id="participant_matsui" name="participant_matsui" value="{{ $dailyreport -> participant_matsui }}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                        <label for="participant_client" class="leading-7 text-sm text-gray-600">顧客側:</label>
                                        <input type="text" id="participant_client" name="participant_client" value="{{ $dailyreport -> participant_client }}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                    </div>
                                </div>
                            </div>
                            <p class="leading-7 text-sm text-gray-600 pl-2 w-1/2">開発案件</p>
                            <select class="text-sm ml-2 pb-2 w-1/2" name="project_id" value="{{ $dailyreport -> project ->name}}">
                                @foreach($projects as $project)
                                <option value="{{ $project -> id }}">
                                    {{$project->name}}
                                </option>
                                @endforeach
                            </select>
                            <p class="leading-7 text-sm text-gray-600 pl-2 w-1/2">ステータス</p>
                            <select class="text-sm ml-2 pb-2 w-1/2" name="status_id" value="{{ $dailyreport -> status ->name}}">
                                @foreach($statuses as $status)
                                <option value="{{ $status -> id }}">
                                    {{$status->name}}
                                </option>
                                @endforeach
                            </select>

                            <div class="p-2 w-full">
                                <div class="relative">
                                    <label for="content" class="leading-7 text-sm text-gray-600">日報内容</label>
                                    <textarea id="content" name="content" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-60 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $dailyreport -> content }}</textarea>
                                </div>
                                <div class="relative">
                                    <label for="image" class="leading-7 text-sm text-gray-600">Fig</label>
                                    <input id="image" name="image" value="{{ $dailyreport -> image }}" class="w-full bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-center mx-auto">
                            <button class="bg-blue-500 hover:bg-blue-400 text-white rounded px-4 py-2 m-5" type="submit" onclick="">更新</button>
                            <a class="bg-gray-300 hover:bg-gray-200 text-white rounded px-4 py-2 m-5" href="{{ route('dailyreport.show',[$dailyreport -> id]) }}">戻る</a>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</x-app-layout>