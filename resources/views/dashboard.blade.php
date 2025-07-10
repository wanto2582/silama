@php
if(Auth::user()->hasRole('admin')){
return redirect()->intended(route('admin.dashboard', absolute: false));
}else if(Auth::user()->hasRole('kades')){
return redirect()->intended(route('kades.dashboard', absolute: false));
}else if(Auth::user()->hasRole('staff')){
return redirect()->intended(route('staff.dashboard', absolute: false));
}else if(Auth::user()->hasRole('desa')){
return redirect()->intended(route('warga.dashboard', absolute: false));
}else{
return redirect()->intended(route('dashboard', absolute: false));
}
@endphp

{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
</h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                {{ __("You're logged in!") }}
            </div>
        </div>
    </div>
</div>
</x-app-layout> --}}
