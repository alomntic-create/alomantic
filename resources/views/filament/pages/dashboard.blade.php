
<x-filament-panels::page>
    <h1 class="text-2xl font-bold text-primary">مرحباً بك      </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <div class="p-4 bg-white rounded-xl shadow">
            <h2 class="text-sm font-medium text-gray-500">عدد الرسائل</h2>
            <p class="text-2xl font-bold">{{ \App\Models\Message::count() }}</p>
            <p class="text-xs text-gray-400">إجمالي الرسائل من العملاء</p>
        </div>

        <div class="p-4 bg-white rounded-xl shadow">
            <h2 class="text-sm font-medium text-gray-500">المنتجات</h2>
            <p class="text-2xl font-bold">{{ \App\Models\Product::count() }}</p>
        </div>

        <div class="p-4 bg-white rounded-xl shadow">
            <h2 class="text-sm font-medium text-gray-500">المستخدمين</h2>
            <p class="text-2xl font-bold">{{ \App\Models\User::count() }}</p>
        </div>
    </div>
</x-filament-panels::page>
