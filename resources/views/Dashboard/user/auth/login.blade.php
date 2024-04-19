
   
   
 @if (app()->getLocale() == 'ar')
        @php
            $direction = "rtl";
        @endphp
 @else  
    @php
    $direction = "ltr";
    @endphp
 @endif

<style>
    .login:last-of-type{
        display: none
    }
    body{
        direction: {{ $direction }}
    }


   
</style>
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <select id="typeLogin" class="mb-4" style="width: 100%;border:1px solid #eee">
        <option value="admin">{{ __('dashboard/login_trans.admin') }}</option>
        <option value="user" selected >{{ __('dashboard/login_trans.sick') }}</option>
    </select>
    <form method="POST" action="{{ route('user.login') }}" id="user" class="login">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('dashboard/login_trans.email') " />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('dashboard/login_trans.password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            <x-primary-button class="ms-3">
                {{ __('dashboard/login_trans.login') }}
            </x-primary-button>
        </div>
    </form>


    <form method="POST" action="{{ route('admin.login') }}" id="admin" class="login">
        @csrf
        
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('dashboard/login_trans.email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
             <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('dashboard/login_trans.password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        {{-- <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

            <x-primary-button class="ms-3">
                {{ __('dashboard/login_trans.login') }}
            </x-primary-button>
        </div>
    </form>

</x-guest-layout>

<script>
   let typeLogin = document.querySelector("#typeLogin");
   typeLogin.onchange = function()
    {
        let value = this.value;
        document.querySelectorAll(".login").forEach(function(el){
            el.getAttribute("id") == value ? el.style.display = "block" :  el.style.display = "none"
        })
    }
</script>
