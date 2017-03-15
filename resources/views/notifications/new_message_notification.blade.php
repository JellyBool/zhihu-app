<li class="notifications {{ $notification->unread ? 'unread' : ' ' }}">
    <a href="/inbox/{{ $notification->data['dialog'] }}">
        {{ $notification->data['name'] }} 给你发了一条私信
    </a>
</li>