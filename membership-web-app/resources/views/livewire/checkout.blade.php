<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    <form method="POST" action="{{ route('checkout.store') }}" class="w-full min-w-sm px-2 py-4">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Name
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-first-name" type="text" name="name" placeholder="input your name">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Email
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    id="grid-last-name" type="email" name="email" placeholder="input your email">
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Mobile Number
                </label>
                <input
                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    id="grid-first-name" type="number" name="mobile_number" placeholder="input your name">
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Address
                </label>
                <textarea
                    class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="exampleFormControlTextarea1" rows="3" placeholder="Your Address" name="address"></textarea>
            </div>

        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Product
                </label>
                <select name="product" wire:model='product' class="form-control">
                    @foreach ($product as $products)
                    @if ($products->id == $productID->id)
                    <option value={{ $products->id }} selected>{{ $productID->title }}</option>
                    @else
                    <option value={{ $products->id }}>{{ $products->title }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-2">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button type="submit"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 text-base leading-6 font-bold text-white shadow-sm focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                    style="background-color: green; margin-right: 25px">
                    Store
                </button>
            </span>
        </div>
    </form>
</div>
