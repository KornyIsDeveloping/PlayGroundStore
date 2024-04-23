@if($searchw
    <ul>
        @foreach($searchResults as $product)
            <li>{{ $product->name }}</li>
        @endforeach
    </ul>
@endif
wer
