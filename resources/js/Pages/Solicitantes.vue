<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="m-7">
                    
                </div>
                <p class="text-base text-center text-red-400" >
                            {{$page.props.message}}
                            
                </p>
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- INICIA TABLA<welcome /> -->
                    <form v-on:submit.prevent>
                        <input type="text" v-model="solicita.buscar" @keyup="buscar()" placeholder="Buscar"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                    </form>
                    <p class="text-base text-center text-red-400" >
                        {{$page.props.message}}
                    {{$page.props.errors}}
                    </p>
                    <table class="table-fixed border-separate border">
                        <thead>
                            <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Curp</th>
                            <th>Habilitado</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="solicitante in solicitantes" :key="solicitante.id" class="bg-blue-200">
                                <td>{{solicitante.id}}</td>
                                <td>{{solicitante.nombres}}</td>
                                <td>{{solicitante.curp}}</td>
                                <td>{{solicitante.habilitado}}</td>
                                <td>
                                    <button @click="editar(solicitante)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Editar</button>
                      <button @click="eliminar(solicitante)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded my-3">Eliminar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- FIN TABLA<welcome /> -->
                    <!-- INICIO FORM TABLA<welcome /> -->
                    <div class="flex items-center min-h-screen bg-gray-50 dark:bg-gray-900">
    <div class="container mx-auto">
        <div class="max-w-md mx-auto my-10 bg-white p-5 rounded-md shadow-sm">
            <div class="text-center">
                <h1 class="my-3 text-3xl font-semibold text-gray-700 dark:text-gray-200">Modifica datos</h1>
                <p class="text-gray-400 dark:text-gray-400">TODOS LOS CAMPOS SON OBLIGATORIOS</p>
            </div>
            <div class="m-7">
                <form v-on:submit.prevent>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Nombres</label>
                        <input type="text" v-model="form.nombres" name="name" id="name" placeholder="nombre"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.nombres" class="text-red-500">{{ errors.nombres }}</div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Apellidos</label>
                        <input type="text" v-model="form.apellidos" name="apellidos" id="name" placeholder="nombre"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.apellidos" class="text-red-500">{{ errors.apellidos }}</div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Domicilio</label>
                        <input type="text" v-model="form.domicilio" name="name" id="name" placeholder="nombre"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.domicilio" class="text-red-500">{{ errors.domicilio }}</div>
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Monto</label>
                        <input type="text" v-model="form.monto" name="name" id="name" placeholder="DMonto"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.monto" class="text-red-500">{{ errors.material }}</div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Curp</label>
                        <input type="text" v-model="form.curp" name="name" id="name" placeholder="DMonto"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.curp" class="text-red-500">{{ errors.curp }}</div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">RFC</label>
                        <input type="text" v-model="form.rfc" name="name" id="name" placeholder="RFC"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.rfc" class="text-red-500">{{ errors.rfc }}</div>
                    </div>
                    
                    
                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Numero de seguro social</label>
                        <input type="text" v-model="form.nss"  placeholder="Nss"  class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                        <div v-if="errors.nss" class="text-red-500">{{ errors.nss }}</div>
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Estado</label>
                        <select v-model="form.habilitado">
                          <option disabled value="">Seleccione . . .</option>
                          <option  value="0">0</option>
                          <option  value="1">1</option>
                        </select>
                        <div v-if="errors.habilitado" class="text-red-500">{{ errors.estatus }}</div>
                    </div>
       
                    
                    
                    <div class="mb-6">
                      
                        <button type="button"  @click="actualizar(form)" class="w-full px-3 py-4 text-white bg-red-500 rounded-md focus:bg-indigo-600 focus:outline-none">Guardar cambios</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
</div>

                    <!-- FIN FORM -->
                    
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    // import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        props:{
        solicitantes:Object,
        errors:Object,
        // solicitante:Object,
    },
    data(){
        return{
            form: this.$inertia.form({
                nombres:'',
                apellidos:'',
                domicilio:'',
                monto:'',
                curp:'',
                rfc:'',
                nss:'',
                habilitado:'',
                habilitado:'',
                // id:'',
            }),
            solicita:{buscar:''},
            bsc:{
                nombres:'',
            },
            url:'/solicitantes/',
        }
    },
    methods:{
        actualizar(){
            console.log('update');
            this.form.put(this.url+this.form.id,
            {
            });

        },
        eliminar(d){
             if (!confirm('¿Eliminar Solictante.? '+d.nombres)) return;
                    d._method = 'DELETE';
                    this.$inertia.post(
                    route("solicitantes.destroy", d.id),d
                    );
        },
        buscar(){

            if(this.solicita.buscar.length>3){
                console.log('Buscar');

                this.$inertia.visit(this.url+'?buscar='+this.solicita.buscar,{
                    // only:['clases'],
                    preserveState: true,
                    preserveScroll:true,
                });
            }
            
        },
        editar(d){
            // this.form = Object.assign({}, d);
            this.form.nombres=d.nombres;
            this.form.apellidos=d.apellidos;
            this.form.domicilio=d.domicilio;
            this.form.monto=d.monto;
            this.form.curp=d.curp;
            this.form.rfc=d.rfc;
            this.form.nss=d.nss;
            this.form.habilitado=d.habilitado;
            this.form.id=d.id;
        },

    }
    ,
        components: {
            // AppLayout,
            Welcome,
        },
    }
</script>