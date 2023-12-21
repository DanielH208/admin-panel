@if (session()->has("success"))
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="absolute right-20 top-20 bg-blue-500 text-white py-2 px-4 rounded-xl text-sm">
        <p>{{ session("success") }}</p>
    </div>
@endif
