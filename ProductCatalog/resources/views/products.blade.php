@extends('header')

@section('content')
   <div class="container">
      <form action="{{ route('items.store') }}" method="POST">
         @csrf
         <div class="row mt-3">
            @foreach($products as $product)
               <div class="col-4 mb-3">
                  <div class="card h-100">
                     <div class="card-body">
                     <h5 class="card-title">{{ $product['name'] }}</h5>
                     <h4 class="card-subtitle mb-2 text-body-secondary">{{ $product['price'] }} руб.</h4>
                     </div>
                     <div class="card-footer bg-white">
                        <input type="hidden" name="products[{{ $product['id'] }}][id]" value="{{ $product['id'] }}">
                        <input type="hidden" name="products[{{ $product['id'] }}][name]" value="{{ $product['name'] }}">
                        <input type="hidden" name="products[{{ $product['id'] }}][price]" value="{{ $product['price'] }}">
                        <input type="hidden" id="count_{{ $product['id'] }}" name="products[{{ $product['id'] }}][count]" value="0" onload="add_panel({{ $product['id'] }})">
                        <button type="button" id="add_{{ $product['id'] }}" class="btn btn-success form-control" onclick="add_buttons({{ $product['id'] }})"><i class="bi bi-cart-plus fs-5"></i></button>
                        <div class="w-100" id="panel_{{ $product['id'] }}" style="display: none">
                           <div class="input-group  w-100">
                              <button type="button" class="btn btn-light border" onclick="minus({{ $product['id'] }})">
                                 <i class="bi bi-dash fs-4"></i>
                              </button>
                              <div class="form-control text-center">
                                 <div class="fs-4 fw-bolder" id="text_count_{{ $product['id'] }}">1</div>
                              </div>
                              <button type="button" class="btn btn-light border" onclick="plus({{ $product['id'] }})">
                                 <i class="bi bi-plus fs-4"></i>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            @endforeach
         </div>
         <div class="d-flex justify-content-center">
            <button class="fs-4 btn btn-primary" type="submit">
               Оформить заказ
            </button>
         </div>
      </form>
   </div>
   <script>

      function add_buttons(id) {

         document.getElementById('add_' + id).style.display = 'none';
         let countElement = document.getElementById('count_' + id);
         countElement.value = parseInt(countElement.value) + 1;
         
         document.getElementById('panel_' + id).style.display = 'inline-block';
         document.getElementById('text_count_' + id).textContent = countElement.value;
      }
      function plus(id){

         let countElement = document.getElementById('count_' + id);
         countElement.value = parseInt(countElement.value) + 1;

         document.getElementById('text_count_' + id).textContent = countElement.value;
      }
      function minus(id){

         let countElement = document.getElementById('count_' + id);
         countElement.value = parseInt(countElement.value) - 1;
         if(countElement.value <= 0){
            document.getElementById('add_' + id).style.display = 'inline-block';
            document.getElementById('panel_' + id).style.display = 'none';
         }

         document.getElementById('text_count_' + id).textContent = countElement.value;
      }
  </script>
@endsection