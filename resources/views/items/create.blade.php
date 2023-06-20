<x-guest-layout>


    <div>
        <div class="flex flex-col justify-center items-center bg-[#343444] w-[330px] h-[504px] rounded-[20px] p-[20px]">
            <div class="w-[290px] h-[290px] rounded-[20px] bg-[#7A798A] mb-5 overflow-hidden">
                <img id="uploaded_image" src="">
                <div class="relative flex justify-center items-center w-[64px] h-[28px] bg-[#14141F] rounded-[10px] gap-[5px] left-[214px] top-[14px] right-[12px] bottom-[248px]">
                    <img src="{{asset('build/assets/imgs/like-preview.svg')}}"><span>100</span>
                </div>
            </div>
            <div class="flex justify-between items-center w-full mb-[17px]">
                <span id="title_span" class="font-bold text-[18px]">"Cyber Doberman #766”</span> <span class="flex justify-center items-center bg-[#5142FC] h-[24px] w-[49px] rounded-[10px] text-[12px]">ETH</span>
            </div>
            <div class="flex justify-around items-center w-full gap-3 mb-[20px]">
                <div class="bg-[#C4C4C4] h-[44px] w-[44px] rounded-[15px]">
                    <img src="">
                </div>
                <div class="flex flex-col gap-0.5 mr-[60px]">
                    <span class="text-[13px] text-[#8A8AA0]">Owned By</span>
                    <p class="text-[15px] font-bold text-[#EBEBEB]">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <span class="text-[13px] text-[#8A8AA0]">Current Bid</span>
                    <p id="price_output" class="text-[18px] font-bold text-[#EBEBEB]">4.89 ETH</p>
                </div>
            </div>
            <div class="flex justify-between w-full">
                <button class="bg-transparent flex justify-center items-center w-[141px] h-[46px] gap-2 border border-[#5142FC] rounded-[30px]">
                    <img src="{{asset('build/assets/imgs/Bag 2.svg')}}"> <span>Place Bid</span>
                </button>
                <button class="flex justify-center items-center gap-2 bg-transparent border-none">
                    <img src="{{asset('build/assets/imgs/History.svg')}}"> <span class="text-[#8A8AA0] font-bold text-[16px]">View History</span>
                </button>
            </div>
        </div>
    </div>


        <div class="container mx-auto">
            <div class="max-w-md mx-auto shadow p-6 rounded">
                <h2 class="text-2xl font-bold text-white mb-4">Create Item</h2>

                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <x-input-label for="upload_file" :value="__('Upload file')" />
                        <x-text-input data-id="upload_image" class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="upload_file" type="file" name="upload_file" :value="old('upload_file')" accept="image/*, video/mp4" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('upload_file')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label for="select_method" class="block text-white font-bold mb-2">{{ __('Select Method') }}</label>
                        <button id="fixed_price" class=" hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full bg-blue-500" name="select_method" type="button" onclick="setSelectMethod('fixed_price')">Fixed Price</button>
                        <input type="hidden" name="select_method" id="hidden_select_method" value="{{ old('select_method') }}" required>
                    </div>

                    <div class="mb-4">
                        <x-input-label for="price" :value="__('Price')" />
                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="price" type="text" name="price" placeholder="Enter price for one item (ETH)" :value="old('price')" required />
                        <x-input-error :messages="$errors->get('price')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="title" type="text" name="title" placeholder="Item Name" :value="old('title')" required />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="description" name="description" placeholder="e.g. 'This is very limited item'" :value="old('description')" required></x-text-input>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="royalties" :value="__('Royalties')" />
                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="royalties" type="text" name="royalties" placeholder="5%" :value="old('royalties')" required />
                        <x-input-error :messages="$errors->get('royalties')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="size" :value="__('Size')" />
                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="size" type="text" name="size" placeholder="e.g. 'size'" :value="old('size')" required />
                        <x-input-error :messages="$errors->get('size')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="collection" :value="__('Collection')" />
                        <select class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="collection" name="collection" required>
                            @foreach($collections as $collection)
                                <option value="{{$collection->id}}">{{$collection->name}}</option>--}}
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('collection')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="categories" :value="__('Categories')" />
                        <select class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="categories" name="categories" required>
                            <option value="abstraction">Abstraction</option>
                            <option value="art">Art</option>
                            <option value="music">Music</option>
                            <option value="virtual_world">Virtual World</option>
                            <option value="sports">Sports</option>
                            <option value="trading_cards">Trading Cards</option>
                        </select>
                        <x-input-error :messages="$errors->get('categories')" class="mt-2" />
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Create Item
                        </button>
                    </div>
                </form>


                <script>

                    const button = document.querySelector('#fixed_price');
                    button.addEventListener('click', function() {
                        button.classList.add('bg-[#050614]');
                        // button.styles.add('#fixed_price {background-color: #050614}');
                    })

                    function setSelectMethod(method) {
                        document.querySelector('#hidden_select_method').value = method;
                    }



                    const uploadFileInput = document.querySelector('input[data-id="upload_image"]');
                    const uploadedImage = document.querySelector('#uploaded_image');

                    const titleInput = document.querySelector('#title');

                    const priceInput = document.querySelector('#price');
                    const priceOutput = document.querySelector('#price_output');

                    priceInput.addEventListener('input', function() {
                        const price = priceInput.value;
                        priceOutput.textContent = `${price} ETH`;
                    })

                    // uploadFileInput.addEventListener('change', function() {
                    //     const file = uploadFileInput.files[0];
                    //     const reader = new FileReader();
                    //
                    //     reader.onload = function (e) {
                    //
                    //         uploadedImage.src = e.target.result;
                    //     }
                    //
                    //
                    //     reader.readAsDataURL(file);
                    //
                    // })

                    uploadFileInput.addEventListener('change', function() {
                        console.log(uploadFileInput)
                        const [file] = uploadFileInput.files;
                        if (file) {
                            uploadedImage.src = URL.createObjectURL(file);
                        }
                    })


                    titleInput.addEventListener('input', function() {
                        const titleSpan = document.querySelector('#title_span'); // Selecciona el <span> con el id "title_span"
                        titleSpan.textContent = titleInput.value; // Actualiza el contenido del <span> con el valor del input "Title"
                    });

                </script>


            </div>
        </div>

































{{--        <div class="container mx-auto">--}}
{{--            <div class="max-w-md mx-auto bg-white shadow p-6 rounded">--}}
{{--                <h2 class="text-2xl font-bold text-white mb-4">Create Item</h2>--}}

{{--                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="upload_file" :value="__('Upload file')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="upload_file" type="file" name="upload_file" :value="old('upload_file')" accept="image/*, video/mp4" required autofocus />--}}
{{--                        <small class="text-gray-400">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</small>--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="select_method" :value="__('Select Method')" />--}}
{{--                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" name="select_method" type="button">Fixed Price</button>--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="price" :value="__('Price')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="price" type="text" name="price" :value="old('price')" placeholder="Enter price for one item (ETH)" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="title" :value="__('Title')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="title" type="text" name="title" :value="old('title')" placeholder="Item Name" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="description" :value="__('Description')" />--}}
{{--                        <x-textarea-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="description" name="description" :value="old('description')" placeholder="e.g. 'This is very limited item'" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="royalties" :value="__('Royalties')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="royalties" type="text" name="royalties" :value="old('royalties')" placeholder="5%" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="size" :value="__('Size')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="size" type="text" name="size" :value="old('size')" placeholder="e.g. 'size'" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="collection" :value="__('Collection')" />--}}
{{--                        <x-select-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="collection" name="collection" :options="['thoughts' => 'Thoughts', 'gems' => 'Gems', 'fantastic_worlds' => 'Fantastic Worlds', 'fantastic_unicorns' => 'Fantastic Unicorns']" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="categories" :value="__('Categories')" />--}}
{{--                        <x-select-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="categories" name="categories" :options="['abstraction' => 'Abstraction', 'art' => 'Art', 'music' => 'Music', 'virtual_world' => 'Virtual World', 'sports' => 'Sports', 'trading_cards' => 'Trading Cards']" required />--}}
{{--                    </div>--}}

{{--                    <div class="flex justify-end">--}}
{{--                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                            Create Item--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}







    {{--        <div class="container mx-auto">--}}
{{--            <div class="max-w-md mx-auto bg-white shadow p-6 rounded">--}}
{{--                <h2 class="text-2xl font-bold text-white mb-4">Create Item</h2>--}}

{{--                <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="upload_file" :value="__('Upload file')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="upload_file" type="file" name="upload_file" :value="old('upload_file')" accept="image/*, video/mp4" required autofocus />--}}
{{--                        <small class="text-gray-400">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</small>--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="select_method" :value="__('Select Method')" />--}}
{{--                        <x-button-toggle class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" name="select_method" :options="['fixed_price' => 'Fixed Price']" />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="price" :value="__('Price')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="price" type="text" name="price" :value="old('price')" placeholder="Enter price for one item (ETH)" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="title" :value="__('Title')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="title" type="text" name="title" :value="old('title')" placeholder="Item Name" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="description" :value="__('Description')" />--}}
{{--                        <x-textarea-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="description" name="description" :value="old('description')" placeholder="e.g. 'This is very limited item'" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="royalties" :value="__('Royalties')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="royalties" type="text" name="royalties" :value="old('royalties')" placeholder="5%" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="size" :value="__('Size')" />--}}
{{--                        <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="size" type="text" name="size" :value="old('size')" placeholder="e.g. 'size'" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="collection" :value="__('Collection')" />--}}
{{--                        <x-select-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="collection" name="collection" :options="['thoughts' => 'Thoughts', 'gems' => 'Gems', 'fantastic_worlds' => 'Fantastic Worlds', 'fantastic_unicorns' => 'Fantastic Unicorns']" required />--}}
{{--                    </div>--}}

{{--                    <div class="mb-4">--}}
{{--                        <x-input-label for="categories" :value="__('Categories')" />--}}
{{--                        <x-select-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="categories" name="categories" :options="['abstraction' => 'Abstraction', 'art' => 'Art', 'music' => 'Music', 'virtual_world' => 'Virtual World', 'sports' => 'Sports', 'trading_cards' => 'Trading Cards']" required />--}}
{{--                    </div>--}}

{{--                    <div class="flex justify-end">--}}
{{--                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                            Create Item--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}





















    {{--    --}}
{{--    <div class="container mx-auto bg-transparent">--}}
{{--        <div class="max-w-md mx-auto shadow p-6 rounded">--}}
{{--            <h2 class="text-2xl font-bold text-white mb-4">Create Item</h2>--}}

{{--            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">--}}
{{--                @csrf--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="upload_file" class="block font-bold text-white mb-1">Upload File:</label>--}}
{{--                    <input id="upload_file" type="file" name="upload_file" accept="image/*, video/mp4"--}}
{{--                           class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                    <small class="text-gray-400">PNG, JPG, GIF, WEBP or MP4. Max 200mb.</small>--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="select_method" class="block font-bold text-white mb-1">Select Method:</label>--}}
{{--                    <div>--}}
{{--                        <button id="select_method" type="button"--}}
{{--                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">--}}
{{--                            Fixed Price--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="price" class="block font-bold text-white mb-1">Price:</label>--}}
{{--                    <input id="price" type="text" name="price" placeholder="Enter price for one item (ETH)"--}}
{{--                           class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="title" class="block font-bold text-white mb-1">Title:</label>--}}
{{--                    <input id="title" type="text" name="title" placeholder="Item Name"--}}
{{--                           class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="description" class="block font-bold text-white mb-1">Description:</label>--}}
{{--                    <textarea id="description" name="description" placeholder="e.g. 'This is very limited item'"--}}
{{--                              class="bg-transparent border border-gray-300 rounded p-2 w-full text-white"></textarea>--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="royalties" class="block font-bold text-white mb-1">Royalties:</label>--}}
{{--                    <input id="royalties" type="text" name="royalties" placeholder="5%"--}}
{{--                           class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="size" class="block font-bold text-white mb-1">Size:</label>--}}
{{--                    <input id="size" type="text" name="size" placeholder="e.g. 'size'"--}}
{{--                           class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="collection" class="block font-bold text-white mb-1">Collection:</label>--}}
{{--                    <select id="collection" name="collection"--}}
{{--                            class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                        <option value="thoughts">Thoughts</option>--}}
{{--                        <option value="gems">Gems</option>--}}
{{--                        <option value="fantastic_worlds">Fantastic Worlds</option>--}}
{{--                        <option value="fantastic_unicorns">Fantastic Unicorns</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="mb-4">--}}
{{--                    <label for="categories" class="block font-bold text-white mb-1">Categories:</label>--}}
{{--                    <select id="categories" name="categories"--}}
{{--                            class="bg-transparent border border-gray-300 rounded p-2 w-full text-white">--}}
{{--                        <option value="abstraction">Abstraction</option>--}}
{{--                        <option value="art">Art</option>--}}
{{--                        <option value="music">Music</option>--}}
{{--                        <option value="virtual_world">Virtual World</option>--}}
{{--                        <option value="sports">Sports</option>--}}
{{--                        <option value="trading_cards">Trading Cards</option>--}}
{{--                    </select>--}}
{{--                </div>--}}

{{--                <div class="flex justify-end">--}}
{{--                    <button type="submit"--}}
{{--                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">--}}
{{--                        Create Item--}}
{{--                    </button>--}}
{{--                </div>--}}


{{--                <div>--}}
{{--                    <x-input-label for="upload_file" :value="__('upload_file')" />--}}
{{--                    <x-text-input class="bg-transparent border border-gray-300 rounded p-2 w-full text-white" id="upload_file" class="block mt-1 w-full" type="file" name="upload_file" :value="old('file')" accept="image/*, video/mp4" required autofocus autocomplete="username" />--}}
{{--                    <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--                </div>--}}


{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}


</x-guest-layout>
