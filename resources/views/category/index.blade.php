@extends('layout.base')
@section('title')
    Category Page
@endsection
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">

            <h1 class="text-5xl font-extrabold dark:text-gray">
                Category Table
            </h1>
            <div class="container mx-auto my-8 p-4 bg-white dark:bg-gray-900 shadow-lg rounded-lg">
                <div class="overflow-x-auto">
                    <div class="mb-4">
                        <a href="{{ route('category.create') }}" class="btn btn-secondary text-white">+ Add Category</a>
                    </div>
                    <table class="min-w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-800 dark:text-gray-300">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Name
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr
                                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $loop->iteration }} </th>
                                    <td class="px-6 py-4">
                                        {{ $category->nama }}
                                    </td>
                                    <td class="px-6 py-4 d-flex">
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post"
                                            onsubmit="return confirm('Yakin ingin menghapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <a class="btn btn-warning btn-sm" href="{{ route('category.edit', $category->id) }}"
                                            role="button">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
@endsection
