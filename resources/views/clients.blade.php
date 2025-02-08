@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Clients') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Voici la liste des clients : 

                    @foreach ($clients as $client)
                        <div class="py-3  border-bottom border-black">
                            <h3 class="text-lg text-gray-500">{{$client->name}}</h3>
                            <p><b>Client ID : </b>{{$client->id}}</p>
                            <p><b>Client Redirect : </b>{{$client->redirect}}</p>
                            <p><b>Client Secret : </b>{{$client->secret}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="mt-3 pg-6 bd-white border-b border-gray-200">
                    <form action="/oauth/clients" method="post">
                        <div class="mt-2 ">
                            <label style="margin-left: 20px" for="name">Name</label>
                            <input style="margin-left: 20px" type="text" placeholder="Name" name="name">
                        </div><br>
                        
                        <div>
                            <label style="margin-left: 20px" for="name">Redirect</label>
                            <input style="margin-left: 20px" type="text" name="redirect" placeholder="http://my-url.com/callback">
                        </div><br>
                        
                        <div style="margin-bottom:10px">
                            @csrf
                            <button style="margin-left: 20px; " type="submit">Create Client</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
