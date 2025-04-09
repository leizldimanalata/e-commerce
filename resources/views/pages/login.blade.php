<x-guest-layout>
    <x-slot:title>Login</x-slot:title>

    <section class="grid h-screen grid-cols-1 md:grid-cols-3">

        <div class="col-span-2 hidden rounded-r-[60px] bg-gradient-to-t from-[#E4B8B0] to-[#8E5AF6] md:block"></div>

        <div class="flex items-center justify-center p-8 md:p-0">
            <form method="POST" action="{{ route('authenticate-user') }}"
                class="w-full max-w-sm space-y-8 rounded-lg bg-white p-6">
                @csrf
                <h1 class="text-center text-3xl font-semibold text-gray-800">Login</h1>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]"
                        placeholder="Enter your email" required>
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password"
                        class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]"
                        placeholder="Enter your password" required>
                </div>

                <button type="submit"
                    class="w-full rounded-lg bg-[#8E5AF6] py-3 font-semibold text-white transition duration-300 hover:bg-[#6c4cc1] focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]">
                    Login
                </button>

                <div class="mt-4 text-center">
                    <a href="#" class="text-sm text-[#8E5AF6] hover:underline">Forgot your password?</a>
                </div>

                @if ($errors->any())
                    <div class="text-center text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
        </div>
    </section>
</x-guest-layout>
