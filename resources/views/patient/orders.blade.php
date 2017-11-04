{{--@extends('layouts.app')--}}
{{--@extends('patient.vital_signs_header')--}}
@extends('patient.active_record')

@section('documentation_panel')
{{--@parent--}}
<div class="container-fluid">
    <div class="panel panel-default">
        <div class="panel-heading" style="background-color: lightblue;padding-bottom: 0">
            <h4 style="margin-top: 0">Orders</h4>
        </div>
        <form class="form-horizontal" method="POST" action="{{ route('post_orders') }}" id="orders_form">
            {{ csrf_field() }}
            <input id="module_id" name="module_id" type="hidden" value="{{ $patient->module_id }}">
            <input id="patient_id" name="patient_id" type="hidden" value="{{ $patient->patient_id }}">
            <input type=hidden id="user_id" name="user_id" value="{{ Auth::user()->id }}">

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>List of labs</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($labs as $lab)
                                <tr>
                                    <td><p>{{$lab->value}}</p></td>
                                    <td style="text-align: right">
                                        <a id="_delete"  class="btn btn-danger btn-sm">
                                            Delete </a>
                                      </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr class="bg-info">
                                <th>List of Images</th>
                                <th colspan="2"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($images as $image)
                                <tr>
                                    <td><p>{{$image->value}}</p></td>
                                    <td style="text-align: right">

                                        <a id="_delete" class="btn btn-danger btn-sm">
                                            Delete </a>
                                     </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr style="width: ">
                <div class="row">
                    <!-- Search For labs -->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="orders_labs"> Labs:</label>
                            </div>
                            <div class="col-md-10 ">
                                <select id="search_labs_orders" class="js-example-basic-multiple js-states form-control" name="search_labs_orders[]" multiple></select>
                            </div>
                        </div>
                    </div>
                    <!-- Search For Imaging -->
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="orders_imaging"> Imaging:</label>
                            </div>
                            <div class="col-md-10">
                                <select id="search_labs_imaging" class="js-example-basic-multiple js-states form-control" name="search_labs_imaging[]" multiple></select>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <br>
                <!-- Comment box -->
                <div class="row">
                    <div class="col-md-2">
                        <label for="Comment"> Comments:</label>
                    </div>
                    <div class="col-md-10">
                        @if(!count($comment_order)>0)
                            <textarea rows="4" id="orders_comment" name="orders_comment" style="width: 600px" >
                            </textarea>
                        @else
                            <textarea rows="4" id="orders_comment" name="orders_comment" style="width: 600px">
                        {{$comment_order[0]->value}}</textarea>
                        @endif
                    </div>
                </div>
                <br>
                {{--Buttons--}}
                <div class="row">
                        <div class="col-md-6">
                            {{--<button type="reset" id="btn_reset_orders" class="btn btn-primary" style="float: left">--}}
                                {{--Reset Orders--}}
                            {{--</button>--}}
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="btn_save_orders" class="btn btn-success" style="float: right">
                                Save Orders
                            </button>
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#search_labs_orders').select2({
        placeholder: "Choose labs...",
        minimumInputLength: 2,
        ajax: {
            url: '{{route('orders_labs_find')}}',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    $('#search_labs_imaging').select2({
        placeholder: "Choose images...",
        minimumInputLength: 2,
        ajax: {
            url: '{{route('orders_imaging_find')}}',
            dataType: 'json',
            data: function (params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        }
    });

    $(document).ready(function(){
        var inputsChanged = false;
        $('#orders_form').change(function() {
            inputsChanged = true;
        });

        function unloadPage(){
            if(inputsChanged){
                return "Do you want to leave this page?. Changes you made may not be saved.";
            }
        }

        $("#save_button").click(function(){
            inputsChanged = false;
        });

        window.onbeforeunload = unloadPage;
    });


</script>
@endsection