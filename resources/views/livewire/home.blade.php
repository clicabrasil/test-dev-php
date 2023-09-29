<div class="text-blue-500 flex justify-center items-center h-screen">
    <div class="grid grid-cols-3 gap-16">
        <a
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500"
            href="{{ route('positions') }}"
        >
            Vagas
        </a>

        <a
            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-12 py-3 text-sm font-medium text-white hover:bg-transparent hover:text-indigo-600 focus:outline-none focus:ring active:text-indigo-500 {{ auth()->user()->admin ? '' : 'pointer-events-none'}}"
            href="{{ route('candidates') }}"
        >
            Candidatos
        </a>
    </div>
</div>
