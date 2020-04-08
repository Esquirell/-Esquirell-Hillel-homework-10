<p>Sum - {{$profit->sum}} UAH</p>
<p>Source - from {{$profit->source}}</p>
<p>Comment - {{$profit->comment}}</p>
<p>Category - {{$categoryName[($profit->category_id) - 1]}}</p>
<a href="{{route('profits.index')}}">Back</a>
