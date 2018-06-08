<template>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
                <tr v-for="product in products" :key="product.id" v-if="product.exists">
                    <td>{{ product.id }}</td>
                    <td>{{ product.nome }}</td>
                    <td>{{ product.valor }}</td>
                    <td>
                        <a :href="'/products/' + product.id + '/edit'" :id="'edit-' + product.id">
                            <i class="fa fa-pencil btn btn-warning"></i>
                        </a>

                        <a v-on:click="call_delete(product)" :id="'delete-' + product.id">
                            <i class="fa fa-trash btn btn-danger"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return { 
                products: null 
            }
        },
        mounted() {
            axios.get('/api/v1/products').then(response => {
                this.products = response.data;
                this.products.forEach(function(obj) { obj.exists =  true; });
            });
        },
        methods: {
            call_delete: function(product) {
                if(! confirm("Tem certeza que deseja deletar o produto: " + product.nome + "?")) {
                    return false;
                }

                return axios.delete('/api/v1/products/' + product.id).then(response => {
                    this.products = this.products.filter(function(p) {
                        return p.id !== product.id;
                    });
                })
            }
        },        

    }
</script>
