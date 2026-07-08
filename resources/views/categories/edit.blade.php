<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category - Zulacart Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Simple Admin Header -->
    <nav class="bg-white shadow mb-8">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-indigo-600">Zulacart Admin</h1>
            <a href="/categories" class="text-gray-600 hover:text-indigo-600">← Back to Categories</a>
        </div>
    </nav>

    <div class="max-w-3xl mx-auto px-6">
        
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit Category: {{ $category->name }}</h2>

        <!-- The Form -->
        <div class="bg-white rounded-xl shadow p-8">
            <!-- Notice the action includes the category ID, and method is POST -->
            <form action="/categories/{{ $category->id }}" method="POST">
                
                @csrf
                <!-- This tells Laravel we are actually doing a PUT (Update) request -->
                @method('PUT')

                <!-- Category Name -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Category Name</label>
                    <!-- We use old() first, then fallback to the existing $category data -->
                    <input type="text" name="name" value="{{ old('name', $category->name) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Slug (URL friendly)</label>
                    <input type="text" name="slug" value="{{ old('slug', $category->slug) }}"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('slug')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" rows="4"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('description', $category->description) }}</textarea>
                </div>

                <!-- Is Active Checkbox -->
                <div class="mb-8 flex items-center">
                    <!-- We check if it was old, or if the category is currently active -->
                    <input type="checkbox" name="is_active" id="is_active" value="1" 
                           {{ old('is_active', $category->is_active) ? 'checked' : '' }}
                           class="w-5 h-5 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                    <label for="is_active" class="ml-3 text-sm font-medium text-gray-700">Active (Visible on website)</label>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition">
                    Update Category
                </button>

            </form>
        </div>
    </div>

</body>
</html>