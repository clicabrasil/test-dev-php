<div class="relative mt-6 flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
    <div class="p-6">
        <div>
            <h5 class="mb-2 inline font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                {{ $candidate->name }}
            </h5>
        </div>

        <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
            {{ $candidate->email }}
        </p>
    </div>
    <div class="p-6 pt-0 grid grid-cols-2 gap-x-16">
        <a
            class="!font-medium !text-blue-gray-900 !transition-colors hover:!text-red-500"
            href="#"
        >
            @if(\Illuminate\Support\Facades\Route::getCurrentRoute()->getName() == 'candidate')
                <a href="{{ route('candidate-edit', ['candidate' => $candidate->id]) }}">
                <button
                    class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-yellow-500 transition-all hover:bg-yellow-500/10 active:bg-yellow-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button"
                    data-ripple-dark="true"
                >

                        Editar
                </button>
                </a>
            @else
                <button
                    class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button"
                    data-ripple-dark="true"
                    wire:click="delete({{ $candidate->id }})"
                >
                    Excluir
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                        class="h-4 w-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                        ></path>
                    </svg>
                </button>
            @endif
        </a>
    </div>
</div>
