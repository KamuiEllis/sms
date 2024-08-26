<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workers') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto dark:bg-gray-800  sm:rounded-lg shadow">
            
            <form method="post" action="/editWorker/{{$worker->id}}" class="mt-6 p-5 space-y-6">
                @csrf
                @method('PUT')
                @if (isset($message))
            <p class='lead text-white' style='color:rgb(222, 117, 117)18, 151, 151)'>
                {{ $message }}
            </p>
        @endif
                <div>
                    <x-input-label for="name" :value="__('First Name')" />
                    <x-text-input id="name" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $worker->firstname)"  required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Last Name')" />
                    <x-text-input id="name" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $worker->lastname)"  required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
                </div>
                
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <a href="/deleteWorker/{{$worker->id}}"><button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button></a>

            </form>
        </div>
    </div>
</x-app-layout>
