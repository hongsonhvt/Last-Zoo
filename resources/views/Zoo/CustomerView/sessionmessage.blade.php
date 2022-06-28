@if (\Illuminate\Support\Facades\Session::get('msg') != null)
    {{--  https://getbootstrap.com/docs/4.6/components/alerts/#dismissing--}}
    <div style="font-size: x-large;">
        {{\Illuminate\Support\Facades\Session::get('msg')}}
    </div>
@endif
