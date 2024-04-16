<x-layout>
    <x-slot:heading>
        Add a game
    </x-slot:heading>
    <form method="POST" action="/products">
        @csrf
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-base font-semibold leading-7 text-gray-900">Add a new Game</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">What's new in gaming today?</p>

                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-lable for="name">Name</x-form-lable>
                        <div class="mt-2">
                        <x-form-input name="name" id="name" placeholder="Mortal Kombat 11" required/>

                        <x-form-error name="name"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="description">Description</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="description" id="description" placeholder="Some relevant information about your listing game..." required/>

                            <x-form-error name="description"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="price">Price</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="price" id="price" placeholder="30.99" required/>

                            <x-form-error name="price"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="currency">Currency</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="currency" id="currency" placeholder="EUR/USD/RON" required/>

                            <x-form-error name="currency"/>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-lable for="stock">Stock</x-form-lable>
                        <div class="mt-2">
                            <x-form-input name="stock" id="stock" placeholder="10" required/>

                            <x-form-error name="stock"/>
                        </div>
                    </x-form-field>

                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>

