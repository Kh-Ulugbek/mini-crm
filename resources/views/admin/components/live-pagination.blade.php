<div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>
{{--            <p class="text-sm text-gray-700">--}}
{{--                Showing--}}
{{--                <span class="font-medium">{{ $paginator->currentPage() }}</span>--}}
{{--                page of--}}
{{--                --}}{{--                <span class="font-medium">{{ $paginator->lastPage() }}</span>--}}
{{--                --}}{{--                of--}}
{{--                <span class="font-medium">{{ $paginator->lastPage() }}</span>--}}
{{--                page(s).--}}
{{--                Total items count:--}}
{{--                <span class="font-medium">{{ $paginator->total() }}</span>--}}
{{--            </p>--}}
        </div>
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                <a
                    wire:click="previousPage"
                    @if($paginator->currentPage() != 1)
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                    @else
                        class="relative inline-flex items-center rounded-l-md px-2 py-2 text-sm text-gray-400 ring-1 ring-inset ring-gray-300 focus:outline-offset-0"
                    @endif
                >
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
                <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                <a
                    wire:click="gotoPage(1)"
                    @if($paginator->currentPage() != 1)
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer"
                    @else
                        class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                    @endif
                >
                    1
                </a>

                @if($paginator->lastPage() >= 2)
                    <a
                        wire:click="gotoPage(2)"
                        @if($paginator->currentPage() != 2)
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer"
                        @else
                            class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @endif >
                        2
                    </a>
                @endif

                @if($paginator->lastPage() >= 3)
                    <a
                        wire:click="gotoPage(3)"
                        @if($paginator->currentPage() != 3)
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer"
                        @else
                            class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @endif >
                        3
                    </a>
                @endif




                @if($paginator->currentPage() > 6 and $paginator->lastPage() > 6)
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                @endif

                @if($paginator->currentPage() > 5 and $paginator->currentPage() - 2 < $paginator->lastPage() - 2)
                    <a wire:click="gotoPage({{ $paginator->currentPage() - 2 }})"
                       class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer">
                        {{ $paginator->currentPage() - 2 }}
                    </a>
                @endif

                @if($paginator->currentPage() > 4 and $paginator->currentPage() - 1 < $paginator->lastPage() - 2)
                    <a wire:click="gotoPage({{ $paginator->currentPage() - 1 }})"
                       class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer">
                        {{ $paginator->currentPage() - 1 }}
                    </a>
                @endif




                @if($paginator->currentPage() > 3 and $paginator->lastPage() > 6 and $paginator->currentPage() < $paginator->lastPage() - 2)
                    <a class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                        {{ $paginator->currentPage() }}
                    </a>
                @endif




                @if($paginator->currentPage() + 1 < $paginator->lastPage() - 2 and $paginator->currentPage() > 2)
                    <a wire:click="gotoPage({{ $paginator->currentPage() + 1 }})"
                       class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer">
                        {{ $paginator->currentPage() + 1 }}
                    </a>
                @endif

                @if($paginator->currentPage() + 2 < $paginator->lastPage() - 2 and $paginator->currentPage() >= 2)
                    <a wire:click="gotoPage({{ $paginator->currentPage() + 2 }})"
                       class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer">
                        {{ $paginator->currentPage() + 2 }}
                    </a>
                @endif


                @if($paginator->lastPage() > 6 and $paginator->currentPage() + 3 < $paginator->lastPage() - 2)
                    <span
                        class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                @endif




                @if($paginator->lastPage() > 5)
                    <a
                        wire:click="gotoPage({{ $paginator->lastPage() - 2 }})"
                        @if($paginator->currentPage() != $paginator->lastPage() - 2)
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer"
                        @else
                            class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @endif >
                        {{ $paginator->lastPage() - 2 }}
                    </a>
                @endif

                @if($paginator->lastPage() > 4)
                    <a
                        wire:click="gotoPage({{ $paginator->lastPage() - 1 }})"
                        @if($paginator->currentPage() != $paginator->lastPage() - 1)
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer"
                        @else
                            class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @endif >
                        {{ $paginator->lastPage() - 1 }}
                    </a>
                @endif

                @if($paginator->lastPage() > 3)
                    <a
                        wire:click="gotoPage({{ $paginator->lastPage() }})"
                        @if($paginator->currentPage() != $paginator->lastPage())
                            class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0 cursor-pointer"
                        @else
                            class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        @endif >
                        {{ $paginator->lastPage() }}
                    </a>
                @endif

                <a wire:click="nextPage"
                   @if($paginator->hasMorePages())
                       class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                   @else
                       class="relative inline-flex items-center rounded-r-md px-2 py-2 text-sm text-gray-400 ring-1 ring-inset ring-gray-300 focus:outline-offset-0"
                    @endif
                >
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
