<form action="{{route('profits.index')}}" method="get">
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
    @foreach($profits as $profit)
        <li>
            <a href="{{route('profits.show', ['profit' => $profit->id])}}">{{$profit->sum}} гривен отправлено в {{$profit->source}}. Категория - {{$profit->category_id}}</a>
            <a href="{{route('profits.edit', ['profit' => $profit->id])}}">Редактировать</a>
            <form method="post" action="{{route('profits.destroy', ['profit' => $profit->id])}}">
                @csrf
                @method('delete')
                <button type="submit">X</button>
            </form>
        </li>
    @endforeach
    <p><a href="{{route('profits.create')}}">Добавить новый доход</a></p>
    <p><a href="{{route('home')}}">Домой</a></p>
</ul>




