<span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger"
      style="{{ $unreadNotifications == 0 ? 'visibility: hidden;' : 'color: #ffffff; font-size: 1.5rem;' }}"
      wire:poll.800ms>
    <span class="notification-badge" data-bs-count="{{ $unreadNotifications }}">{{ $unreadNotifications }}</span>
    <span class="visually-hidden" style="color: #ffffff;">unread messages</span>
</span>

