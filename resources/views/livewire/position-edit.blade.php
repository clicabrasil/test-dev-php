<form action="{{ route('position-update', ['position' => $position->id]) }}" class="relative mt-6 flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md" method="POST">
    @csrf
    @method('PUT')
    <div class="p-6">
        <div>
            <label for="name">
                <input name="name" id="name" type="text" class="mb-2 inline font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased" value="{{ $position->name }}"/>
            </label>
            <label for="company">
                <input name="company" id="company"  class="mb-2 inline font-sans text-lg font-semibold leading-snug tracking-normal text-gray-500 antialiased" value="{{ $position->company }}"/>
            </label>
        </div>

        <label for="description">
            <input name="description" id="description" class="block font-sans text-base font-light leading-relaxed text-inherit antialiased" value="{{ $position->description }}"/>
        </label>
    </div>
    <div class="p-6 pt-0 grid grid-cols-2 gap-x-16">
        <label for="type" class="hidden"></label>
        <select name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
            <option>Modalidade</option>
            <option {{ $position->type == 'pj' ? 'selected' : '' }} value="pj">PJ</option>
            <option {{ $position->type == 'clt' ? 'selected' : '' }} value="clt">CLT</option>
            <option {{ $position->type == 'freelancer' ? 'selected' : '' }} value="freelancer">Freelance</option>
        </select>
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
