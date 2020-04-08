<form action="{{route('profits.update', ['profit' => $profit->id])}}" method="post">
    @csrf
    @method('patch')
    <input type="text" name="sum" value="{{$profit->sum}}">
    <input type="text" name="source" value="{{$profit->source}}">
    <textarea name="comment">{{$profit->comment}}</textarea>

    <select name="tar">
        @foreach ($categories as $category)
            @if ($profit->category_id == $category->id)
                <option selected value="{{$category->id}}">{{$category->name}}</option>
            @else
                 <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
        @endforeach
    </select>

    <button type="submit">Edit profit</button>
    <p><a href="{{route('profits.index')}}">Back</a></p>
</form>

