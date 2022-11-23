<div class="flex flex-auto">
    @foreach ($product as $products)
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <div class="px-6 py-2">
            <div class="font-bold text-xl mb-2">Membership {{ $products->title }}</div>
            <p class="text-gray-700 text-base">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla!
                Maiores et perferendis eaque, exercitationem praesentium nihil.
            </p>
            <div class="mt-5">
                <span class="text-left" style="margin-right: 25%; margin-top: 15%">Time: {{ $products->duration
                    }}</span>
                <span class="text-right">Price : Rp . {{ $products->price }}</span>
            </div>
        </div>
        <div class="px-6 pb-2">
            <a href="{{ route('checkout.index', $products->id) }}">
                <button
                    class="bg-sky-500 hover:bg-sky-700  my-4 inline-flex rounded-md border border-transparent px-4 py-2 text-base font-bold text-white shadow-sm"
                    style="margin-bottom: 15px;">
                    Join
                </button>
            </a>
        </div>
    </div>

    @endforeach
</div>
