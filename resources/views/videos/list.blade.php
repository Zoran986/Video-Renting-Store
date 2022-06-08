@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                  @if(Session::has('success'))
                  <div class="alert alert-success">
                      {{ Session::get('success') }}
                  </div>
                  @endif
                  @if(Session::has('error'))
                  <div class="alert alert-danger">
                      {{ Session::get('error') }}
                  </div>
                  @endif

                  <table class="table">
                      <thead>
                          <tr>
                              <th>Title</th>
                              <th>Genre</th>
                              <th>Cost</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($videos as $video)
                              <tr>
                                  <td>{{ $video->title }}</td>
                                  <td>{{ $video->genre->name }}</td>
                                  <td>${{ $video->cost }}</td>
                                  <td>
                                      @if($video->user_id && $video->user_id != Auth::user()->id)
                                      <span class="text-danger">Not Available</span>
                                      @elseif($video->user_id == Auth::user()->id)
                                      <a href="{{ route('returnVideo', $video->id) }}" class="text-warning">Return video</a>
                                      @else
                                      <a href="{{ route('rentVideo', $video->id) }}" class="text-success">Rent video</a>
                                      @endif
                                  </td>
                              </tr>
                              
                          @endforeach
                            </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
