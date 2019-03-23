<div>
    <div class="js-flash-messages  respon-sm-6">
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
</div>

<style>
    .respon-sm-6 {
        padding-right: 15px;
        padding-left: 15px;
        margin-right: auto;
        margin-left: auto;
    }
    .respon-sm-6 {
        position: fixed;
        z-index: 1000;
        left: 50%;
        -webkit-transform: translate(-50%, 15px);
        -moz-transform: translate(-50%, 15px);
        -ms-transform: translate(-50%, 15px);
        -o-transform: translate(-50%, 15px);
        transform: translate(-50%, 15px);
    }
    .media{
        padding: 15px 200px;
    }
</style>