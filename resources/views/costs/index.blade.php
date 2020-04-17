<form action="{{route('costs.index')}}" method="get">
    @csrf
    <select name="tar">
        <option value="0">All</option>
        @foreach ($categories as $category)
            @if ($request->get('tar') == $category->id)
                <option selected value="{{$category->id}}">{{$category->name}}</option>
            @else
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endif

        @endforeach
    </select>
    <input type="submit" value="Показать выбранные">
</form>




<ul>
    @foreach($costs as $cost)
        <li>
            <a href="{{route('costs.show', ['cost' => $cost->id])}}">{{$cost->sum}} гривен отправлено в {{$cost->source}}. Категория - {{$cost->category->name}}</a>
            <a href="{{route('costs.edit', ['cost' => $cost->id])}}">Редактировать</a>
            <form method="post" action="{{route('costs.destroy', ['cost' => $cost->id])}}">
                @csrf
                @method('delete')
                <button type="submit">X</button>
            </form>
        </li>
    @endforeach
    <p><a href="{{route('costs.create')}}">Добавить новый расход</a></p>
    <p><a href="{{route('home')}}">Домой</a></p>
</ul>
