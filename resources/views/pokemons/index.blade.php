<x-home>
    <h1
        class="border border-green-500 rounded-lg shadow-md w-auto max-w-full sm:w-3/4 lg:w-1/5 p-2 m-3 text-center text-4xl break-words">
        PokeDex
    </h1>
    <div class="container p-4 flex flex-wrap justify-center items-center gap-8">
        @foreach ($pokemons as $pokemon)
            <a href="#" class="text-green-500 text-xs pokemon-link" data-pokemon-id="{{ $pokemon['id'] }}">
                No. {{ $pokemon['id'] }} {{ $pokemon['en_name'] }}
                <div>
                    <img src="{{ $pokemon['front_default'] }}" alt="" class="w-full h-auto border border-gray-300 rounded-lg shadow-md bg-white">
                </div>
            </a>
        @endforeach
    </div>
    <div id="pokemonModal"
        class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex justify-center items-center border-green-500">
        <div class="bg-black rounded-lg p-4 w-full max-w-screen-md mx-auto relative">
            <img src="{{ asset('storage/close-icon.svg') }}" id="closeModal"
                class="absolute top-2 right-2 w-6 h-6 cursor-pointer">
            <div id="modalContent"></div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            function openModal(pokemonId) {
                $.ajax({
                    url: '/show/' + pokemonId,
                    method: 'GET',
                    success: function(data) {
                        $('#modalContent').html(data);
                        $('#pokemonModal').removeClass('hidden');
                    },
                    error: function() {
                        alert('ポケモンの情報を取得できませんでした。');
                    }
                });
            }

            $('#closeModal').on('click', function() {
                $('#pokemonModal').addClass('hidden');
            });

            $('.pokemon-link').on('click', function(event) {
                event.preventDefault();
                const pokemonId = $(this).data('pokemon-id');
                openModal(pokemonId);
            });
        });
    </script>
</x-home>
