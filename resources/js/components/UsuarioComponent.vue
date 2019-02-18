<template>
                <div class="card">
                <div class="card-body" v-if="xusuario">
                    {{ xusuario.idusuario }} | {{ xusuario.name }} | {{ xusuario.email }}
                </div>
            </div>
</template>

<script>
    export default {
        props: ['xusuario'],
        
        mounted() {
            console.log('Component mounted.')
        }

    }
</script>
