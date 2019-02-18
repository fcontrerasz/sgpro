<template>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form-usuario-component></form-usuario-component>

            <div v-if="usuarios.length > 0">

            <usuarios-component v-for="usuario in usuarios" :key="usuario.idusuario" :xusuario="usuario" @nuevo="crearUsuario()" @editar="editarUsuario"></usuarios-component>

            </div>
            <div v-else>Sin usuarios</div>


        </div>
    </div>
</template>

<script>
    export default {
    data(){
        return {
            usuarios: [],
            errores: []
        }
    },
    methods: {

        crearUsuario(usuario){
            alert(JSON.stringify(usuario));
        },
        editarUsuario(usuario){
            alert(JSON.stringify(usuario));
        }

    },
    created(){
        axios.get(window.api+'/records/usuarios?transform=1')
                    .then(response => {
                    if(response.data.error){
                        this.errores.push("Error al intentar obtener los registros.");
                    }else{
                        this.usuarios = response.data.records;
                    }
            })
    },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
