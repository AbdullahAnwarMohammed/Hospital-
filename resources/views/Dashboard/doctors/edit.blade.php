@extends('Dashboard.layouts.master')
@section('content')
@include('Dashboard.messages_alert')

<!-- row -->
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.dectors.update', 'test') }}" method="post" autocomplete="off"
                      enctype="multipart/form-data">
                    {{ method_field('patch') }}
                    {{ csrf_field() }}
                    <div class="pd-30 pd-sm-40 bg-gray-200">
                        <div>
                            @if($doctor->image)
                                <img style="border-radius:20%"
                                     src="{{asset('Dashboard/img/doctors/'.$doctor->image->filename)}}"
                                     height="150px" width="150px" alt="">
                            @else
                                <img style="border-radius:50%"
                                     src="{{asset('Dashboard/img/doctor_default.png')}}"
                                     height="50px"
                                     width="50px" alt="">
                            @endif
                        </div>
                        <br><br>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{trans('doctors.name')}}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" name="name" value="{{$doctor->name}}" type="text">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{trans('doctors.email')}}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" value="{{$doctor->email}}" name="email" type="email">
                            </div>
                        </div>


                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ trans('doctors.phone') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input class="form-control" value="{{$doctor->phone}}" name="phone" type="tel">
                                <input class="form-control" value="{{$doctor->id}}" name="id" type="hidden">
                            </div>
                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{trans('doctors.section')}}</label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <select name="section_id" class="form-control SlectBox">
                                    @foreach($sections as $section)
                                        <option
                                            value="{{$section->id}}" {{$section->id == $doctor->section_id ? 'selected':"" }}>{{$section->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class=" row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{trans('doctors.appointments')}}</label>
                            </div>

                            <div class="col-md-11 mg-t-5 mg-md-t-0 my-4">
                                <select multiple="multiple" class="form-control testselect2" name="appointments[]">
                                    @foreach($appointments as $appointment)
                                        @php $check = []; @endphp
                                        @foreach ($doctor->doctorappointments as $key => $appointmentDOC)
                                            @php
                                                $check[] = $appointmentDOC->id;
                                            @endphp
                                        @endforeach
                                        <option value="{{$appointment->id}}" {{ in_array($appointment->id, $check) ? 'selected' : '' }}>{{$appointment->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        <div class="row row-xs align-items-center mg-b-20">
                            <div class="col-md-1">
                                <label for="exampleInputEmail1">
                                    {{ trans('Doctors.doctor_photo') }}</label>
                            </div>
                            <div class="col-md-11 mg-t-5 mg-md-t-0">
                                <input type="file" accept="image/*" name="photo" onchange="loadFile(event)">
                                <img style="border-radius:50%" width="150px" height="150px" id="output"/>
                            </div>
                        </div>


                        <button type="submit"
                                class="btn btn-success pd-x-30 mg-r-5 mg-t-5">{{ trans('Doctors.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /row -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection

@section('js')
<script>
      var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
</script>
@endsection