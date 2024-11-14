<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __( $timeline->name ) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @auth
                    Edit <button>fff</button>
                    @endauth

                    <!-- Timeline show section -->
                    <div class="w-[300px] h-[200px] overflow-x-auto border border-gray-300 rounded-lg p-2">
                        <!-- Inner content that is wider than the container -->

                        @foreach ($nodes as $node)
                            @include("timeline.partials.node", ["node"=>$node])
                        @endforeach

                        <div class="w-[600px] flex space-x-4">
                            <div class="p-4 bg-blue-200 rounded">Item 1</div>
                            <div class="p-4 bg-green-200 rounded">Item 2</div>
                            <div class="p-4 bg-yellow-200 rounded">Item 3</div>
                            <div class="p-4 bg-red-200 rounded">Item 4</div>
                            <div class="p-4 bg-purple-200 rounded">Item 5</div>
                        </div>
                        <div>
                            smth
                        </div>
                    </div>

                    <!-- Comments to this timeline section -->

                    <div>
                        <h2>
                            Comments
                        </h2>

                        <!-- Add comment to this timeline section -->
                        @auth
                        Add comment
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
