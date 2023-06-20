<x-guest-layout>

    <div class="w-full flex flex-col justify-center items-center gap-[100px] mb-[400px]">

        <div data-id="parent"  class=" relative flex flex-col w-[1410px] min-h-[354px] rounded-[12px] pointer-events-none">

            <div class="relative bg-[#313037] w-[1410px] h-[280px] rounded-t-[12px]"></div>
            <div data-id="parent" class="relative flex bg-[#343444]  w-[1410px] h-[74px] rounded-b-[12px] transition duration-2000 transform">
                <div class="flex min-w-[323px] "></div>
                <div  class="flex absolute justify-around items-center w-[1087px] left-[323px] top-[24px] z-[4]">
                    <button data-id="button1" class="border-none bg-transparent font-bold text[20px] cursor-pointer z-10 pointer-events-auto">All</button>
                    <button data-id="button2" class="border-none bg-transparent font-bold text[20px] cursor-pointer z-10 pointer-events-auto">My Collections</button>
                    <button data-id="button3" class="border-none bg-transparent font-bold text[20px] cursor-pointer z-10 pointer-events-auto">Make New Collection</button>
                    <button data-id="button4" class="border-none bg-transparent font-bold text[20px] cursor-pointer z-10 pointer-events-auto">. . .</button>
                </div>
            </div>

            <div class="absolute p-[30px] flex justify-between items-center w-full gap-10">

                <div class="bg-[#7A798A] h-[293px] w-[293px] rounded-[10px]">
                    <img src="">
                </div>
                <div class="flex justify-start flex-col h-[293px] mr-[38%]">
                    <p class="text-[18px] text-[#EBEBEB]">Author Profile</p>
                    <h2 class="font-bold text-[36px] flex">{{ auth()->user()->name }}</h2>
                </div>

                <div class="flex flex-col justify-start h-[293px]">
                    <div class="flex justify-start items-center gap-3 filter invert contrast-200">
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

            </div>

        </div>


        <div data-id="cards-container" class="flex justify-center gap-5 flex-wrap mb-[100px]">

            @foreach ($items as $item)
                @if($item->user_id === auth()->user()->id)
                    <div data-id="item-{{$loop->index}}" class="flex flex-col justify-center items-center bg-[#343444] w-[330px] h-[504px] rounded-[20px] p-[20px]">

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


                @endif

            @endforeach

        </div>


        <div data-id="collections-container" class="hidden">

            <div class="flex gap-[60px] max-w-[1410px]">
                @foreach ($collections as $collection)

                    <div class="flex flex-col gap-6 flex-wrap">

                        @if ($collection->items->count() > 0)

                        <h2 class="font-bold text-[24px]">{{ $collection->name }}</h2>

                        <div class="flex gap-4">

                            @foreach ($collection->items as $item)
                                @if ($item->user_id === auth()->user()->id)
                                    <div data-id="item-{{$loop->index}}" class="flex flex-col justify-center items-center bg-[#343444] w-[330px] h-[504px] rounded-[20px] p-[20px]">

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
                                @endif
                            @endforeach

                        </div>

                        @endif


                    </div>


                @endforeach

            </div>

        </div>

        <div data-id="form-container" class="hidden">
            <form class="flex flex-col justify-center items-center gap-4" action="{{ action([\App\Http\Controllers\AuthorController::class, 'store']) }}" method="POST">
                @csrf
                    <div>
                        <x-input-label class="text-[20px]"  for="name" :value="__('Name Of Collection')" />
                        <x-text-input id="name" placeholder="New Name Of Collection" class="block mt-1 w-[600px] h-[80px] text-[26px]" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <button type="submit" class="w-[160px] h-[80px] border border-gray-700 rounded-[10px] active:border-gray-100 ">
                        Create
                    </button>
                @if(session('success'))
                    <div class="bg-green-500 text-white px-4 py-2 rounded">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
        </div>


    </div>

</x-guest-layout>

<script>


    document.addEventListener('DOMContentLoaded', function() {
        const allButton = document.querySelector("[data-id='button1']");
        const myCollectionsButton = document.querySelector("[data-id='button2']");
        const makeNewCollectionButton = document.querySelector("[data-id='button3']");
        const parentContainer = document.querySelector("[data-id='parent']");
        const cardsContainer = document.querySelector("[data-id='cards-container']");
        const collectionsContainer = document.querySelector("[data-id='collections-container']");
        const formContainer = document.querySelector("[data-id='form-container']");

        allButton.addEventListener('click', function() {
            parentContainer.classList.remove('hidden');
            cardsContainer.classList.remove('hidden');
            collectionsContainer.classList.add('hidden');
            formContainer.classList.add('hidden');
        });

        myCollectionsButton.addEventListener('click', function() {
            parentContainer.classList.remove('hidden');
            cardsContainer.classList.add('hidden');
            collectionsContainer.classList.remove('hidden');
            formContainer.classList.add('hidden');
        });

        makeNewCollectionButton.addEventListener('click', function() {
            parentContainer.classList.remove('hidden');
            cardsContainer.classList.add('hidden');
            collectionsContainer.classList.add('hidden');
            formContainer.classList.remove('hidden');
        });
    });












    // document.addEventListener('DOMContentLoaded', function() {
    //     const buttons = document.querySelectorAll("[data-id^='button']");
    //     const containers = document.querySelectorAll("[data-id^='container']");
    //
    //     buttons.forEach(function(button) {
    //         button.addEventListener('click', function() {
    //             const buttonId = this.getAttribute('data-id');
    //             containers.forEach(function(container) {
    //                 const containerId = container.getAttribute('data-id');
    //                 if (containerId === buttonId) {
    //                     container.classList.remove('hidden');
    //                 } else {
    //                     container.classList.add('hidden');
    //                 }
    //             });
    //         });
    //     });
    // });



//        document.addEventListener('DOMContentLoaded', function() {
//        const allButton = document.querySelector("[data-id='button1']");
//        const items = document.querySelectorAll("[data-id^='item-']");
//
//        allButton.addEventListener('click', function() {
//        items.forEach(function(item) {
//            item.classList.toggle('hidden');
//    });
//    });
//    });
</script>


// const buttons = document.querySelectorAll("[data-id='button3']");
//
// buttons.forEach(function(button) {
//     button.addEventListener("click", function() {
//         const parentElement = document.querySelector("[data-id='parent']");
//         parentElement.style.height = 500 + "px";
//     });
// });
