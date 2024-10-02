@extends('header')

@section('content')
    <form action="{{ route('items.store.orders') }}" method="post">
        @csrf
        <div class="container mt-3">
            <div class="form-control">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th class="text-center">Цена</th>
                            <th class="text-center">Количество</th>
                            <th class="text-center">Итого</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($summary as $data)
                            <tr>
                                <td>
                                    <input type="hidden" name="orders[name_product][{{ $data['id'] }}]" value="{{ $data['name'] }}">
                                    {{ $data['name'] }}
                                </td>
                                <td class="text-center">
                                    {{ $data['price'] }} руб.
                                </td>
                                <td class="text-center">
                                    {{ $data['product'] }}
                                </td>
                                <td class="text-center">
                                    {{ $data['subtotal'] }} руб.
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col">
                        <input type="hidden" name="orders[subtotal]" value="{{ $total }}">
                        <div class="fs-5 fw-bolder">
                            Общая сумма: {{ $total }} руб.
                        </div>
                    </div>
                    <div class="col">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Оформить заказ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection