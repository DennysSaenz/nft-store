<x-guest-layout>

{{--    @php--}}
{{--        dd($items);--}}
{{--    @endphp--}}


<div class="flex flex-col gap-[100px]">

    <div class="flex justify-center gap-5 flex-wrap mb-[100px]">

        @foreach ($items as $item)
            <div class="flex flex-col justify-center items-center bg-[#343444] w-[330px] h-[504px] rounded-[20px] p-[20px]">
                <div class="w-[290px] h-[290px] rounded-[20px] bg-[#7A798A] mb-5 overflow-hidden">
                    <div class="relative z-10 flex justify-center items-center w-[64px] h-[28px] bg-[#14141F] rounded-[10px] gap-[5px] left-[214px] top-[14px] right-[12px] bottom-[248px]">
                        <img class="" src="{{ asset('build/assets/imgs/like-preview.svg') }}"><span class="relative">100</span>
                    </div>
                    <div>
                        <img class="relative object-cover object-fill w-[290px] h-[290px] bottom-[28px]" src="{{ asset('storage/images/' . $item->img) }}">
                    </div>
                </div>
                <div class="flex justify-between items-center w-full mb-[17px]">
                    <span class="font-bold text-[18px]">{{ $item->title }}</span> <span class="flex justify-center items-center bg-[#5142FC] h-[24px] w-[49px] rounded-[10px] text-[12px]">ETH</span>
                </div>
                <div class="flex justify-around items-center gap-3 mb-[20px] w-full">
                    <div class="bg-[#C4C4C4] h-[44px] w-[44px] rounded-[15px] ">
                        <img src="">
                    </div>
                    <div class="flex flex-col gap-0.5 mr-[60px]">
                        <span class="text-[13px] text-[#8A8AA0]">Owned By</span>
                        <p class="text-[15px] font-bold text-[#EBEBEB]">{{$users->find($item->user_id)->name}}</p>
                    </div>
                    <div>
                        <span class="text-[13px] text-[#8A8AA0]">Current Bid</span>
                        <p class="text-[18px] font-bold text-[#EBEBEB]">{{ $item->price }} ETH</p>
                    </div>
                </div>
                <div class="flex justify-between w-full">
                    <button class="bg-transparent flex justify-center items-center w-[141px] h-[46px] gap-2 border border-[#5142FC] rounded-[30px]">
                        <img src="{{ asset('build/assets/imgs/Bag 2.svg') }}"> <span>Place Bid</span>
                    </button>
                    <button class="flex justify-center items-center gap-2 bg-transparent border-none">
                        <img src="{{ asset('build/assets/imgs/History.svg') }}"> <span class="text-[#8A8AA0] font-bold text-[16px]">View History</span>
                    </button>
                </div>
            </div>
        @endforeach

    </div>



    <div class="flex justify-center items-center gap-10 mb-[70px]">
    @foreach ($collections as $collection)
        @if ($collection->items->count() > 0)

                <div class="flex w-[450px] h-[294px] p-[10px] bg-[#343444] rounded-[10px]">
                    <div class="flex flex-col justify-between w-[410px] h-[272px]">
                        <div class="flex justify-center flex-wrap w-[410px] gap-[10px]">
                            @foreach ($collection->items->take(5) as $item)
                                <div class="w-[130px] h-[90px] bg-[#7A798A] object-fill rounded-[10px] overflow-hidden">
                                    <img src="{{ asset('storage/images/' . $item->img) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="flex justify-between w-full gap-2">
                            <div class="w-[64px] h-[64px] bg-[#7A798A] relative rounded-[21px]">
                                <img class="absolute left-[90%] top-[90%]" src="{{ asset('build/assets/imgs/like-preview.svg') }}">
                            </div>
                            <div class="flex flex-col gap-[6px]">
                                <div class="">
                                    <h2 class="font-bold text-[20px]">{{ $collection->name }}</h2>
                                </div>
                                <div class="flex gap-2">
                                    <span class="text[13px] text-[#8A8AA0]">Created by</span> <span class="text-[15px] ">{{ $collection->user->name }}</span>
                                </div>
                            </div>
                            <div class="relative z-10 flex justify-center items-center w-[64px] h-[28px] bg-[#14141F] rounded-[10px] gap-[5px]">
                                <img class="" src="{{ asset('build/assets/imgs/like-preview.svg') }}"><span class="relative">100</span>
                            </div>
                        </div>
                    </div>
                </div>

        @endif
    @endforeach
</div>



















{{--** esto es un contenedor para renderizar una collection. se deben renderizar mas dinamicamente **--}}
{{--        <div>--}}
{{--        <div class="w-[450px] h-[294px] p-[10px] bg-[#343444] rounded-[10px]">--}}
{{--            <div class="flex flex-col w-[410px] h-[272px]">--}}
{{--                <div class="flex flex-wrap w-[410px] gap-[10px]">--}}

{{--                    <div class="w-[30%] h-[20%] bg-[#7A798A] object-fill rounded-[10px] overflow-hidden"> **se generaran dinamicamente segun la cantidad de items de la collection, el maximo a generar son 5**--}}
{{--                        <img src=" **dinamico que se obtendra de la base de datos segun el item de la img ** ">--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="flex justify-between w-full gap-2">--}}
{{--                    <div class="w-[64px] h-[64px] bg-[#7A798A] relative rounded-[21px]">--}}
{{--                        <img class="absolute left-[90%] top-[90%]" src="">--}}
{{--                    </div>--}}
{{--                    <div class="flex flex-col gap-[6px]">--}}
{{--                        <div class="">--}}
{{--                            <h2 class="font-bold text-[20px]">**nombre dinamico de la collection**</h2>--}}
{{--                        </div>--}}
{{--                        <div class="flex gap-2">--}}
{{--                            <span class="text[13px] text-[#8A8AA0]">Created by</span> <span class="text-[15px] ">**nombre dinamico del autor**</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="relative z-10 flex justify-center items-center w-[64px] h-[28px] bg-[#14141F] rounded-[10px] gap-[5px]">--}}
{{--                        <img class="" src="{{ asset('build/assets/imgs/like-preview.svg') }}"><span class="relative">100</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

</div>

</x-guest-layout>



