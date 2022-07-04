<div class="m-4">
<div class="flex items-center justify-end px-4 py-3 sm:px-6">
            <x-jet-button wire:click="createShowModal">
                {{ __('Create') }}
            </x-jet-button>
            {{--Modal Form--}}
</div>
        <!-- Create Customers Confirmation Modal -->
        <x-jet-dialog-modal wire:model="modalFormVisible">
            <x-slot name="title" >
                <div class="uppercase">{{ __('create a new customer') }}</div>
            </x-slot>
            <x-slot name="content">
              <x-jet-validation-errors class="mb-4" />
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('NAME') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.lazy="name"
                    :value="old('name')" placeholder="Enter Customer Name" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('PHONE NUMBER') }}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" wire:model.lazy="phone"
                    :value="old('name')" placeholder="Enter The Customer Phone Number" required autofocus />
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

        <!-- Retrive All Customers -->
    
    
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50 text-xs text-left loading-4 font-medium text-gray-500 uppercase tracking-wider">Name</th>
                <th class="px-4 py-6 bg-gray-50 text-xs text-left loading-4 font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                <th class="px-4 py-6 bg-gray-50 text-xs text-left loading-4 font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="min-w-full divide-y divide-gray-200">
          
            @forelse($customers as $customer)
                <tr>
                    <td class="px-6 py-3 text-sm whitespace-no-warp">{{$customer->name}}</td>
                    <td class="px-6 py-3 text-xm whitespace-no-warp">{{$customer->phone}}</td>
                    <td class="px-6 py-3 text-sm whitespace-no-warp">
                       <x-jet-button class="ml-2" wire:click="edit({{$customer->id}})" wire:loading.attr="disabled">
                       {{ __('edit') }}
                       </x-jet-button>
                       <x-jet-danger-button class="ml-2" wire:click="deleteShowModal({{$customer->id}})" wire:loading.attr="disabled">
                       {{ __('delete') }}
                       </x-jet-danger-button>
                    
                    </td>
                </tr>
                @empty
                <tr>
                <td class="px-6 py-3 text-sm whitespace-no-warp" colspan="4">No Customers Yet</td>
                </tr>
            @endforelse
       
                
       
        </tbody>
    </table>
    
     
      
    <!-- Update Customers Confirmation Modal updateShowModal-->
    <x-jet-dialog-modal wire:model="updateShowModal">
            <x-slot name="title">
                {{ __('Update') }}
            </x-slot>
            <x-slot name="content">
              <x-jet-validation-errors class="mb-4" />
            
                <div class="mt-4">
                    <x-jet-label for="name" value="{{ __('NAME') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name"
                    :value="old('name')" placeholder="Enter Customer Name" required autofocus />
                </div>
                <div class="mt-4">
                    <x-jet-label for="phone" value="{{ __('PHONE NUMBER') }}" />
                    <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" wire:model="phone"
                    :value="old('email')" placeholder="Enter The Customer Phone Number" required autofocus />
               </div>
            </x-slot>
            <x-slot name="footer">
                <x-jet-secondary-button wire:click.preivent="cancel()" wire:loading.attr="disabled" data-dismiss="modal">
                    {{ __('cancel') }}
                </x-jet-secondary-button>

    
                <x-jet-button class="ml-2" wire:click="update" wire:loading.attr="disabled">
                    {{ __('Update') }}
                </x-jet-danger-button>
            
               
            </x-slot>
        </x-jet-dialog-modal>
 

 <!-- deletion Customers Confirmation Modal updateShowModal-->
        <x-jet-dialog-modal wire:model="modalconfirmingDeletion">
                <x-slot name="title">
                    {{ __('Delete customer') }}
                </x-slot>
                <x-slot name="content">
                    {{ __('Are you sure you want to delete your customer?') }}
                </x-slot>

                <x-slot name="footer">
                    <x-jet-secondary-button wire:click="cancel()" wire:loading.attr="disabled">
                        {{ __('cancel') }}
                    </x-jet-secondary-button>

                    <x-jet-danger-button class="ml-2" wire:click="delet()">
                        {{ __('Delete customer') }}
                    </x-jet-danger-button>
                </x-slot>
            </x-jet-dialog-modal>
</div>
