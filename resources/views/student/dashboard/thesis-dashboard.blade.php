@extends('student.student-thesis')
@section('title', 'Thesis')

@section('thesis')
<div>
    <div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thesis</h1>
        
    </div>
    <p>The thesis is shown below for the S.Y. 2022-2023.</p>
      
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">     
                          
                </table>
            </div>
        </div>
    </div>       
</div>
@endsection
