@php
    $bg = $type === 'success' ? 'bg-green-50 border-green-500 text-green-800' : 'bg-red-50 border-red-500 text-red-800';
@endphp

<div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
    class="{{ $bg }} border-l-4 px-4 py-3 rounded-lg mb-4 flex items-start justify-between shadow-sm">
    <p class="font-medium">{{ $message }}</p>
    <button @click="show = false" class="ml-4 text-current hover:opacity-70">
        ✕
    </button>
</div>
