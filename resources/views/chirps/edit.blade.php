<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-8">Edit Chirp</h1>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form method="POST" action="/chirps/{{ $chirp->id }}">
                    @csrf
                    @method('PUT')

                    <div class="form-control">
                        <textarea
                            name="message"
                            class="textarea textarea-bordered resize-none @error('message') textarea-error @enderror"
                            rows="3"
                            maxlength="255"
                            required
                        >{{ old('message', $chirp->message) }}</textarea>
                        
                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    <div class="card-actions justify-between mt-4">
                        <a href="/" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">
                            Update Chirp
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>