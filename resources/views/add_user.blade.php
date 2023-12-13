<x-app-layout>
    <div class="flex flex-col p-10 font-sans-serif items-center justify-center">
        <div class="relative h-auto bg-white rounded-lg shadow-lg w-2/5">
            <div class="p-10">
                <form method="POST" action="/add_user" enctype="multipart/form-data">
                    @csrf
            
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
            
                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
            
                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />
            
                        <x-text-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
            
                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            
                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required autocomplete="new-password" />
            
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
            
                    <div class="mt-4">
                        <x-input-label for="role" :value="__('Tipe Akses')" />
                        <select id="role" class="block mt-1 w-full" type="role" name="role" :value="old('role')" required autocomplete="username" >
                            <option value="" disabled selected>Pilih Tipe Akses</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2" />
                    </div>
            
                    <div class="flex items-center justify-center mt-4">
                        
            
                        <x-primary-button class="ms-4">
                            {{ __('Tambahkan') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        
    </div>
    </div>
    
</x-app-layout>
