<template>
    <div>
        <table class="table table-striped w-100">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nombre</th>
                    <th>Empresa</th>
                    <th>Correo Electronico</th>
                    <th>Teléfono</th>
                    <th>Descuento</th>
                    <th>No. Cotizaciones</th>
                    <th>No. Ordenes</th>
                    <th>No. Solicitudes</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(mayorista, index) in mayoristas" :key="index">
                    <th>{{ index +1 }}</th>
                    <th>{{ mayorista.name }}</th>
                    <th>{{ ([ mayorista.name, mayorista.lastName || ""]).join(" ") }}</th>
                    <th>{{ mayorista.email }}</th>
                    <th>{{ mayorista.phone }}</th>
                    <th class="text-center">{{ mayorista.discount }}%</th>
                    <th class="text-center">{{ mayorista.quotes_count }}</th>
                    <th class="text-center">{{ mayorista.orders_count }}</th>
                    <th class="text-center">{{ mayorista.requests_count }}</th>
                    <th>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </th>
                </tr>
            </tbody>
        </table>
        <p v-if="loading" class="text-center">Cargando...</p>

    </div>
</template>

<script>
import axios from 'axios';
import { eventBus } from '../EventBus.js'

export default {
    data() {
        return {
            mayoristas:[],
            search: '',
            errors: undefined,
            loading: true
        }
    },
    mounted(){
        this.getMayoristas();
        eventBus.$on('searchMayorista', searchValue => {
            this.search = searchValue;
        });
    },
    watch: {
        search: function (val) {
            this.getMayoristas();
        }
    },
    methods: {
        getMayoristas(e) {

            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            this.loading = true;
            const app = this;
            axios.get(`/api/mayoristas/${this.search}`,{}).then(response => {
                if (response.data.status) {
                    app.mayoristas = response.data.mayoristas;
                } else {
                    alert('Ha ocurrido un error');
                }
                app.loading = false;
            }).catch(error => {
                this.loading = false;
                Swal.fire({
                    title: "Ocurrio un error al intentar cargar la información",
                    type: 'error',
                    icon: 'error',
                });
            });
        }
    }
}
</script>
