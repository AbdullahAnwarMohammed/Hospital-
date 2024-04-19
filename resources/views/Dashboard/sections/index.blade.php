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
                            {{trans('Dashboard/sections_trans.add_sections')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example2">
                            <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">#</th>
                                <th class="wd-15p border-bottom-0">{{trans('Dashboard/sections_trans.name_sections')}}</th>
                                <th class="wd-15p border-bottom-0">{{trans('Dashboard/sections_trans.description')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/sections_trans.created_at')}}</th>
                                <th class="wd-20p border-bottom-0">{{trans('Dashboard/sections_trans.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                           @foreach($sections as $section)
                               <tr>
                                   <td>{{$loop->iteration}}</td>
                                   <td><a href="{{route('admin.sections.show',$section->id)}}">{{$section->name}}</a> </td>
                                   <td>{{ \Str::limit($section->description, 50) }}</td>
                                   <td>{{ $section->created_at->diffForHumans() }}</td>
                                   <td>
                                       <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$section->id}}"><i class="fa-solid fa-pen-to-square"></i></a>
                                       <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$section->id}}"><i class="fa-solid fa-trash"></i></a>
                                   </td>
                               </tr>

                               @include('Dashboard.Sections.edit')
                               @include('Dashboard.Sections.delete')

                           @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.Sections.add')
    <!-- /row -->

</div>
<!-- row closed -->
@endsection