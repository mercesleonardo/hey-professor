<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Vote for a question') }}
        </x-header>
    </x-slot>

    <x-container>
        <div class="dark:text-gray-400 space-y-4">

            <form action="{{ route('dashboard') }}" method="get" class="flex items-center space-x-2">
                @csrf
                <x-text-input type="text" name="search" value="{{ request()->search }}" class="w-full" placeholder="Search Questions..."/>
                <x-btn.primary type="submit">Search</x-btn.primary>
            </form>

            @if( $questions->isEmpty())
                <div class="dark:text-gray-500 text-center flex flex-col justify-center">

                    <div class="justify-center flex">
                        <x-draw.searching width="300" />
                    </div>

                    <div class="mt-6 dark:text-gray-400 font-bold text-2xl">
                        Question not found
                    </div>
                </div>
            @else
                @foreach ( $questions as $item )
                    <x-question :question="$item" />
                @endforeach

                {{ $questions->withQueryString()->links() }}
            @endif
        </div>
    </x-container>
</x-app-layout>
