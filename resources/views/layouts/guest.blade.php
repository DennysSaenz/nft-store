
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-50 antialiased bg-[#14141F] overflow-x-hidden">

    @php
        $routeName = request()->route()->getName();
//        dd($routeName);
        $page_name = '';

        if ($routeName === 'login') {
            $page_name = 'Login';
        } elseif ($routeName === 'register') {
            $page_name = 'Signup';
        } elseif ($routeName === 'items.create') {
            $page_name = 'Create Item';
        } elseif ($routeName === 'items.index') {
            $page_name = 'Home';
        } elseif ($routeName === 'Author.index') {
            $page_name = 'Author';
        }

    @endphp


    <header class="absolute top-0 w-full">
        <div class="w-full bg-[#14141f]/60  border-b border-[#8A8AA0]/40">
            <nav class="flex justify-between items-center h-[80px] mx-auto max-w-[1410px] relative ">
                <div class="flex justify-center items-center gap-[10px]">
                    <img src="{{asset('build/assets/imgs/AxiesLogo.svg')}}">
                    <span>Axies</span>
                </div>
                <div>
                    <ul class="flex gap-4">
                        <li>
                            <a class="cursor-pointer">Home</a>
                        </li>
                        <li>
                            <a class="flex gap-[6px] cursor-pointer">Explore <img src="{{asset('build/assets/imgs/dropd_icon.svg')}}"></a>
                        </li>
                        <li>
                            <a class="flex gap-[6px] cursor-pointer">Activity <img src="{{asset('build/assets/imgs/dropd_icon.svg')}}"></a>
                        </li>
                        <li>
                            <a class="flex gap-[6px] cursor-pointer">Community <img src="{{asset('build/assets/imgs/dropd_icon.svg')}}"></a>
                        </li>
                        <li>
                            <a class="flex gap-[6px] cursor-pointer">Pages  <img src="{{asset('build/assets/imgs/dropd_icon.svg')}}"></a>
                        </li>
                        <li class="">
                            <a class="flex gap-[6px] cursor-pointer">Contact <img src="{{asset('build/assets/imgs/dropd_icon.svg')}}"></a>
                        </li>
                    </ul>
                </div>
                <div class="">
                    <div>
                        <img src="">
                    </div>
                    <button class="flex justify-center items-center gap-2 w-[198px] h-[48px] border border-solid border rounded-[24px] bg-[hsla(245, 97%, 62%, 1)] pl-[30px] pr-[30px] pt-[13px] pb-[13px]">
                        <img src="{{asset('build/assets/imgs/Icon Wallet.svg')}}">
                        <span class="text-[15px] ">Wallet connect</span>
                    </button>
                </div>

            </nav>
        </div>
    </header>

{{--        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">--}}
{{--            <div>--}}
{{--                <a href="/">--}}
{{--                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />--}}
{{--                </a>--}}
{{--            </div>--}}

    <main class="flex justify-center items-center flex-col">


        <div class="flex justify-center items-center bg-[#3d3d5399] w-full h-[296px] mb-[80px]">
            <div class="flex justify-center items-center flex-col">
                <h1 class="font-bold text-[48px]">{{$page_name}}</h1>
                <div class="flex gap-3">
                    <a class="text-[18px] text-[#8A8AA0] cursor-pointer">Home</a><span class="text-[18px] text-[#8A8AA0]">/</span ><a class="text-[18px] text-[#8A8AA0] cursor-pointer">Pages</a><span class="text-[18px] text-[#8A8AA0]">/</span><a class="cursor-pointer">{{$page_name}}</a>
                </div>
            </div>
        </div>

        <div class="flex flex-col">

            <div class="flex justify-center items-center ">
                {{ $slot }}
            </div>
        </div>
    </main>

    <footer class="flex justify-center items-center relative bottom-0 w-full h-[362px] bg-[#0D0D11]">
        <div class="flex justify-center items-center mx-auto max-w-[1410px]  gap-[145px]">
            <div class="">
                <div class="flex justify-start items-center gap-[12px] mb-3">
                    <img src="{{asset('build/assets/imgs/AxiesLogo.svg')}}"> <span class="text-[36px] font-bold">Axies</span>
                </div>
                <p class="w-[255px] h-[66px] text-[14px] mb-7">Lorem ipsum dolor sit amet,consectetur
                    adipisicing elit. Quis non, fugit totam vel
                    laboriosam vitae.</p>
                <div class="flex justify-start items-center gap-3">
                    <button class="flex justify-center items-center rounded-[8px] bg-[#343444] p-2.5">
                        <img src="{{asset('build/assets/imgs/cooliconFB.svg')}}">
                    </button>
                    <button class="flex justify-center items-center rounded-[8px] bg-[#343444] p-2.5">
                        <img src="{{asset('build/assets/imgs/cooliconTW.svg')}}">
                    </button>
                    <button class="flex justify-center items-center rounded-[8px] bg-[#343444] p-2.5">
                        <img src="{{asset('build/assets/imgs/cooliconGG.svg')}}">
                    </button>
                    <button class="flex justify-center items-center rounded-[8px] bg-[#343444] p-2.5">
                        <img src="{{asset('build/assets/imgs/cooliconTwich.svg')}}">
                    </button>
                </div>
            </div>
            <div>
                <span class="font-bold text-[18px]">My Account</span>
                <ul class="flex flex-col gap-4">
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Authors</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Collection</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Author Profile</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Create Collection</a>
                    </li>
                </ul>
            </div>
            <div>
                <span class="font-bold text-[18px]">Ressources</span>
                <ul class="flex flex-col gap-4">
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Help & Support</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Live Auctions</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Item Details</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Activity</a>
                    </li>
                </ul>
            </div>
            <div>
                <span class="font-bold text-[18px]">Company</span>
                <ul class="flex flex-col gap-4">
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">About Us</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Contact Us</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Our Blog</a>
                    </li>
                    <li>
                        <a class="text-[14px] font-normal cursor-pointer">Discover</a>
                    </li>
                </ul>
            </div>
            <div>
                <form method="POST">
                    @csrf
                    <span class="font-bold text-[19px]">Subscribe Us</span>
                    <div class="flex">
                        <input type="email" placeholder="Info@yourgmail.com" class="border[#343444] rounded-s-[10px] border-[1px] bg-transparent">
                        <button class="flex justify-center items-center w-[60px] h-[60px] bg-[#5142FC] rounded-e-[10px]" type="submit"><img src="{{asset('build/assets/imgs/sendIcon.svg')}}"></button>
                    </div>
                </form>
            </div>
        </div>
    </footer>


{{--        </div>--}}
    </body>
</html>
