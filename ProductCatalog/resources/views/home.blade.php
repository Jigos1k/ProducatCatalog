@extends('index')

@section('content')
   <div class="mx-2 d-flex align-items-center h-100">
      <div class="container d-flex justify-content-center">
         <div class="col-5">
            <div class="form-floating mb-3">
               <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
               <label for="floatingInput">Почта</label>
             </div>
             <div class="form-floating mb-3">
               <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
               <label for="floatingPassword">Парль</label>
             </div>
            <button type="button" class="btn btn-primary form-control" data-bs-toggle="modal" data-bs-target="#exampleModal">
               Зарегестрироваться
            </button>
             
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog modal-dialog-centered modal-sm">
                  <div class="modal-content">
                     <div class="modal-header d-flex justify-content-center">
                        <i class="bi bi-check2-circle text-success" style="font-size: 52px"></i>
                     </div>
                     <div class="modal-body d-flex justify-content-center">
                        Вы успешно зарегестрировались
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-success form-control" data-bs-dismiss="modal" aria-label="Close">Save changes</button>
                     </div>
                  </div>
               </div>
             </div>
         </div>
      </div>
   </div>
@endsection