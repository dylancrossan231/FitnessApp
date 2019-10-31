@extends('layouts.app')
@section('content')
    <h3 class="text-center">Create Food</h3>
    <form action="{{ route('foods.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="protein">Enter protein</label>
            <input type="text" name="Protein" id="protein" class="form-control {{ $errors->has('protein') ? 'is-invalid' : '' }}" value="{{ old('protein') }}" placeholder="Enter protein">
            @if($errors->has('Protein'))
                <span class="invalid-feedback">
                    {{ $errors->first('protein') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="carbohydrate">Enter carbohydrate</label>
            <textarea name="carbohydrate" id="carbohydrate" rows="4" class="form-control {{ $errors->has('carbohydrate') ? 'is-invalid' : '' }}" placeholder="Enter Todo Description">{{ old('carbohydrate') }}</textarea>
            @if($errors->has('carbohydrate')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('carbohydrate') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
            <div class="form-group">
                <label for="fats">Enter fats</label>
                <textarea name="fats" id="fats" rows="4" class="form-control {{ $errors->has('fats') ? 'is-invalid' : '' }}" placeholder="Enter Todo Description">{{ old('fats') }}</textarea>
                @if($errors->has('fats')) {{-- <-check if we have a validation error --}}
                    <span class="invalid-feedback">
                        {{ $errors->first('fats') }} {{-- <- Display the First validation error --}}
                    </span>
            @endif
        </div>
        <div class="form-group">
            <label for="calories">Enter calories</label>
            <textarea name="calories" id="calories" rows="4" class="form-control {{ $errors->has('calories') ? 'is-invalid' : '' }}" placeholder="Enter Todo Description">{{ old('calories') }}</textarea>
            @if($errors->has('calories')) {{-- <-check if we have a validation error --}}
                <span class="invalid-feedback">
                    {{ $errors->first('calories') }} {{-- <- Display the First validation error --}}
                </span>
            @endif
        </div>
        <a href="{{ route('todos.show',$todo->id) }}">Read More</a>

        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
