@extends('layouts.app')

@section('content')
<div><h3 class="text-center text-white">Transfer to another account!</h3></div>
    <div class="container col-8">
        <div style="width:20%; margin:0 auto;" class="row">
            <form action="/transfer/{!! Auth()->user()->id !!}" method="POST">
              @csrf
                <div class="form-group pl-4">
                    <label class="text-white" for="id">Account id : </label>
                    <input class="form-control" type="number" name="id"  min="0">
                    
                        @error('id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    <label class="text-white pt-4" for="ammount">Ammount : </label>
                    <input class="form-control" type="number" name="ammount" min="0">

                        @error('ammount')
                        <div class="text-danger">{{ $message }}</div>  
                        @enderror

                    <label class="text-white pt-4" for="ammt">Description : </label>
                    <textarea class="form-control" name="description" id="description" cols="21" rows="5"></textarea>

                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    <button class="form-control btn2 text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection