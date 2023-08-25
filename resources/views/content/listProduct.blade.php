@extends('index')
@section('content')
    <div class="relative overflow-x-auto">
        <a href="{{ url('/add-product') }}"><button class="bg-blue-500 rounded-lg text-white p-2 mb-5">Tambah
                product</button></a>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Jumlah
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Harga Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($data)
                    @foreach ($data as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_produk }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->jumlah }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->harga_total }}
                            </td>
                            <td class="px-6 py-4 flex gap-4">
                                <a href="{{ url('edit-product/' . $item->id) }}"><button
                                        class="bg-yellow-500 text-white rounded-lg p-2">Update</button></a>
                                <a href="{{ url('delete-product/' . $item->id) }}"><button
                                        class="bg-red-500 text-white rounded-lg p-2">Delete</button></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td colspan="100%" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Data belum tersedia
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
