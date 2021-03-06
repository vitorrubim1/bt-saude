@extends('layouts.app')

@section('content')
<div class="content">
        <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <a href="{{url("doctor/create")}}" class="btn btn-info"><i class="fas fa-plus"></i> Adicionar</a>
            </div>
            <h4 class="page-title">Profissionais</h4>
        </div>
    </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <h4 class="header-title">Usuários</h4> --}}
                        
                        <div class="tab-content">
                            <div class="tab-pan eshow active" id="basic-datatable-preview">
                                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Especialidade</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                
                                
                                    <tbody>
                                        @foreach($records as $record)
                                        <tr>
                                            <td>{{$record->name}}</td>
                                            <td>{{$profession[$record->profession]}}</td>
                                            <td>{{$status[$record->status]}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{url("doctor/".$record->id)}}"><i class="fas fa-eye"></i> Visualizar</a>
                                                        <a class="dropdown-item" href="{{url("doctor/".$record->id.'/edit')}}"><i class="fas fa-pencil-alt"></i> Editar</a>
                                                        <a class="dropdown-item" href="dangerModal_{{$record->id}}"  data-toggle="modal" data-target="#dangerModal_{{$record->id}}"><i class="fas fa-times"></i> Remover</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <div class="modal fade" id="dangerModal_{{$record->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-danger" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Excluir Registro</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Você deseja excluir o registro <strong>{{$record->name}}</strong> ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="{{route('doctor.destroy',$record->id)}}" method="post">
                                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                                            <input type="hidden" name="_method" value="delete" />
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                                        </form>
                                                    </div>
                                                </div>                                              
                                            </div>                                          
                                        </div>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>                                           
                            </div> <!-- end preview-->
                        
                        </div> <!-- end tab-content-->

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>
        <!-- end row-->


    </div>
        <!-- end row-->
                        
</div> <!-- End Content -->
@endsection