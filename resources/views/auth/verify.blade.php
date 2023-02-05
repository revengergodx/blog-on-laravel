@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Підтвердження Вашого Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Лист із підтвердженням було на Ваш Email.') }}
                        </div>
                    @endif

                    {{ __('Щоб продовжити, зайдіть до Вашого Email та підтвердіть його.') }}
                    {{ __('Якщо ви не отримали листа,') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('натисніть тут, щоб отримати ще один лист') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
