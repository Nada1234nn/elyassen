<div>

    @if(Session::has('success'))
        <div class="alert alert-success alert-styled-left">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            {{ Session::get('success') }}
        </div>
    @endif


    @if(Session::has('errors'))
        <div class="alert alert-danger alert-styled-left media">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif


    {{--@if($errors->has())--}}
    {{--<div class="alert alert-danger alert-styled-left">--}}
    {{--<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>--}}
    {{--حدثت بعض الاخطاء التالية--}}
    {{--</div>--}}
    {{--@endif--}}

</div>