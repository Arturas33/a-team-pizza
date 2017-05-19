@extends('frontend.frontend')
@section('content-list')
    @if(isset($error))
        <h4 style="color:red">{{ $error['message'] }}</h4>
    @endif
    @if(isset($success))
        <h4 style="color:green">{{ $success['message'] }}</h4>
    @endif
    <div class="row">
        <div class="col-md-12">
            @if(!isset($id))
                {!! Form::open(['url' => route('app.pizzas.create')]) !!}
            @endif
            @if(isset($id))
                {!! Form::open(['url' => route('app.pizzas.edit', $id)]) !!}
            @endif

            @if(!isset($pizzas[0]['name']))
                {{ Form::label('Leave your contact number:', null, ['class' => 'control-label']) }}
                {{ Form::text('name') }}
            @else
                {{ Form::label('Check your contact number:', null, ['class' => 'control-label']) }}
                {{ Form::text('name', $pizzas[0]['name']) }}
            @endif

            @if(!isset($pizzas[0]['base_id']))
                {{ Form::label('Select base', null, ['class' => 'control-label']) }}
                {{ Form::select('base', $base) }}
            @else
                {{ Form::label('Select base', null, ['class' => 'control-label']) }}
                {{ Form::select('base', $base, $pizzas[0]['base_id']) }}
            @endif

            @if(!isset($pizzas[0]['cheese_id']))
                {{ Form::label('Select cheese', null, ['class' => 'control-label']) }}
                {{ Form::select('cheese', $cheese) }}
            @else
                {{ Form::label('Select cheese', null, ['class' => 'control-label']) }}
                {{ Form::select('cheese', $cheese, $pizzas[0]['cheese_id']) }}
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if(!isset($pizzas[0]['pizza_topping']))
                @foreach($toppings as $key => $topping)
                    <label>
                        {{ Form::checkbox('toppings[]', $key) }}
                            @if($key == $superIngredient)
                            <b>{{$topping}}</b>
                            @else
                                {{$topping}}
                            @endif


                    </label><br>
                @endforeach
            @endif

            @if(isset($pizzas[0]['pizza_topping']))
                @foreach($toppings as $key => $topping)
                    <label>
                        @if(in_array($key, $toppingIds))
                            {{ Form::checkbox('toppings[]', $key, true) }}
                        @else
                            {{ Form::checkbox('toppings[]', $key) }}
                        @endif
                        {{$topping}}
                    </label><br>
                @endforeach
            @endif

            <br>
            {{ Form::submit('Submit') }}
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-2.0.0.js"></script>
    <script>$( document ).ready(function() {
            $('input[type=checkbox]').on('change', function (e) {
                if ($('input[type=checkbox]:checked').length > 3) {
                    $(this).prop('checked', false);
                    alert("please, no more than 3 toppings per pizza");
                }
            });
        });
    </script>
@endsection