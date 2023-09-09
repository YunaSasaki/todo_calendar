<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Todoリスト一覧
        </h2>
    </x-slot> --}}

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-4 mx-auto">
                            <div class="flex justify-center mb-4">
                                <button type="button" class="mr-8">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 12H6M12 5l-7 7 7 7"/>
                                    </svg>
                                </button>
                                <div date-rangepicker datepicker-autohide datepicker-format="yyyy/mm/dd" class="flex items-center">
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <input id="start" name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="開始日" value="2023/09/05">
                                    </div>
                                    <span class="mx-4 text-gray-500">～</span>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                            </svg>
                                        </div>
                                        <input id="end" name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="終了日" value="2023/09/05">
                                    </div>
                                    <button type="button" class="ml-8">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h13M12 5l7 7-7 7"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="lg:w-2/3 w-full mx-auto">
                                <div class="mb-4 px-4 flex items-center">
                                    <p class="font-medium text-lg text-green-400">達成率 {{ $achievement }}%</p>
                                    <button class="ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">追加</button>
                                </div>
                                <x-input-error class="mb-4" :messages="$errors->all()"/>
                                <div id="scroller" class="overflow-auto max-h-96">
                                    <table class="table-auto w-full text-center whitespace-no-wrap mb-4">
                                        <thead>
                                            <tr>
                                                <th class="sticky top-0 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl whitespace-nowrap">タイトル</th>
                                                <th class="sticky top-0 px-2 py-3 title-font tracking-wider font-medium bg-gray-100">
                                                    <form name="sort" method="post" action="{{route('index')}}">
                                                        @csrf
                                                        <button type="submit" name="sort" class="flex items-center whitespace-nowrap mx-auto px-4 py-2 text-sm text-gray-900 border border-gray-400 rounded-lg bg-transparent" value="@if ($sort === null || $sort === '1') 2 @elseif ($sort !== '1') 1 @endif">
                                                            <p class="mr-4">日付</p>
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrows-sort" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                                <path d="M3 9l4 -4l4 4m-4 -4v14"></path>
                                                                <path d="M21 15l-4 4l-4 -4m4 4v-14"></path>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </th>
                                                <th class="sticky top-0 px-2 py-3 title-font tracking-wider font-medium bg-gray-100">
                                                    <select onchange="checkFilter(this)" class="text-sm text-gray-900 border border-gray-400 rounded-lg bg-transparent focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                                                        <option value="all" selected>チェック</option>
                                                        <option value="all">すべて</option>
                                                        <option value="no_check">未チェック</option>
                                                        <option value="checked">チェック済</option>
                                                    </select>
                                                </th>
                                                <th class="sticky top-0 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                                                <th class="sticky top-0 px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($todos as $todo)
                                                <tr class="todo_item" id="todo{{ $todo->id }}">
                                                    <td class="px-4 py-3">
                                                        <form name="title{{ $todo->id }}" method="post" action="{{ route('updateTitle') }}">
                                                            @csrf
                                                            <input type="text" name="title" onblur="submitForm(title{{ $todo->id }}, position{{ $todo->id }})" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $todo->title }}" />
                                                            <input type="hidden" name="id" value="{{ $todo->id }}" />
                                                            <input type="hidden" name="position" id="position{{ $todo->id }}" value="0" />
                                                        </form>
                                                    </td>
                                                    <td class="px-2 py-3">
                                                        <div class="hidden md:inline-block">{{ $todo->datetime->format('Y/m/d') }}</div>
                                                        <div class="md:hidden">{{ $todo->datetime->format('m/d') }}</div>
                                                    </td>
                                                    <td class="px-2 py-3">
                                                        <form name="check{{ $todo->id }}" method="post" action="{{ route('updateCheckFlg') }}">
                                                            @csrf
                                                            <div class="block mt-2">
                                                                <label class="inline-flex items-center">
                                                                    <input type="hidden" name="check_flg" />
                                                                    <input name="check_flg" data-item-id="todo{{ $todo->id }}" type="checkbox" onchange="submitForm(check{{ $todo->id }}, position{{ $todo->id }})" class="check_flg w-6 h-6 text-green-400 border rounded-md focus:ring-0 cursor-pointer" value="1" @if($todo->check_flg === 1) { checked } @endif />
                                                                </label>
                                                            </div>
                                                            <input type="hidden" name="id" value="{{ $todo->id }}" />
                                                            <input type="hidden" name="position" id="position{{ $todo->id }}" value="0" />
                                                        </form>
                                                    </td>
                                                    <td class="px-4py-3">
                                                        <a class="text-indigo-500 inline-flex items-center whitespace-nowrap cursor-pointer">詳細</a>
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <button class="flex ml-auto text-white bg-red-500 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded whitespace-nowrap">削除</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <script>
        'use strict';
        let scroller = document.querySelector("#scroller");
        scroller.scrollTop = {{ $position }};

        function submitForm(formName, positionId) {
            let position = scroller.scrollTop;
            positionId.value = position;
        
            formName.submit();
        }

        function checkFilter(object) {
            let index = object.selectedIndex;
            let value = object.options[index].value;
            
            let todo_items = document.getElementsByClassName('todo_item');
            Array.prototype.forEach.call(todo_items, function (todo_item) {
                todo_item.classList.remove("hidden");
            });

            if(value === 'no_check') {
                let checks = document.getElementsByClassName('check_flg');
                Array.prototype.forEach.call(checks, function (check) {
                    if(check.checked === true){
                        let check_flg_on = check.dataset.itemId;
                        let filteredTodo = document.getElementById(check_flg_on);
                        filteredTodo.classList.add("hidden");
                    }
                });
            }
            if(value === 'checked') {
                let checks = document.getElementsByClassName('check_flg');
                Array.prototype.forEach.call(checks, function (check) {
                    if(check.checked === false) {
                        let check_flg_off = check.dataset.itemId;
                        let filteredTodo = document.getElementById(check_flg_off);
                        filteredTodo.classList.add("hidden");
                    }
                });
            }
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/datepicker.min.js"></script>
</x-app-layout>
