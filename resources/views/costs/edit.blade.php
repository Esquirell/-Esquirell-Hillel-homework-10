<form action="{{route('costs.update', ['cost' => $cost->id])}}" method="post">
    @csrf
    @method('patch')
    <input type="text" name="sum" value="{{$cost->sum}}">
    <input type="text" name="source" value="{{$cost->source}}">
    <textarea name="comment">{{$cost->comment}}</textarea>

    <select name="tar">
        @foreach ($categories as $category)
            @if ($cost->category_id == $category->id)
                <option selected value="{{$category->id}}">{{$category->name}}</option>
            @else
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
        @endforeach
    </select>


    <button type="submit">Edit cost</button>
    <p><a href="{{route('costs.index')}}">Back</a></p>
</form>
