<form action="{{route('profits.store')}}" method="post">
    @csrf
    <input type="text" name="sum">
    <input type="text" name="source">
    <textarea name="comment"></textarea>
    <select name="tar">
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <button type="submit">Add profit</button>
</form>
