<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ request()->routeIs('notes.index')? __('Notes') : __('Trash') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <x-alert-success>
                {{ session('success') }}
            </x-alert-success>
            
            @if(request()->routeIs('notes.index'))
                <a class="btn-link btn-lg mb-2" href="{{ route('notes.create') }}">+ New Note</a>
            @endif

            @forelse ($notes as $note )
                <div class="my-6 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">
                    <h2 class="font-bold text-2xl">
                        <a 
                        @if(request()->routeIs('trashed.index'))
                            href="{{ route('trashed.show', $note) }}"
                        @else
                            href="{{ route('notes.show', $note) }}"
                        @endif

                        >{{ $note->title }}</a>
                    </h2>
                    <p class="mt-2">
                        {{ Str::limit($note->text, 200) }}
                    </p>
                    <span class="block mt-4 text-sm opacity-70">{{ $note->updated_at->diffForHumans() }}</span>
                </div>
            @empty
            @if(request()->routeIs('notes.index'))
                <div class="p-5 w-full bg-white rounded-lg border border-gray-200 shadow-md ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">You have no notes yet.</h5>
                    
                </div>
            @else
                <div class="p-5 w-full bg-white rounded-lg border border-gray-200 shadow-md ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">No items in trash</h5>
                    
                </div>
            @endif
            @endforelse
            <!--dit toont de paginate()-->
            {{ $notes->links() }}
        </div>
    </div>
</x-app-layout>
