<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Bienvenido') }}
        </h2>
    </x-slot>

    {{-- <x-jet-welcome /> --}}
    
    <div class="">
        @livewire('index')
    </div> 
</x-app-layout>