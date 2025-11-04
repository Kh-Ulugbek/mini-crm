<div class="hidden lg:fixed lg:inset-y-0 lg:flex lg:w-64 lg:flex-col">
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-grow flex-col overflow-y-auto bg-cyan-700 pb-4 pt-5">
        <div class="flex flex-shrink-0 items-center px-4">
            <a href="{{ route('admin.widget.list') }}">
                <img class="h-8 w-auto" src="{{ asset('images/logo-white.png') }}" alt="Easywire logo">
            </a>
        </div>
        <nav class="mt-5 flex flex-1 flex-col divide-y divide-cyan-800 overflow-y-auto" aria-label="Sidebar">
            <div class="space-y-1 px-2">
                <!-- Current: "bg-cyan-800 text-white", Default: "text-cyan-100 hover:bg-cyan-600 hover:text-white" -->
                <a href="{{ route('admin.widget.list') }}" wire:navigate
                   class="@if(request()->route()->getName() == 'admin.widget.list') bg-cyan-800 text-white @else text-cyan-100 hover:bg-cyan-600 hover:text-white @endif group flex items-center rounded-md px-2 py-2 text-sm font-medium leading-6"
                   aria-current="page">
                    <svg class="mr-4 h-6 w-6 flex-shrink-0 text-cyan-200" fill="none" viewBox="0 0 24 24"
                         stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>
                    Домашняя страница
                </a>
            </div>
        </nav>
    </div>
</div>
