
<x-layout>
    <x-slot:heading>
        Add a game
    </x-slot:heading>
        <div class="h-screen">
            <form method="POST" action="/products" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Add a new Game</h2>
                        <p class="mt-1 text-sm leading-6 dark:text-custom-dark-text">What's new in gaming today?</p>

                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <x-form-field>
                                <x-form-lable for="name" class="dark:text-custom-dark-text">Name</x-form-lable>
                                <div class="mt-2">
                                    <x-form-input name="name" id="name" placeholder="Mortal Kombat 11" :value="old('name')" required/>

                                    <x-form-error name="name"/>
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-lable for="description" class="dark:text-custom-dark-text">Description</x-form-lable>
                                <div class="mt-2">
                                    <x-form-input name="description" id="description" placeholder="Some relevant information about your listing game..." :value="old('description')" required/>

                                    <x-form-error name="description"/>
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-lable for="price" class="dark:text-custom-dark-text">Price</x-form-lable>
                                <div class="mt-2">
                                    <x-form-input name="price" id="price" placeholder="30.99" :value="old('price')" required/>

                                    <x-form-error name="price"/>
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-lable for="currency" class="dark:text-custom-dark-text">Currency</x-form-lable>
                                <div class="mt-2">
                                    <x-form-input name="currency" id="currency" placeholder="EUR" :value="old('currency')" required/>

                                    <x-form-error name="currency"/>
                                </div>
                            </x-form-field>

                            <x-form-field>
                                <x-form-lable for="stock" class="dark:text-custom-dark-text">Stock</x-form-lable>
                                <div class="mt-2">
                                    <x-form-input name="stock" id="stock" placeholder="10" :value="old('stock')" required/>
                                    <x-form-error name="stock"/>
                                </div>
                            </x-form-field>
                        </div>

                        <div class="mt-10">
                            <x-form-lable for="image" class="dark:text-custom-dark-text">Upload an Image</x-form-lable>
                            <x-form-input type="file" name="image" id="image" required/>
                            <x-form-error name="image"/>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/" type="button" class="text-sm font-semibold leading-6 text-custom-dark-button">Cancel</a>
                    <x-form-button>Save</x-form-button>
                </div>
            </form>
        </div>
</x-layout>
