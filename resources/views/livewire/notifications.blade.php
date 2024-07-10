<div class="text-reset notification-item d-block position-relative unread-message" wire:poll.700ms>
    @forelse ($notifications as $notification)
    <div class="d-flex" style="{{ $notification->read_at != null ? 'background-color: #dddddd;' : 'background-color: #lightblue;' }}">
        <li class="d-flex noti-item mx-auto" wire:click="readNotify('{{ $notification->id }}')">
            <span class="ml-2"><i class='bx bx-bell'></i></span>
                <div class="ml-2">
                    {{ json_decode($notification->data, true)['message'] }} <span class="text-danger">Number:#</span>
                    {{ json_decode($notification->data, true)['numberOrder'] }}
                    <br>
                    {{ $notification->created_at->diffForHumans(null, true) . ' ago' }}
                </div>
                @if ($notification->read_at == null)
                    <div class="px-2 fs-15">
                        <div class="form-check notification-check">
                            <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                            <label class="form-check-label" for="all-notification-check01"></label>
                        </div>
                    </div>
                @endif
            </li>
        </div>
        <hr>
    @empty
        <div class="d-flex">
            <div class="flex-grow-1">
                <a href="#!" class="stretched-link">
                    <h6 class="mt-0 fs-14 mb-2 lh-base">{{ trans('home.The beginning of the journey') }}</h6>
                </a>
                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                    <span><i class="mdi mdi-clock-outline"></i>
                        {{ auth()->user()->created_at->diffForHumans() }}</span>
                </p>
            </div>
            <div class="px-2 fs-15">
                <div class="form-check notification-check">
                    <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                    <label class="form-check-label" for="all-notification-check01"></label>
                </div>
            </div>
        </div>
    @endforelse
</div>
