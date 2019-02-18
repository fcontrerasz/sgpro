
require('./bootstrap');

window.Vue = require('vue');
api = "http://contra1.local/api.php";
window.api = api;

Vue.component('listar-usuarios-component', require('./components/ListarUsuariosComponent.vue').default);
Vue.component('form-usuario-component', require('./components/FormUsuarioComponent.vue').default);
Vue.component('usuarios-component', require('./components/UsuarioComponent.vue').default);

window.event = new Vue({
	created() {
        this.$on('nuevo_usuario', (param) => this.nuevo_usuario(param));
    },
    methods: {
        nuevo_usuario(data){
        	alert(JSON.stringify(data.correo));
            axios(api+'/records/usuarios', {
                method: 'post',
                data: {"idusuario":null, "email": data.correo, "name": data.correo, "password":"111"}
            }).then(function (response) {
                if(response.data.error){
                    console.log("Error al intentar insertar incidente.");
                }else{
            		alert("creado el usuario");                      
                }
            })
        }
    }
});

const app = new Vue({
    el: '#app'
});

