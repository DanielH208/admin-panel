@if (session()->has("success"))
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="absolute bg-blue-500 text-white rounded-xl  text-sm">
        <p>{{ session("success") }}</p>
    </div>
@endif
