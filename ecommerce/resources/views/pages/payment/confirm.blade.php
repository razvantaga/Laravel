@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 d-flex">
            <div class="w-100 text-center align-items-center my-5">
                <h3 class="text-success">Mulțumim pentru comanda!</h3>
                <p class="lead">Comanda ta a fost plasată cu succes și este în curs de procesare.</p>
                <div class="d-flex flex-column">
                    <span>Numar comanda: </span>
                    <span class="mt-2">Data: </span>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 mb-5 text-center py-5" style="background-color: #0091E840; border-radius: 30px;">
        <h3 class="text-primary">Detalii comandă</h3>
        
        <div class="container my-5">
            <div class="row mb-3">
                <div class="col-lg-6">
                    <h4>Produs</h4>
                </div>
                <div class="col-lg-6">
                    <h4>Total</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 ">
                    <p class="lead">Produs 1 &times; 1 </p>
                    <hr style="width: 80%; height: 1px; background-color: #ccc;  margin: 5px auto;">
                    <p class="lead">Produs 2 &times; 2</p>
                    <hr style="width: 80%; height: 1px; background-color: #ccc;  margin: 5px auto;">
                    <p class="lead">Produs 3 &times; 3</p>
                    <hr style="width: 80%; height: 1px; background-color: #ccc;  margin: 5px auto;">
                </div>
                <div class="col-lg-6 ">
                    <p class="lead">$10.00</p>
                    <hr style="width: 80%; height: 1px; background-color: #ccc;  margin: 5px auto;">
                    <p class="lead">$30.00</p>
                    <hr style="width: 80%; height: 1px; background-color: #ccc;  margin: 5px auto;">
                    <p class="lead">$50.00</p>
                    <hr style="width: 80%; height: 1px; background-color: #ccc;  margin: 5px auto;">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-lg-6 d-flex flex-column justify-content-between mt-2">
                    <h4 >Subtotal</h4>
                    <h4 >Livrare</h4>
                    <h4 >Metoda de plata</h4>
                    <h4 >Total</h4>
                </div>

                <div class="col-lg-6">
                    <p class="lead">$90.00</p>
                    <p class="lead">Livrare Gratuita</p>
                    <p class="lead">Cash</p>
                    <h4>$90.00</h4>
                </div>
            </div>
        </div>
    </div>

</div>


@endsection