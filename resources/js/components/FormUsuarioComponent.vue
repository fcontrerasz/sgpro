<template>
                <div class="card">
                <div class="card-header">Crear Usuario</div>

                <div class="card-body">

                    <form role="form" class="form-inline" v-on:submit.prevent="nuevoUsuario()">
                        <div class="form-group">
                            <label for="exampleInputEmail2" class="sr-only">Email address</label>
                            <input type="email" v-model="usuario.correo" placeholder="Enter email" id="exampleInputEmail2"
                                   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2" class="sr-only">Password</label>
                            <input type="password" v-model="usuario.clave" placeholder="Password" id="exampleInputPassword2"
                                   class="form-control">
                        </div>
                        <button class="btn btn-white" type="submit">Crear Usuario</button>
                    </form>

                   
                </div>
            </div>
</template>

<script>
    export default {
        data(){
            return {
                usuario: {
                    correo: 'test@test.cl',
                    clave: '1111'               
                }
            }
        },
        methods: {

            nuevoUsuario(){
                alert(JSON.stringify(this.usuario));
                window.event.$emit("nuevo_usuario", this.usuario);
            }

        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
