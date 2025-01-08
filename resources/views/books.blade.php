<ul>
    <li>Book A</li>
    <li>Description A</li>

    <li>Book B</li>
    <li>Description B</li>

    @foreach($books as $book)
        <li>{{ $book->title }}</li>
        <li>{{ $book->description }}</li>
    @endforeach
</ul>
