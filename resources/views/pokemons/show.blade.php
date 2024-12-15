<x-home>
    <div>
        <div>
            <h1>No. {{ $pokemon['id'] }} {{ $pokemon['en_name'] }}</h1>
            <p>
                Type:
                {{ isset($pokemon->type1) ? $pokemon->type1 : 'タイプ情報なし' }}
                @if($pokemon->type2) / {{ $pokemon->type2 }}@endif
            </p>
            <img src="{{ $pokemon['front_default'] }}" alt="">
        </div>
        <div></div>
    </div>
</x-home>
