@extends('Dashboard.layouts.master')

@section('content')
@include('Dashboard.messages_alert')
<!-- row -->
<!-- row opened -->
<div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                        {{trans('Services.add_Service')}}
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example2">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th> {{trans('Services.name')}}</th>
                            <th> {{trans('Services.price')}}</th>
                            <th> {{trans('doctors.Status')}}</th>
                            <th> {{trans('Services.description')}}</th>
                            <th>{{trans('sections_trans.created_at')}}</th>
                            <th>{{trans('sections_trans.Processes')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($services as $service)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$service->name}}</td>
                                <td>{{$service->price}}</td>
                                <td>
                                    <div
                                        class="dot-label bg-{{$service->status == 1 ? 'success':'danger'}} ml-1"></div>
                                    {{$service->status == 1 ? trans('doctors.Enabled'):trans('doctors.Not_enabled')}}
                                </td>
                                <td> {{ Str::limit($service->description, 50) }}</td>
                                <td>{{ $service->created_at->diffForHumans() }}</td>
                                <td>
                                    <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"
                                       data-toggle="modal" href="#edit{{$service->id}}">تعديل</a>
                                    <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                       data-toggle="modal" href="#delete{{$service->id}}">حذف</a>
                                </td>
                            </tr>

                            @include('Dashboard.Services.Single Service.edit')
                            @include('Dashboard.Services.Single Service.delete')
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div><!-- bd -->
        </div><!-- bd -->
    </div>
    <!--/div-->

@include('Dashboard.Services.Single Service.add')
<!-- /row -->

</div>
<!-- row closed -->

<!-- Container closed -->

<!-- main-content closed -->
@endsection