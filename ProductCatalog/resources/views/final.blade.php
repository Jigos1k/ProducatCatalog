@extends('header')

@section('content')
    <div class="container mt-3">
        <div class="form-control">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Номер</th>
                        <th class="text-center">Продукты</th>
                        <th class="text-center">Дата заказа</th>
                        <th class="text-center">Сумма</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($summary as $data)
                        <tr>
                            <td>
                                {{ $data['id'] }}
                            </td>
                            <td class="w-auto">
                                <div class="row">
                                    @foreach ($data['names'] as $name)
                                        <div class="col-auto px-0">
                                            <span class="badge text-bg-primary me-1">{{ $name }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </td>
                            <td class="text-center">{{ $data['date_create'] }}</td>
                            <td class="text-center">{{ $data['subtotal'] }} руб.</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col">
                    {{-- <a href="{{ route('items.form') }}" class="btn btn-secondary">Вернуться на главную</a> --}}
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end">
                        <div class="fs-5 fw-bolder">Общая сумма заказов: {{ $total }} руб.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection