<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $updateProduct ? __('Update Product') : __('Create Product') }}
        </h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-4 sm:p-6">

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4 space-y-2 sm:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-800">Product List</h3>
                    <a href="{{ route('products.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        + Add Product
                    </a>
                </div>

                <form method="POST" action="{{ $updateProduct ? route('products.update', $updateProduct->id) : route('products.store') }}" class="space-y-4">
                    @csrf

                    @if($updateProduct)
                        @method('PUT')
                    @endif

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input type="text" name="name" id="name"
                               value="{{ $updateProduct ? $updateProduct->name : old('name') }}"
                               class="error mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500  @error('name') border-red-500 @enderror">

                        @error('name')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="4"
                                  class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500  @error('name') border-red-500 @enderror">
                            {{ $updateProduct ? $updateProduct->description : old('description') }}
                        </textarea>

                        @error('description')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price" step="0.01"
                                 value="{{ $updateProduct ? $updateProduct->price : old('price') }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500  @error('name') border-red-500 @enderror">

                        @error('price')
                            <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="available" {{ optional($updateProduct)->status === 'available' ? 'selected' : '' }}>Available</option>
                            <option value="out_of_stock" {{ optional($updateProduct)->status === 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>

                        </select>
                    </div>

                    <br>
                   <div class="flex justify-center items-center space-x-4">
                       <a href="{{ route('products') }}">
                           <button type="button"
                                   class="items-center px-4 py-2 bg-slate-400 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                               Cancel
                           </button>
                       </a>

                       <button type="submit"
                               class="items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                           {{ $updateProduct ? 'Update' : 'Create' }}
                       </button>
                   </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
