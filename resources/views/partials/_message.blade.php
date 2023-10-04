<!-- resources/views/partials/message.blade.php -->

@if (session()->has('success'))
    <div class="bg-green-500 text-center w-100 text-white px-4 py-2 rounded-md" style="width: 30%;">
        {{ session('success') }}
    </div>
@elseif(session()->has('info'))
    <div class="bg-blue-400 text-center w-100 text-white px-4 py-2 rounded-md" style="width: 30%;">
        {{ session('info') }}
    </div>
@endif
