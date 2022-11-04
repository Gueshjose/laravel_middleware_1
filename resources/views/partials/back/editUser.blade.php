<x-auth-card>
    <x-slot name="logo">
        <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
        </a>
    </x-slot>

    <form method="POST" action="user/{{ $user->id }}">
        @csrf
        @method('put')
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name') ? old('name') : $user->name" required
                autofocus />

            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />

            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email') ? old('email') : $user->email"
                required />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="role_id" :value="__('role_id')" />

            <select class="block mt-1 w-full"name="role_id" required>
                <option value="{{ $user->role_id }}">{{ $user->role->role }}</option>
                @foreach ($roles as $role)
                    @can('admin-user', [$role->id])
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endcan
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />
        </div>



        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-4">
                {{ __('Éditer') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-card>
