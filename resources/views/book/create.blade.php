@extends('layout.base')
@section('title')
    Add Book
@endsection
@section('content')
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <section class="bg-white dark:bg-gray-900">
                <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Book</h2>
                    <form action="{{ route('book.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Title</label>
                                <input type="text" name="title" id="title"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Book's title" required="">
                            </div>
                            <div class="w-full">
                                <label for="author"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                                <input type="text" name="author" id="author"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Author" required="">
                            </div>
                            <div class="w-full">
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select name="category" id="category"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option value="">Pilih Category</option>
                                        @foreach($category as $category )
                                            <option value="{{ $category->id }}">{{ $category->nama }}</option>
                                        @endforeach
                                    </select>

                            </div>
                            <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                                Save
                            </button>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
