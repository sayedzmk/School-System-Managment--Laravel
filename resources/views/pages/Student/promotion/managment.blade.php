@extends('layouts.master')
@section('css')

@section('title')
    {{ trans('main_trans.Student promotion department') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.Student promotion department') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">

                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                {{ trans('promotion_student_trans.Everyone retreated') }}                            </button>
                            <br><br>


                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0 "
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{ trans('Students_trans.name') }}</th>
                                            <th class="alert-danger">{{ trans('promotion_student_trans.old school stage') }}</th>
                                            <th class="alert-danger">{{ trans('promotion_student_trans.academic_year') }}</th>
                                            <th class="alert-danger">{{ trans('promotion_student_trans.from_classroom') }}</th>
                                            <th class="alert-danger">{{ trans('promotion_student_trans.from_section') }}</th>
                                            <th class="alert-success"> {{ trans('promotion_student_trans.academic_year_new') }} </th>
                                            <th class="alert-success">{{ trans('promotion_student_trans.school stage') }}</th>
                                            <th class="alert-success">{{ trans('promotion_student_trans.to_classroom') }}</th>
                                            <th class="alert-success">{{ trans('promotion_student_trans.to_section') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $promotion->student->name }}</td>
                                                <td>{{ $promotion->f_SchoolGrade->name }}</td>
                                                <td>{{ $promotion->academic_year }}</td>
                                                <td>{{ $promotion->f_classroom->name_class }}</td>
                                                <td>{{ $promotion->f_section->name_section }}</td>
                                                <td>{{ $promotion->academic_year_new }}</td>
                                                <td>{{ $promotion->to_SchoolGrade->name}}</td>
                                                <td>{{ $promotion->to_classroom->name_class }}</td>
                                                <td>{{ $promotion->to_Section->name_section }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#Delete_one{{$promotion->id}}">ارجاع الطالب</button>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#">تخرج الطالب</button>
                                                </td>
                                            </tr>
                                            @include('pages.Student.promotion.Delete_all')
                                            @include('pages.Student.promotion.Delete_one')
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
