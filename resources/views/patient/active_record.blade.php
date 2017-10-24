@extends('layouts.app')
@extends('patient.vital_signs_header')
@section('Maincontent')
    {{--@parent--}}

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    {{--Three Panels--}}
    <div class="container-fluid" style="margin-top: 0;padding-top: 0;padding-left: 1%;">
        <div class="row" style="border: solid;padding-top: 0;border-top:0;">
            {{--Navigation Panel--}}
            <div class="col-md-2" style="float: left;padding-left: 0;padding-right: 0">
                <ul class="list-group" style="cursor: pointer">
                    <li class="list-group-item">
                        {{--Adding Demographics to existing nav modules--}}
                        <a
                                id="Demographics_tab"
                                href="{{ URL::route('Demographics', $patient->patient_id)}}"
                                onclick="return confirm('You are about to leave this page and would loose all the unsaved changes. Are you sure you want to proceed?')"
                        >
                            <b>Demographics</b>
                        </a>
                    </li>

                    @foreach ($navs as $key=>$nav)
                        <li class="list-group-item" >
                            <a
                                    id="{{$nav[0]}}_tab"
                                    href="{{ URL::route($nav[0], $patient->patient_id)}}"
                                    onclick="return confirm('You are about to leave this page and would loose all the unsaved changes. Are you sure you want to proceed?')"
                            >
                               <b>{{ $nav[0] }}</b>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{--Documentation Panel--}}
            <div class="col-md-7" style="border-right: solid;border-left:solid;padding-left: 0">
                @yield('documentation_panel')
            </div>

            {{--Pink Panel--}}
            <div class="col-md-3" style="float: right;background-color: lightpink;" id="pink_panel">
                Pink Panel
            </div>

        </div>
    </div>

    <script>
//        $(".list-group-item").on("click", function() {
//            $('ul li').css('background-color','none');
//            $(this).css("background-color", "blue");
//        })
    $('ul.list-group li.list-group-item a').click(function() {
        $('ul.list-group li.list-group-item').css('background','none');
        $(this).parent().css('background','red');
    });
    </script>
@endsection