

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
                <a href="/" type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>

