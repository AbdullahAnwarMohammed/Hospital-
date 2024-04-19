@extends('Dashboard.layouts.master')

@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{route('admin.dectors.create')}}" class="btn btn-primary" role="button"
                       aria-pressed="true">{{trans('doctors.add_doctor')}}</a>
                    <button type="button" class="btn btn-danger"
                            id="btn_delete_all">{{trans('doctors.delete_select')}}</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th><input name="select_all"  id="example-select-all"  type="checkbox"/></th>
                                <th>{{trans('doctors.name')}}</th>
                                {{-- <th>{{trans('doctors.img')}}</th> --}}
                                <th>{{trans('doctors.section')}}</th>
                                <th>{{trans('doctors.phone')}}</th>
                                <th>{{trans('doctors.appointments')}}</th>
                                <th>{{trans('doctors.Status')}}</th>
                                {{-- <th>{{trans('doctors.created_at')}}</th> --}}
                                <th>{{trans('doctors.Processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="checkbox" name="delete_select" value="{{$doctor->id}}" class="delete_select">
                                    </td>
                                    <td>{{ $doctor->name }}</td>
                                    {{-- <td>

                                        @if($doctor->image)

                                            <img src="{{asset('Dashboard/img/doctors/'.$doctor->image->filename)}}"
                                                 height="50px" width="50px" alt="">

                                        @else

                                            <img src="{{asset('Dashboard/img/doctor_default.png')}}" height="50px"
                                                 width="50px" alt="">
                                        @endif
                                    </td> --}}
                                    <td>{{ $doctor->section->name}}</td>
                                    <td>{{ $doctor->phone}}</td>
                                    <td>
                                        @foreach($doctor->doctorappointments as $appointment)
                                           <span class="btn btn-outline-success btn-sm"> {{$appointment->name}}</span>
                                        @endforeach
                                    </td>
                                    <td  style="padding:0;margin:20px 0;" class="text-center  d-flex  btn btn-sm btn-{{$doctor->status == 1 ? 'success':'danger'}}">
                                        
                                        {{$doctor->status == 1 ? trans('doctors.Enabled'):trans('doctors.Not_enabled')}}
                                    </td>

                                    {{-- <td>{{ $doctor->created_at->diffForHumans() }}</td> --}}
                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="{{route('admin.dectors.edit',$doctor->id)}}"><i style="color: #0ba360" class="text-success ti-user"></i>&nbsp;&nbsp;تعديل البيانات</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i   class="text-primary ti-key"></i>&nbsp;&nbsp;تغير كلمة المرور</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i   class="text-warning ti-back-right"></i>&nbsp;&nbsp;تغير الحالة</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i   class="text-danger  ti-trash"></i>&nbsp;&nbsp;حذف البيانات</a>
                                            </div>
                                        </div>

                                    </td>
                                </tr>
                               @include('Dashboard.Doctors.delete')
                                 @include('Dashboard.Doctors.delete_select')
                               @include('Dashboard.Doctors.update_password')
                                 @include('Dashboard.Doctors.update_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection

@section('js')

<script>
    $(function() {
    jQuery("[name=select_all]").click(function(source) {
        checkboxes = jQuery("[name=delete_select]");
        for(var i in checkboxes){
            checkboxes[i].checked = source.target.checked;
        }
    });

            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });

})
</script>

@endsection