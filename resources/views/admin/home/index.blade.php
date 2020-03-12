    @extends('layouts.admin')

    @section('title', 'Inicio')

    @section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class=" w3-card-4 w3-white ">
                    <div class="card-primary card-outline card-header">
                        <h4 class="">Panel de control</h4> 
                    
                        <div class="card-body">					
                            <div class="row">
                                
                                <div class="col-md-4">
                                    <div class="cw3-card-4 w3-white"><br>
                                        <center><h3>Inventario de productos</h3></center>
                                        <div class="small-box" style="background:linear-gradient(to left,#627d4d,#627d4d,#2c5706)">
                                            <div class="inner">
                                            <h3 style="color:white;">{{ $producto }}</h3>

                                            <p style="color:white;">Productos guardados</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-store"></i>
                                            </div>
                                            <a href="{{ url('productos') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                            
                                <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Comprobantes</h3></center>
                                        <div class="small-box" style="background:linear-gradient(to left,#ff5e00,#c74900,#a63c03,#a63c03,#a63c03)">
                                            <div class="inner">
                                            <h3 style="color:white;">{{ $comprobante }}</h3>

                                            <p style="color:white;">Comprobantes generados</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-shopping-basket"></i>
                                            </div>
                                            <a href="{{ url('/comprobantes') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        
                                        <center><h3>Gastos</h3></center>
                                        @can('add_gastos')
                                        <div class="small-box" style="background:linear-gradient(to left,#ffee00 ,#b5a906,#968a00,#918505,#877b0a)">
                                            <div class="inner">
                                            <h3 style="color:white;">150</h3>

                                            <p style="color:white;">Facturas generadas</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-store-alt"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                         @else
                                                 <center><h5 style="color:red;">Lo siento, no tienes permisos para ver éste módulo.</h5></center><br>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Clientes</h3></center>
                                        <div class="small-box" style="background:linear-gradient(to left,#00ff2b ,#00b51e,#009116,#008c15,#007812)">
                                            <div class="inner">
                                                <h3 style="color:white;">{{ $clientes }}</h3>

                                                <p style="color:white;">Clientes guardados</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-user-tie"></i>
                                            </div>
                                            <a href="{{ url('/clientes') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Proveedores</h3></center>
                                        <div class="small-box" style="background:linear-gradient(to left,#00ffd9 ,#00b59a,#029680,#02917c,#02826f)">
                                            <div class="inner">
                                            <h3 style="color:white;">{{ $proveedor }}</h3>

                                            <p style="color:white;">Proveedores guardados</p>
                                            </div>
                                            <div class="icon">
                                            <i class="fas fa-shipping-fast"></i>
                                            </div>
                                            <a href="{{ url('/proveedores') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Empleados</h3></center>
                                        @can('add_empleados')
                                        
                                            <div class="small-box" style="background:linear-gradient(to left,#1296e3,#0c6aa8,#045185,#014773)">
                                                <div class="inner">
                                                <h3 style="color:white;">150</h3>

                                                <p style="color:white;">Empleados guardados</p>
                                                </div>
                                                <div class="icon">
                                                <i class="fas fa-user"></i>
                                                </div>
                                                <a href="{{ route('empleados.index') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                            </div>
                                            @else
                                                 <center><h5 style="color:red;">Lo siento, no tienes permisos para ver éste módulo.</h5></center><br>
                                            @endcan
                                            
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Apertura de caja</h3></center>
                                            <div class="small-box" style="background:linear-gradient(to left,#b021e8,#8712b5,#580a7a,#511469)">
                                                <div class="inner">
                                                <h3 style="color:white;">{{ $apertura }}</h3>
                                                <p style="color:white;">Cantidad de aperturas de caja</p>
                                                </div>
                                                <div class="icon">
                                                <i class="fas fa-cash-register"></i>
                                                </div>
                                                <a href="{{ route('apertura.index') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                        </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Cierre de caja</h3></center>
                                            <div class="small-box" style="background:linear-gradient(to left,#e69122 ,#cc802f,#b56e28,#a15f0f,#824800)">
                                                <div class="inner">
                                                <h3 style="color:white;">{{ $cierre }}</h3>

                                                <p style="color:white;">Cantidad de cierres de caja</p>
                                                </div>
                                                <div class="icon">
                                                <i class="fas fa-window-close"></i>
                                                </div>
                                                <a href="{{ route('cierre.index') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                            </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                    <div class="w3-card-4 w3-white"><br>
                                        <center><h3>Tasa del diaria (dólar)</h3></center>
                                        @can('add_tasa_diaria')
                                            <div class="small-box" style="background:linear-gradient(to left,#e00000 ,#c40000,#ab0707,#a60707,#910303)">
                                                <div class="inner">
                                                    <h3 style="color:white;">{{ $count }}</h3>
                                                    <p style="color:white;">Tasa registrada</p>
                                                </div>
                                        <div class="icon">
                                        <i class="fas fa-users"></i>
                                        </div>
                                        <a href="{{ route('tasa.index') }}" class="small-box-footer">Más información <i class="fa fa-arrow-circle-left"></i></a>
                                    </div>
                                    @else
                                    <center><h5 style="color:red;">Lo siento, no tienes permisos para ver éste módulo.</h5></center><br>
                                    @endcan
                                </div>
                            </div>
                        </div>					
                    </div>
                </div>
            </div>
        </div>

    @endsection
