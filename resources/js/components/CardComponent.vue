<template>
    <div class="container">       
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Card Component</div>
                    <div class="card-body">
                        Это Card Component вместо Post Component"
                        <p>Вывод свойства "title"  - {{title}}</p>

                        <input type="text" v-model="title">
                    </div>
                </div>
            </div>
    </div>
</template>

<script>
    export default {
       name: 'CardComponent',

       data(){
           return{
               title: 'admin panel'
           }
       }
    }
</script>