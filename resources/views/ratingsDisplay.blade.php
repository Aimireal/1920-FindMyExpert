@section('content')
        @foreach($rating as $ratingInstance)
            <div class="display-rating" @if($ratingInstance->parentID != null) style="margin-left: 40px;" @endif>
                <strong>{{$ratingInstance->user->name}}</strong>
                <p>{{$ratingInstance->body}}</p>
                <a href="" id="reply"></a>

                <form method="post" action="{{route('rating.store')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="body" class="form-control"/>
                        <input type="hidden" name="expertID" class="$expertID"/>
                        <input type="hidden" name="parentID" class="$rating->id"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="reply" />
                    </div>
                </form>
                @include('ratingsDisplay', ['$rating' => $ratingInstance->replies])
            </div>
        @endforeach
@endsection