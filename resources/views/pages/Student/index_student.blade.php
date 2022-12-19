@extends('layouts.master')
@section('css')
@section('title')
    {{ trans('main_trans.List Students') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.List Students') }}
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
                            <a href="{{ route('student.create') }}" class="btn btn-success btn-sm" role="button"
                                aria-pressed="true">{{ trans('main_trans.Add Students') }}</a><br><br>
                            <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                    data-page-length="50" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ trans('Students_trans.name') }}</th>
                                            <th>{{ trans('Students_trans.email') }}</th>
                                            <th>{{ trans('Students_trans.gender') }}</th>
                                            <th>{{ trans('Students_trans.Grade') }}</th>
                                            <th>{{ trans('Students_trans.classrooms') }}</th>
                                            <th>{{ trans('Students_trans.section') }}</th>
                                            <th>{{ trans('Students_trans.Processes') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->name }}</td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->gender->name }}</td>
                                                <td>{{ $student->SchoolGrade->name }}</td>
                                                <td>{{ $student->classroom->name_class }}</td>
                                                <td>{{ $student->section->name_section }}</td>
                                                <td>
                                                        <div class="dropdown show">
                                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                {{ trans('Students_trans.Processes') }}
                                                            </a>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                <a class="dropdown-item" href="{{route('student.show',$student->id)}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{ trans('Students_trans.View_student_data') }}</a>
                                                                <a class="dropdown-item" href="{{route('student.edit',$student->id)}}"><i style="color:green" class="fa fa-edit"></i>&nbsp; {{ trans('Students_trans.Student_Edit') }}</a>
                                                                <a class="dropdown-item" href="{{route('fees_invoice.show',$student->id)}}"><i style="color: #0000cc" class="fa fa-plus"></i>&nbsp;  {{ trans('Students_trans.Add_fee_invoice') }}&nbsp;</a>
                                                                <a class="dropdown-item" href="{{route('receipt_student.show',$student->id)}}"><i style="color: #9dc8e2" class="fas fa-money-bill-alt"></i>&nbsp; &nbsp; {{ trans('Students_trans.receipt') }}</a>
                                                                <a class="dropdown-item" data-target="#Delete_Student{{ $student->id }}" data-toggle="modal" href="##Delete_Student{{ $student->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('Students_trans.Delete student data') }}  </a>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                            @include('pages.Student.delete_student')
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
