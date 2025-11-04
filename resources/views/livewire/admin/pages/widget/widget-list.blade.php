<div class="mt-8">
    <livewire:components.toast/>
    <h2 class="mx-auto mt-8 max-w-6xl px-4 text-lg font-medium leading-6 text-gray-900 sm:px-6 lg:px-8">
        <fieldset aria-label="Choose a memory option">

            <div class="mt-2 grid grid-cols-3 gap-3 sm:grid-cols-6">
                <!--
                  In Stock: "cursor-pointer", Out of Stock: "opacity-25 cursor-not-allowed"
                  Active: "ring-2 ring-indigo-600 ring-offset-2"
                  Checked: "ring-0 bg-indigo-600 text-white hover:bg-indigo-500", Not Checked: "ring-1 ring-gray-300 bg-white text-gray-900 hover:bg-gray-50"
                  Not Active and not Checked: "ring-inset"
                  Active and Checked: "ring-2"
                -->
                <label
                    class="bg-cyan-700 text-white hover:bg-cyan-600
                    flex cursor-pointer items-center justify-center rounded-md px-3 py-3 text-sm font-semibold
                    uppercase focus:outline-none sm:flex-1">
                    <input type="radio" name="memory-option" value="4 GB" class="sr-only">
                    <span>Каталог</span>
                </label>
            </div>
        </fieldset>
    </h2>


    <div class="hidden sm:block">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between sm:items-center mt-8   ">

                <div class="sm:flex-auto">
                    <div class="mt-4 sm:mt-0 grid-rows-8 w-1/4">
                        <div class="relative mt-2 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                     aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                          clip-rule="evenodd">
                                    </path>
                                </svg>
                            </div>
                            <input
                                wire:model.live="search_term"
                                type="text" name="search" id="search"
                                class="block w-full rounded-md border-0 py-1.5 pl-10 text-gray-900
                                    ring-1 ring-gray-300 placeholder:text-gray-400
                                    sm:text-sm sm:leading-6"
                                placeholder="Поиск">
                        </div>
                    </div>
                </div>
                <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                    <a href="#"
                       wire:click="openCatalogModal"
                       class="block rounded-md bg-indigo-600 py-2 px-3 text-center
                                 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500
                                  focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2
                                   focus-visible:outline-indigo-600">Добавить каталог</a>
                </div>
            </div>
            <div class="mt-2 flex flex-col">
                <div class="min-w-full overflow-hidden overflow-x-auto align-middle shadow sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th scope="col"
                                class="bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900">
                                <a wire:click="sort('tickets.name')" href="#" class="group inline-flex">
                                    Наиминование
                                    <!-- Active: "bg-gray-200 text-gray-900 group-hover:bg-gray-300", Not Active: "invisible text-gray-400 group-hover:visible group-focus:visible" -->
                                    <span
                                        @if($sort_type == 'tickets.name' and $direction == 'desc')
                                            class="ml-2 flex-none rounded
                                                    bg-red-50
                                                    text-red-900
                                                    group-hover:bg-red-100
                                                    pt-1"
                                        {{--                            style="background: #f3dbdb; color: #c70707"--}}
                                        @elseif($sort_type == 'tickets.name' and $direction == 'asc')
                                            class="ml-2 flex-none rounded
                                                    bg-green-50
                                                    text-green-900
                                                    group-hover:bg-green-100
                                                    pt-1"
                                        {{--                            style="background: #dbf3e5; color: #07c78c"--}}
                                        @else
                                            class="ml-2 flex-none rounded
                                                    text-gray-900
                                                    group-hover:bg-gray-100
                                                    pt-1"
                                            @endif >
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                 viewBox="0 0 24 24" stroke="currentColor" class="w-4 h-4
                                 @if($sort_type == 'tickets.name' and $direction == 'desc')
                                        text-red-900
                                 @elseif($sort_type == 'tickets.name' and $direction == 'asc')
                                        text-green-900
                                 @else
                                        text-gray-900
                                 @endif
                                 ">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5"/>
                            </svg>
                        </span>
                                </a>
                            </th>
                            {{--                            <th class="bg-gray-50 px-6 py-3 text-right text-sm font-semibold text-gray-900"--}}
                            {{--                                scope="col">Amount--}}
                            {{--                            </th>--}}
                            <th class="hidden bg-gray-50 px-6 py-3 text-left text-sm font-semibold text-gray-900 md:block"
                                scope="col">Статус
                            </th>
                            <th class="bg-gray-50 px-6 py-3 text-right text-sm font-semibold text-gray-900"
                                scope="col">
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach($list as $item)
                            <tr class="bg-white">
                                <td class="w-full max-w-0 whitespace-nowrap px-6 py-4 text-sm text-gray-900">
                                    <div class="flex">
                                        {{--                                    <a href="#" class="group inline-flex space-x-2 truncate text-sm">--}}
                                        {{--                                        <svg class="h-5 w-5 flex-shrink-0 text-gray-400 group-hover:text-gray-500"--}}
                                        {{--                                             viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">--}}
                                        {{--                                            <path fill-rule="evenodd"--}}
                                        {{--                                                  d="M1 4a1 1 0 011-1h16a1 1 0 011 1v8a1 1 0 01-1 1H2a1 1 0 01-1-1V4zm12 4a3 3 0 11-6 0 3 3 0 016 0zM4 9a1 1 0 100-2 1 1 0 000 2zm13-1a1 1 0 11-2 0 1 1 0 012 0zM1.75 14.5a.75.75 0 000 1.5c4.417 0 8.693.603 12.749 1.73 1.111.309 2.251-.512 2.251-1.696v-.784a.75.75 0 00-1.5 0v.784a.272.272 0 01-.35.25A49.043 49.043 0 001.75 14.5z"--}}
                                        {{--                                                  clip-rule="evenodd"/>--}}
                                        {{--                                        </svg>--}}
                                        <p class="truncate text-gray-500 group-hover:text-gray-900">
                                            {{ $item->name }}
                                        </p>
                                        {{--                                    </a>--}}
                                    </div>
                                </td>
                                {{--                            <td class="whitespace-nowrap px-6 py-4 text-right text-sm text-gray-500">--}}
                                {{--                                <span class="font-medium text-gray-900">$20,000</span>--}}
                                {{--                                USD--}}
                                {{--                            </td>--}}
                                <td class="hidden whitespace-nowrap px-6 py-4 text-sm text-gray-500 md:block">
                                    @if($item->active)
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-green-100 text-green-800 capitalize">
                                                Опубликован
                                            </span>
                                    @else
                                        <span
                                            class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium bg-red-100 text-red-800 capitalize">
                                                Не опубликован
                                            </span>
                                    @endif
                                </td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-2">
                                    <a
                                        wire:click="openCatalogModal({{ $item->id }})"
                                        type="button"
                                        class="inline-flex items-center rounded-md bg-indigo-600 hover:bg-indigo-400 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300">
                                        Редактировать
                                    </a>
                                    <a
                                        wire:click="openDeleteModal({{ $item->id }})"
                                        type="button"
                                        class="cursor-pointer inline-flex items-center rounded-md bg-red-600 hover:bg-red-400 px-3 py-2 text-sm font-semibold text-white shadow-sm ring-1 ring-inset ring-gray-300">
                                        Удалить
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    @include('admin.components.live-pagination', ['paginator' => $list])
                </div>
            </div>
        </div>
    </div>


</div>
