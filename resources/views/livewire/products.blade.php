<div class="m-4">
<div class="flex items-center justify-end px-4 py-3 sm:px-6">
            <x-jet-button wire:click="createShowModal">
                {{ __('create') }}
            </x-jet-button>
            {{--Modal Form--}}
</div>
<x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title" >
                <div class="uppercase">{{ __('create a new product') }}</div>
            </x-slot>
            <x-slot name="content">
              <x-jet-validation-errors class="mb-4" />
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('Product Name') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="name"
                    :value="old('name')" placeholder="Enter Product  Name" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label for="price" value="{{ __('Price') }}" />
                    <x-jet-input id="price" class="block mt-1 w-full" type="text" name="price" wire:model.lazy="price"
                    :value="old('name')" placeholder="Enter Product price" required autofocus />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                    {{ __('cancel') }}
                </x-jet-secondary-button>

                <x-jet-button class="ml-2" wire:click="create" wire:loading.attr="disabled">
                    {{ __('save') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>

   @foreach($products as $product)
   <div class="max-w-md mx-auto  bg-gray-200 rounded-xl shadow-md overflow-hidden md:max-w-2xl my-4">
            <div class="p-8 grid grid-cols-2">
            <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold"><a href="products/{{$product->id}}">{{$product->name}}</a></div>
            <div class="rounded-full border border-solid border-orange-600 flex items-center bg-orange-400 text-white justify-center hover:bg-orange-500 hover:text-white">Price {{$product->price}}<span class="text-indigo-500 ml-2">SDG</span></div>
            </div>
    </div>
   
   @endforeach
   
{{$products->links()}}

</div>

