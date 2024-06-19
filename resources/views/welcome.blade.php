<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <title>Spot Test Nvision</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <form>
        <div class="flex flex-col items-center justify-center h-screen">
            <div class="flex flex-col items-center justify-center w-96 space-y-4">
                <h1 class="text-4xl font-bold text-center">Spot Test Nvision</h1>
                <div id="alert"
                    class="relative hidden w-full cursor-pointer rounded-lg border border-transparent bg-green-500 p-4 [&>svg]:absolute [&>svg]:text-foreground [&>svg]:left-4 [&>svg]:top-4 [&>svg+div]:translate-y-[-3px] [&:has(svg)]:pl-11 text-white">
                    <svg class="w-5 h-5 -translate-y-0.5" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h5 class="mb-1 font-medium leading-none tracking-tight">Row inserted</h5>
                    <span id="inserted-data" class="text-sm opacity-80"></span>
                </div>
                <div class="w-full max-w-xs mx-auto flex flex-col gap-3">
                    <input required type="text" placeholder="Name" id="name"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
                    <input required type="email" placeholder="Email" id="email"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
                    <input required type="text" placeholder="Phone" id="phone"
                        class="flex w-full h-10 px-3 py-2 text-sm bg-white border rounded-md border-neutral-300 ring-offset-background placeholder:text-neutral-500 focus:border-neutral-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-neutral-400 disabled:cursor-not-allowed disabled:opacity-50" />
                    <button type="submit" class="w-full p-2 bg-blue-500 text-white rounded-md">Submit</button>
                </div>
            </div>
        </div>
    </form>

</body>

</html>
