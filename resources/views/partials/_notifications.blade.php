@foreach(auth()->user()->notifications as $notification)
    <form id="mark-as-read-{{ $notification->id }}" action="{{ route('markAsRead', ['id' => $notification->id]) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="notification-form border-b px-4 py-2 hover:bg-gray-100 max-w-xl overflow-hidden">
            <button type="submit" class="notification-link flex items-center space-x-4" >
                <div class="drop_avatar">
                    <img src="images/avatars/avatar-2.jpg" alt="" class="rounded-full" width="80px">
                </div>
                <div class="drop_text max-w-xs text-sm text-left mx-2">
                    <p class="{{ $notification->read_at ? '' : 'text-blue-500' }} font-semibold">
                        <strong class="text-sm">{{ $notification->data['sender_name'] }}</strong> {{ $notification->data['message'] }}
                    </p>
                    <time class="text-gray-500">{{ $notification->created_at->diffForHumans() }}</time>
                </div>
            </button>
        </div>
    </form>
@endforeach
