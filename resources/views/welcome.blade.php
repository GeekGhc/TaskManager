@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($projects)
                @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <ul class="icon-bar">
                                <li>
                                    @include('projects/_deleteForm ')
                                </li>
                                <li>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-toggle="modal" data-target="#editModal-{{$project->id}}">
                                            <i class="fa fa-btn fa-cog"></i>
                                    </button>
                                </li>
                            </ul>

                            <a href="{{route('projects.show',$project->name)}}">
                                <img src="{{asset('thumbnails/'.$user_name.'/'.$project->thumbnail)}}" alt="{{$project->name}}">
                            </a>
                            <div class="caption">
                                <a href="{{route('projects.show',$project->name)}}">
                                    <h4 class="text-center">{{$project->name}}</h4>
                                </a>
                            </div>

                            @include('projects/_editModal')

                        </div>
                    </div>
                @endforeach
            @endif
            <div class="project-modal col-sm-6 col-md-3">
                @include('projects/_createProjectModal')
            </div>
        </div>
    </div>

@endsection

@section('customJs')
    <script>
        $(document).ready(function () {
            $(".icon-bar").hide();
            $(".thumbnail").hover(function () {
                $(this).find(".icon-bar").toggle();
            });
        });
    </script>
@endsection
