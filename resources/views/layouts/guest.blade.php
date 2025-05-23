<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    @livewireStyles

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])

    <title>{{ $title ?? 'Website' }} </title>

    @stack('style')
</head>

<body class="antialiased">
    @livewireScripts

    <div>
        {{ $slot }}
    </div>

    @stack('scripts')

    <script>
        // Reusable piece of code for dropdown
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                open: false,

                toggle() {
                    this.open = !this.open;
                },
            }))

            Alpine.data('search', () => ({
                open: false,

                toggle() {
                    this.open = !this.open;
                },
            }))
        })
    </script>
</body>

</html>
