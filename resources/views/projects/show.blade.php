
@extends('layouts.app')

@section('content')

 <div class="container-xxl flex-grow-1 container-p-y  ">
  <div class="row gy-6">
   

    <div class="container">
        <h2 class="mt-2">Project Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>Project Name</th>
                <td>{{ $projects->name }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $projects->category->cname }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ nl2br(e($projects->description)) }}</td>
            </tr>
            <tr>
                <th>Timeline</th>
                <td>{{ $projects->timeline }}</td>
            </tr>
            <tr>
                <th>Manager</th>
                <td>{{ $projects->manager->userinfo->fname }} {{ $projects->manager->userinfo->lname }}</td>
            </tr>
            <tr>
                <th>Staff</th>
                <td>{{ $projects->staff->userinfo->fname }} {{ $projects->staff->userinfo->lname }}</td>
            </tr>
        </table>
        <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Project List</a>
    </div>
</div>
</div>

@endsection

