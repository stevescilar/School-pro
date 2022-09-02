<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        
            Hi..  <b style="font-style: italic; color:DodgerBlue;">  {{ Auth::user()->name }}</b>
            <b style="float:right;"> Total Users  <strong class="badge badge-info">{{ count($users) }} </strong>
            
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
            <table class="table">
  <thead>
    <tr>
      <th scope="col">SL No</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Registered On</th>
    </tr>
  </thead>
  <tbody>
        @php($i = 1)
        @foreach($users as $user)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
    </tr>
        @endforeach

  </tbody>
</table>
            </div>
        </div>
    </div>
</x-app-layout>
