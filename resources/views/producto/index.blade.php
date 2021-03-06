@extends('layouts.app')

@section('template_title')
    Producto
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto') }}
                            </span>
                           
                            <form>

                            <div class="input-group">
                                    <select name="search" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                                     <option selected>Categorias</option>
                                     @foreach ($productos as $producto)
                                      <option value="{{ $producto->categoria_id }}" >{{ $producto->categoria->nombre }}</option>
                                      @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-outline-secondary" type="button">Buscar</button>
                            </div>
                            
                            <!--<select class="form-select" aria-label="Default select example">
                            
                                     <option selected>Elige la caategoria</option>
                                    @foreach ($productos as $producto)
                                    <option name="search" value={$producto->categoria->nombre} >{{ $producto->categoria->nombre }}</option>
                                   
                                    @endforeach
                                    

                            </select>-->
  
  
                 <!-- <div class="input-group rounded">
                                    <input name="search" type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                    <span class="input-group-text border-0" id="search-addon">
                                        <i class="fas fa-search">{{ $producto->categoria->nombre }}</i>
                                    </span>
                                </div>-->
                               
                            </form>
                            
                            

                             <div class="float-right">

                             <a href="{{ route('productos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>

                            
                            
                                
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Categoria</th>
										<th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productos as $producto)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $producto->categoria->nombre }}</td>
											<td>{{ $producto->nombre }}</td>

                                            <td>
                                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('productos.show',$producto->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('productos.edit',$producto->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productos->links() !!}
            </div>
        </div>
    </div>
@endsection
