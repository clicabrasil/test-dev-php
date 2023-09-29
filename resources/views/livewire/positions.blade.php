<div class="text-bold grid grid-cols-1 gap-4 place-items-center">

    <button>
        <a href="{{ route('home') }}" cl>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                <path d="M 12 2.0996094 L 1 12 L 4 12 L 4 21 L 11 21 L 11 15 L 13 15 L 13 21 L 20 21 L 20 12 L 23 12 L 12 2.0996094 z M 12 4.7910156 L 18 10.191406 L 18 11 L 18 19 L 15 19 L 15 13 L 9 13 L 9 19 L 6 19 L 6 10.191406 L 12 4.7910156 z"></path>
            </svg>
        </a>
    </button>

    <div class="grid grid-cols-4 max-w-3xl">
        <label for="type" class="hidden"></label>
        <select x-on:change="location.reload()" x-data="{ inputValue: '' }" x-on:input="inputValue = $event.target.value; updateQueryParam('column', inputValue)" wire:model.live="column" name="type" id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value="name">Nome</option>
            <option value="description">Descrição</option>
            <option value="company">Empresa</option>
            <option value="type">Tipo</option>
        </select>


        <form class="mx-3">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <label for="default-search"></label><input autofocus x-data="{ inputValue: '' }" x-on:input="inputValue = $event.target.value; updateQueryParam('query', inputValue)" wire:model.live="query" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
        </form>

        <button
            @click="toggleDirection()"
            type="button"
            class="px-4 py-3 bg-blue-600 rounded-md text-white outline-none focus:ring-4 shadow-lg transform active:scale-75 transition-transform w-14"
            wire:click="toggleDirection"
        >
            <script>
                function toggleDirection() {
                    const urlSearchParams = new URLSearchParams(window.location.search)
                    const direction = urlSearchParams.get('sortDirection')
                    if (direction === 'asc') {
                        urlSearchParams.set('sortDirection', 'desc')
                    } else {
                        urlSearchParams.set('sortDirection', 'asc')
                    }
                    window.history.replaceState({}, '', `${window.location.pathname}?${urlSearchParams.toString()}`)
                    location.reload()
                }
            </script>
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
            </svg>

        </button>

    </div>



    <div class="grid grid-cols-2 gap-0 max-w-2xl">
        <label for="quantity" class="text-right mx-3 text-white">Itens por página:</label>
        <script>
            function updateQueryParam(key, value) {
                const urlSearchParams = new URLSearchParams(window.location.search)
                urlSearchParams.set(key, value)
                window.history.replaceState({}, '', `${window.location.pathname}?${urlSearchParams.toString()}`)
                location.reload()
            }
        </script>
        <input x-on:change="location.reload()" x-data="{ inputValue: '' }" x-on:input="inputValue = $event.target.value; updateQueryParam('perPage', inputValue)" wire:model.live="perPage" type="number" id="quantity" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    </div>

@if(auth()->user()->admin)
        <div class="grid grid-cols-2">
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-dark="true"
                wire:click="deleteAll"
            >
                Excluir todos
            </button>
            <a href="{{ route('create-position') }}">
            <button
                class="flex select-none items-center gap-2 rounded-lg py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-blue-400 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-dark="true"
            >
                Criar
            </button>
            </a>
        </div>
    @endif
        @foreach($positions as $position)
            <div wire:key="{{ $position->id }}" class="text-white text-bold">
                <livewire:position :position="$position" />
            </div>
        @endforeach
    {{ $positions->appends(request()->input())->links() }}
</div>
