@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="8">

            <b-card title="Registro" class="my-3">
                @if($errors->any()) 
                <b-alert show variant="danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>   
                        @endforeach
                    </ul>
                </b-alert>
                @else
                <b-alert show>
                    Por favor ingresa tus datos
                </b-alert> 
                @endif                
                <b-form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <b-form-group
                        label="Nombre"
                        label-for="name"
                        >
                        <b-form-input id="name" 
                            type="text" 
                            name="name" 
                            value="{{ old('name') }}" required autofocus>
                        </b-form-input>
                    </b-form-group>

                    <b-form-group
                        description="Nunca compartiremos tu correo."
                        label="Correo Electrónico"
                        label-for="email"
                        >
                        <b-form-input id="email" 
                            type="email" 
                            name="email" 
                            value="{{ old('email') }}" required 
                            placeholder="ejemplo@correo.com">
                        </b-form-input>
                    </b-form-group>

                    <b-form-group label="Contraseña" label-for="password">
                        <b-form-input type="password"
                            id="password"                            
                            name="password"                             
                            required>
                        </b-form-input>
                    </b-form-group>

                    <b-form-group label="Confirmar contraseña" label-for="password_confirmation">
                        <b-form-input type="password"
                            id="password"                            
                            name="password_confirmation"                             
                            required>
                        </b-form-input>
                    </b-form-group>
                    
                    <b-button type="submit" variant="primary">
                        Confirmar registro
                    </b-button>
                    <b-button href="{{ route('login') }}" variant="link">
                        ¿Ya te has registrado?
                    </b-button>                    
                </b-form>                
            </b-card>      
            

        </b-col>
    </b-row>
</b-container>


    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

    <input id="password" type="password" class="form-control" name="password" required>

    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            
@endsection
