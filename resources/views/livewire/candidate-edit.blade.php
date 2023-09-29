<form action="{{ route('candidate-update', ['candidate' => $candidate->id]) }}" class="relative mt-6 flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md" method="POST">
    @csrf
    @method('PUT')
    <div class="p-6">
            <div>
                <label for="name">
                    <input name="name" id="name" type="text" class="mb-2 inline font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased border-2 rounded-md" value="{{ $candidate->name }}"/>
                </label>
            </div>

            <label for="email">
                <input type="email" name="email" id="email" class="block font-sans text-base font-light leading-relaxed text-inherit antialiased border-2 rounded-md" value="{{ $candidate->email }}"/>
            </label>
    </div>
    <div class="p-6 pt-0 grid grid-cols-2 gap-x-16">
        <div
            class="!font-medium !text-blue-gray-900 !transition-colors hover:!text-red-500 "
        >
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-yellow-500 transition-all hover:bg-yellow-500/10 active:bg-yellow-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="submit"
                data-ripple-dark="true"
            >
                    Salvar
            </button>
        </div>
    </div>
</form>
