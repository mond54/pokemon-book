<div id="pokemon_block">
    <div class="wrap-inner">
        <ul class="poke_list flexlist">
            {{-- @foreach ($pokemons as $pokemon) --}}
                <li class="item">
                    No.{{ $pokemon->id }}
                    {{ $pokemon->jp_name }}
                    <div class="imgarea">
                        <img src="{{ $pokemon->front_default }}" alt="">
                    </div>
                </li>
            {{-- @endforeach --}}
        </ul>
    </div>
</div>
