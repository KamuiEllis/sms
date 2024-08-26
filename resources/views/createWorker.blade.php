<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workers') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto dark:bg-gray-800  sm:rounded-lg shadow">
            
            <form method="post" action="{{ route('worker.store') }}" class="mt-6 p-5 space-y-6">
                @csrf
                @if (isset($message))
            <p class='lead text-white' style='color:rgb(222, 117, 117)18, 151, 151)'>
                {{ $message }}
            </p>
        @endif
                <div>
                    <x-input-label for="name" :value="__('First Name')" />
                    <x-text-input id="name" name="firstname" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Last Name')" />
                    <x-text-input id="name" name="lastname" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                
                <x-primary-button>{{ __('Save') }}</x-primary-button>
        
            </form>
        </div>
    </div>
</x-app-layout>
