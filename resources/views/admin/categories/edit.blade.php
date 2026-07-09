<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - Zulacart Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 ml-64">

    @include('partials.admin-navbar')
    <main class="p-8">
    <div class="max-w-3xl mx-auto px-6">
        
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Category: {{ $category->name }}</h2>

        <div class="bg-white rounded-xl shadow p-8">
            <!-- FIXED: Added /admin to the action URL -->
            <form action="/admin/categories/{{ $category->id }}" method="POST">
                
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL friendly)</label>
                    <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('slug') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $category->description) }}</textarea>
                </div>

                <div class="mb-8 flex items-center">
                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                           {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-700">Active (Visible on website)</label>
                </div>

                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                    Update Category
                </button>

            </form>
        </div>
    </div>
    </main>

</body>
</html>