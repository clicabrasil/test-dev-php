<div class="relative mt-6 flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
<div class="p-6">
    <div>
        <h5 class="mb-2 inline font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
            {{ $position->name }}
        </h5>
        <h5 class="mb-2 inline font-sans text-lg font-semibold leading-snug tracking-normal text-gray-500 antialiased">
            Na empresa {{ $position->company }}
        </h5>
    </div>

    <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
        {{ $position->description }}
    </p>
</div>
<div class="p-6 pt-0 grid grid-cols-2 gap-x-16">
    @if(! auth()->user()->admin)
        <a
            class="!font-medium !text-blue-gray-900 !transition-colors hover:!text-pink-500"
            href="#"
        >
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                {{ ($position->active && !auth()->user()->positions()->where('id', $position->id)->exists()) ? '' : 'disabled' }}
                data-ripple-dark="true"
                wire:click="apply({{ $position->id }})"
            >
                Candidatar
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
        </a>
    @else
        <a
            class="!font-medium !text-blue-gray-900 !transition-colors hover:!text-red-500"
            href="#"
        >
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-dark="true"
                wire:click="delete({{ $position->id }})"
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
        </a>

    @endif

    <h6>
        {{ $position->type }}
    </h6>

    @if((! auth()->user()->admin) && auth()->user()->positions()->where('id', $position->id)->exists())
        <h6 class="text-green-700">
            Candidatado
        </h6>

    @endif

    @if(auth()->user()->admin)
        <a
            class="!font-medium !text-cyan-gray-900 !transition-colors hover:!text-cyan-500 inline"
            href="{{ route('position-edit', ['position' => $position->id]) }}"
        >
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-cyan-500 transition-all hover:bg-cyan-500/10 active:bg-cyan-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-dark="true"
            >
                editar
            </button>
        </a>

        <a
            class="!font-medium !text-blue-gray-900 !transition-colors hover:!text-blue-500 inline"
            href="#"
        >
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-blue-500 transition-all hover:bg-blue-500/10 active:bg-blue-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-dark="true"
                wire:click="toggleActive({{ $position->id }})"
            >
                {{ $position->active ? '' : 'des' }}pausar vaga
            </button>
        </a>
    @endif
</div>
</div>
