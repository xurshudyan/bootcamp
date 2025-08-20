@props(['chirp'])


<div class="card bg-base-100 shadow">
    <div class="card-body">
        <div class="flex space-x-3">
            <div class="avatar placeholder">
                <div class="bg-neutral text-neutral-content rounded-full w-10">
                    <span class="text-sm font-semibold">
                        {{ strtoupper(substr($chirp->user->name, 0, 1)) }}
                    </span>
                </div>
            </div>

            <div class="flex-1 min-w-0">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-1">
                        <p class="text-sm font-semibold">
                            {{ $chirp->user->name }}
                        </p>
                        <span class="text-base-content/60">·</span>
                        <p class="text-sm text-base-content/60">
                            {{ $chirp->created_at->diffForHumans() }}
                        </p>
                    </div>

                    @if (auth()->check() && auth()->id() === $chirp->user_id)
                        <!-- Edit/Delete Dropdown -->
                        <div class="dropdown dropdown-end" x-data="{ open: false }">
                            <button @click="open = !open" class="btn btn-ghost btn-sm">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                            </button>

                            <ul x-show="open" @click.away="open = false" x-cloak
                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                                <li>
                                    <a href="/chirps/{{ $chirp->id }}/edit">
                                        Edit
                                    </a>
                                </li>
                                <li>
                                    <form method="POST" action="/chirps/{{ $chirp->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('Are you sure you want to delete this chirp?')"
                                                class="text-error">
                                            Delete
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                <p class="mt-1">
                    {{ $chirp->message }}
                </p>
            </div>
        </div>
    </div>
</div>