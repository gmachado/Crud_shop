@extends('layouts.app')

@section('content')
 <div class="container">
    <h1>cadastrar novo produto</h1>
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
        </div>    
    @endif
    <form action="/daily_store"  method="post"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="primeiro" class="col-form-label-lg">valor</label>
        <input type="number" name="primresp" value=" " class="form-control" id="primeiro">

        <label for="segundo" class="col-form-label-lg">quantidade em estoque</label>
        <input type="number" name="segunresp" value=" " class="form-control" id="segundo">

        <label for="terceiro" class="col-form-label-lg">nome</label>
        <input type="text" name="tercresp" value=" " class="form-control" id="terceiro"> 

        <label for="quarto" class="col-form-label-lg">status</label>
        <br><label>visivel
        <input type="radio" name="quartaresp" value="1" class="form-control" id="quarto"></label></br>
        <br><label>invisivel
        <input type="radio" name="quartaresp" value="0" class="form-control" id="quarto"></label></br>

        <label for="quinto" class="col-form-label-lg">descrição</label>
        <input type="text" name="quintaresp" value=" " class="form-control" id="quinto"> 

        <label for="sexto" class="col-form-label-lg">image: </label>
        <input type="file" name="sextaresp" value=" " class="form-control" id="sexto"> 

    </div>
        <input class="btn btn-success" type="submit" value="Salvar">
        <a class="btn btn-danger" href="/daily_list">Cancelar</a>
    </form>
 </div>
 @endsection
 