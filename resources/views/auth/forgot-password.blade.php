<x-guest-layout>
    <x-slot name="title"> Forgot Password </x-slot>
    <x-slot name="heading"> Forgot Password </x-slot>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="" :status="session('status')" />

    <span class="input-group-text"><x-input-error :messages="$errors->get('email')" class=""/></span>
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email Address -->
        <div class="input-group custom">
            <x-text-input
                id="email"
                type="text"
                name="email"
                :value="old('email')"
                class="form-control form-control-lg"
                placeholder="Email"
                required
                autofocus
            />
            <div class="input-group-append custom">
                <span class="input-group-text"
                ><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-5">
                <div class="input-group mb-0">
                    <!--
                    use code for form submit
                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Submit">
                -->
                    <x-button.primary-button
                        class="btn btn-primary btn-lg btn-block"
                        >{{ __('Reset') }}
                    </x-button.primary-button>
                </div>
            </div>
            <div class="col-2">
                <div
                    class="font-16 weight-600 text-center"
                    data-color="#707373"
                >
                    OR
                </div>
            </div>
            <div class="col-5">
                <div class="input-group mb-0">
                    <a
                        class="btn btn-outline-secondary btn-lg btn-block"
                        onclick="window.location.href='/login'"
                        >{{ __('Login') }}</a
                    >
                </div>
            </div>
        </div>
    </form>

</x-guest-layout>
