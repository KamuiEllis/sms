<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Workers') }}
        </h2>
    </x-slot>

    <div class="py-12 ">
        <div class="max-w-7xl mx-auto dark:bg-gray-800  sm:rounded-lg shadow">
            
            <form method="post" action="{{ route('patient.store') }}" class="mt-6 p-5 space-y-6">
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

                <div>
                    <x-input-label for="name" :value="__('Age')" />
                    <x-text-input id="name" name="age" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('age')" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Caretaker')" />
                    <select name='caretaker' class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @foreach($workers as $worker)
                            <option  value={{$worker->firstname}}>{{$worker->firstname}} {{$worker->lastname}}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('caretaker')" />
                </div>

                <div>
                    <x-input-label for="name" :value="__('Records')" />
                    <textarea name="records" class="w-100 h-50 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                    </textarea>
                    <x-input-error class="mt-2" :messages="$errors->get('age')" />
                </div>
                
                <x-primary-button>{{ __('Save') }}</x-primary-button>
        
            </form>
        </div>
    </div>
</x-app-layout>
