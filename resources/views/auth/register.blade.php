<x-layout>
    <x-slot:title>
        Register - Chirper
    </x-slot:title>

    <div class="hero min-h-[calc(100vh-16rem)]">
        <div class="hero-content flex-col">
            <div class="card w-96 shadow-2xl bg-base-100">
                <div class="card-body">
                    <h1 class="text-3xl font-bold text-center">Create Account</h1>

                <form method="POST" action="/register">
                    @csrf

                    <!-- Name -->
                    <div class="form-control">
                        <label class="label" for="name">
                            <span class="label-text">Name</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               class="input input-bordered @error('name') input-error @enderror"
                               required>
                        @error('name')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="form-control mt-4">
                        <label class="label" for="email">
                            <span class="label-text">Email</span>
                        </label>
                        <input type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               class="input input-bordered @error('email') input-error @enderror"
                               required>
                        @error('email')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="form-control mt-4">
                        <label class="label" for="password">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password"
                               name="password"
                               id="password"
                               class="input input-bordered @error('password') input-error @enderror"
                               required>
                        @error('password')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div class="form-control mt-4">
                        <label class="label" for="password_confirmation">
                            <span class="label-text">Confirm Password</span>
                        </label>
                        <input type="password"
                               name="password_confirmation"
                               id="password_confirmation"
                               class="input input-bordered"
                               required>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-control mt-6">
                        <button type="submit" class="btn btn-primary w-full">
                            Register
                        </button>
                    </div>
                </form>

                <div class="divider">OR</div>
                <p class="text-center text-sm">
                    Already have an account?
                    <a href="/login" class="link link-primary">Sign in</a>
                </p>
                </div>
            </div>
        </div>
    </div>
</x-layout>