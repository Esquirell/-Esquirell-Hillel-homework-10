<p>Sum - {{$cost->sum}} UAH</p>
<p>Source - for {{$cost->source}}</p>
<p>Comment - {{$cost->comment}}</p>
<p>Category - {{$categoryName[($cost->category_id) - 1]}}</p>
<a href="{{route('costs.index')}}">Back</a>
