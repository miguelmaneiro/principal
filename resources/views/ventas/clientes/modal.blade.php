<div class="modal fade modal-slide-in-right"
aria-hidden="true" 
role="dialog" 
tabindex="-1"
id="modal-delete-{{$cliente->idpersona}}"
>
    <form action="{{ route('clientes.destroy', $cliente)}}"
    method="post">
    @method('DELETE') @csrf
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                    >
                        <span aria-hidden="true">x</span>
                    </button>
                    <h6 class="modal-tittle">
                        Eliminar
                    </h6>
                </div>
                <div class="modal-body">
                    <p>Confirme si desea eliminar al Cliente</p>
                    <p>{{ $cliente->nombre }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button"
                    class="btn btn-default"
                    data-dismiss="modal">
                        Cerrar
                    </button>
                    <button type="submit"
                    class="btn btn-primary">
                        Confirmar
                    </button>
                </div>
            </div>
        </div>    

    </form>

</div>