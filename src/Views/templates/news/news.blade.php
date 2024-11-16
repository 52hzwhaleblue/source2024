@extends('layout')
@section('content')
    <section>
        @if ($news->isNotEmpty())
            <div class="max-width py-3">
                <div class="title-detail"><h1>{{$titleMain}}</h1></div>
                <div class="row">
                    @foreach ($news as $k => $v)
                        <div class="p-1 col-6 col-lg-4 col-md-4 col-sm-6 mb-3">
                            @component('component.itemNews', ['news' => $v])
                                <div class="desc-news line-clamp-3 mt-1">{{ $v->descvi }}</div>
                            @endcomponent
                        </div>
                    @endforeach
                </div>

                {!! $news->links() !!}
            </div>
        @endif
    </section>
@endsection