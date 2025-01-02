@extends('layouts.app')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">


<div class="container-xxl flex-grow-1 container-p-y  ">
  <div class="row gy-6">
  

    <!--/ Congratulations card -->





    <!-- Data Tables -->
  

    <div class="col-12">
      <div class="card">
        <h5 class="card-header">Projects Details</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered" id="projectTable">
              <thead>
                <tr>
                  <th>Project Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Timeline</th>
                  <th>Manager</th>
                  <th>Staff</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @forelse($projects as $project)
                            <tr data-id="{{ $project->id }}">
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->category->cname }}</td>
                                <td>{{ $project->description }}</td>
                                <td>{{ $project->timeline }}</td>
                                <td>{{ $project->manager->userinfo->fname }} {{ $project->manager->userinfo->lname }}</td>
                                <td>{{ $project->staff->userinfo->fname }} {{ $project->staff->userinfo->lname }}</td>
                                <td>
                                    <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary" title="View Project"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">No projects found.</td>
                            </tr>
                        @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>


@endsection
