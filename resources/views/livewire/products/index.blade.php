@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
@endpush

<div class="space-y-4">
    <x-slot:title>Products</x-slot:title>

    {{-- Add Modal --}}
    <div x-cloak x-data="{ open: false }">
        <div class="flex justify-end">
            <button
                class="rounded-full bg-[#8E5AF6] px-4 py-2 font-semibold text-white transition duration-300 hover:bg-[#6c4cc1] focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]"
                @click="open = true">Add product</button>
        </div>

        <div x-cloak x-show="open" x-transition.opacity class="fixed inset-0 z-40 bg-slate-900/40"></div>

        <div x-cloak x-show="open" x-transition.scale x-transition.duration.300ms
            class="fixed inset-0 z-50 flex items-center justify-center">
            <div
                class="mx-auto h-auto w-10/12 overflow-hidden overflow-y-auto rounded-xl bg-white p-8 lg:w-screen lg:max-w-4xl">
                <div class="flex justify-between">

                    <h1 class="mb-8 text-xl font-bold lg:text-2xl">Add Product</h1>
                    <span @click="open = false" class="mdi mdi-close text-warning-1 cursor-pointer font-bold"
                        title="Close"></span>
                </div>

                <form wire:submit.prevent="store">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-2">
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name</label>
                            <input type="text" id="name" name="name" wire:model.defer="name"
                                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]"
                                placeholder="Enter the product name" required>
                            @error('name')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                            <select id="category" name="category" wire:model.defer="category"
                                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 pl-0 focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]"
                                required>
                                <option value="">Select a category</option>
                                <option value="A La Carte">A La Carte</option>
                                <option value="Cakes and Cupcakes">Cakes and Cupcakes</option>
                                <option value="Pies and Tarts">Pies and Tarts</option>
                                <option value="Breads">Breads</option>
                                <option value="Sides">Sides</option>
                                <option value="Desserts">Desserts</option>
                                <option value="Teas">Teas</option>
                            </select>
                            @error('category')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Product Price</label>
                            <input type="text" id="price" name="price" wire:model.defer="price"
                                class="mt-2 w-full rounded-lg border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]"
                                placeholder="Enter the price" required>
                            @error('price')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                            class="rounded-full bg-[#8E5AF6] px-4 py-2 font-semibold text-white transition duration-300 hover:bg-[#6c4cc1] focus:outline-none focus:ring-2 focus:ring-[#8E5AF6]">
                            Add
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="rounded-2xl bg-gray-100 p-4">
        <table id="productsTable" class="display">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

        <script>
            let productsTable;

            productsTable = $('#productsTable').DataTable({
                responsive: true,
                ajax: {
                    url: "{{ route('products.list') }}",
                    dataSrc: ''
                },
                "order": [
                    [0, 'desc']
                ],
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'category'
                    },
                    {
                        data: 'price'
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `<div>
                                <button class="rounded-full font-semibold text-primary-1 px-4 py-2 mb-2" onclick="updateClient(${data.id}, '${data.name}', '${data.tier}', '${data.date_of_membership}', '${data.email}', '${data.contact_number}')">UPDATE</button>
                                <button class="rounded-full font-semibold !text-[#d1222a] !bg-[#ffdad6] px-4 py-2 mb-2" onclick="deleteClient(${data.id})">DELETE</button>
                            </div>`;
                        }
                    },
                ]
            });

            window.addEventListener('success', event => {
                Swal.fire({
                    title: "Success",
                    text: event.detail.message,
                    icon: "success"
                });

                productsTable.ajax.reload();
            });
        </script>
    @endpush
</div>
