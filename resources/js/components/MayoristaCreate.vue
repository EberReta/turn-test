<template>
    <form @submit="create">
        <div class="d-flex justify-content-between">

            <h1>Nuevo mayorista</h1>
            <div>
                <button type="submit" class="btn btn-lg btn-dark">Guardar</button>
                <a href="/mayoristas" class="btn btn-lg btn-danger">Cancelar</a>
            </div>
        </div>
        <div class="container">

            <div class="card mt-3">
                <div class="card-body">
                    <p><b>Información del mayorista</b></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Escribe el nombre del mayorista"
                                    required v-model="name">
                                    <small v-if="errors && errors.name" class="text-danger" >{{  errors.name[0] }}</small>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Empresa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="Escribe el nombre de la empresa"
                                    v-model="company" required>
                                <small v-if="errors && errors.company" class="text-danger" >{{  errors.company[0] }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Correo electrónico <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" placeholder="juan@correo.com" required
                                    v-model="email">
                                    <small v-if="errors && errors.email" class="text-danger" >{{  errors.email[0] }}</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Número de teléfono <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" placeholder="333-333-3333" v-model="phone"
                                    required>
                                    <small v-if="errors && errors.phone" class="text-danger" >{{  errors.phone[0] }}</small>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Porcentaje de descuento</label>
                                <input type="text" class="form-control" placeholder="15%" v-model="discount" >
                                <small v-if="errors && errors.discount" class="text-danger" >{{  errors.discount[0] }}</small>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <p><b>Dirección de envío</b></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de contacto</label>
                                <input type="text" class="form-control" placeholder="Escribe el nombre del contacto" v-model="direccion_envio.contactName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" placeholder="Ingresa la dirección" v-model="direccion_envio.address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Código Postal</label>
                                <input type="text" class="form-control" placeholder="Escribe el código postal" v-model="direccion_envio.postalCode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Colonia</label>
                                <select name="" id="" class="form-control" v-model="direccion_envio.neighborhood">
                                    <option value="">Selecciona la colonia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ciudad</label>
                                <select name="" id="" class="form-control" v-model="direccion_envio.city">
                                    <option value="">Selecciona la ciudad</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="" id="" class="form-control" v-model="direccion_envio.state">
                                    <option value="">Selecciona el estado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Correo electrónico</label>
                                <input type="email" class="form-control" placeholder="juan@ejemplo.com" v-model="direccion_envio.email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" placeholder="333-333-3333" v-model="direccion_envio.phone">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <p><b>Dirección de la facturación</b></p>
                        <div>
                            <input type="checkbox" name="" id="sameAddress" v-model="sameAddress">
                            <label for="sameAddress"><b>Usar dirección de envío</b></label>
                        </div>
                    </div>
                    <div v-if="!sameAddress">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de contacto</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <input type="text" class="form-control" placeholder="Ingresa la dirección" v-model="direccion_facturacion.address">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Código Postal</label>
                                <input type="text" class="form-control" placeholder="Escribe el código postal" v-model="direccion_facturacion.postalCode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Colonia</label>
                                <select name="" id="" class="form-control" v-model="direccion_facturacion.neighborhood">
                                    <option value="">Selecciona la colonia</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ciudad</label>
                                <select name="" id="" class="form-control" v-model="direccion_facturacion.city">
                                    <option value="">Selecciona la ciudad</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Estado</label>
                                <select name="" id="" class="form-control" v-model="direccion_facturacion.state">
                                    <option value="">Selecciona el estado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Correo electrónico</label>
                                <input type="email" class="form-control" placeholder="juan@ejemplo.com" v-model="direccion_facturacion.email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <input type="text" class="form-control" placeholder="333-333-3333" v-model="direccion_facturacion.phone">
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <p><b>Datos de la facturación</b></p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Razón social</label>
                                <input type="text" class="form-control" placeholder="Escribe la razón social"
                                    v-model="businessName">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Uso de CFDI</label>
                                <input type="text" class="form-control" placeholder="Ingresa el CFDI" v-model="cfdi">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">RFC</label>
                                <input type="text" class="form-control" placeholder="Escribe el RFC" v-model="rfc">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            name: '',
            lastName: '',
            company: '',
            email: '',
            phone: '',
            discount: '',
            businessName: '',
            cfdi: '',
            rfc: '',
            sameAddress:false,
            direccion_envio:{
                contactName: '',
                address : '',
                postalCode : '',
                neighborhood : '',
                city : '',
                state : '',
                email : '',
                phone : '',
                type : '',
                Status : '',
            },
            direccion_facturacion:{
                contactName: '',
                address : '',
                postalCode : '',
                neighborhood : '',
                city : '',
                state : '',
                email : '',
                phone : '',
                type : '',
                Status : '',
            },
            errors: undefined
        }
    },
    watch:{
        sameAddress(newValue, oldValue){
            console.log({newValue, oldValue});
            if(newValue){
                this.direccion_facturacion = this.direccion_envio;
            }else{
                this.direccion_facturacion = {
                    name: '',
                    direccion: '',
                    codigoPostal: '',
                    colonia: '',
                    ciudad: '',
                    estado: '',
                    email: '',
                    phone: '',
                }
            }
        }

    },
    methods: {
        create(e) {
            e.preventDefault();
            this.errors = undefined;
            axios.post('/api/mayorista', {
                name: this.name,
                lastName: this.lastName,
                company: this.company,
                email: this.email,
                phone: this.phone,
                discount: this.discount || 0,
                businessName: this.businessName,
                cfdi: this.cfdi,
                rfc: this.rfc,
                direccion_envio: this.direccion_envio,
                direccion_facturacion: this.direccion_facturacion,
            }).then(response => {
                console.log(response)
                if (response.data.status) {
                    Swal.fire({
                        title: "Información registrada correctamente",
                        html: response.data.msg,
                        type: 'success',
                        icon: 'success',
                    }).then((result) => {
                        location.href= '/mayoristas';
                    });
                } else {
                    alert('Ha ocurrido un error');
                }
            }).catch(error => {
                this.loading = false;
                if(error.response.status===422){
                    this.errors = error.response.data.errors || {};
                    Swal.fire({
                        title: "Datos faltantes o invalidos",
                        html:"Por favor verifica los datos",
                        type: 'error',
                        icon: 'error',
                    });
                }else if(error.response.status===419){
                    location.reload();
                }else{
                    Swal.fire({
                        title: "Ocurrio un error al intentar cargar la información",
                        type: 'error',
                        icon: 'error',
                    });
                }
                console.log(error);
            });
        }
    }
}
</script>
