@extends('layouts.admin')

@section("title", $viewData["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit mobile</div>
                <div class="card-body">

                    @if($errors->any())

                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                        @endforeach
                    </ul>

                    @endif
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('admin.mobile.update', ['id'=> $viewData['mobile']->getId()])}}" enctype="multipart/form-data">

                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="Enter name" name="name" value="{{ $viewData['mobile']->getName() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ $viewData['mobile']->getPrice() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ $viewData['mobile']->getBrand() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter model" name="model" value="{{ $viewData['mobile']->getModel() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter color" name="color" value="{{ $viewData['mobile']->getColor() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter ramMemory" name="ramMemory" value="{{ $viewData['mobile']->getRamMemory() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter storage" name="storage" value="{{ $viewData['mobile']->getStorage() }}" />
                        <input type="text" class="form-control mb-2" placeholder="Enter imgName" name="imgName" value="{{ $viewData['mobile']->getimgName() }}" />
                        <input type="submit" class="btn btn-primary" value="Edit" />

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection