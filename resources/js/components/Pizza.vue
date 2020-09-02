<template>
    <div class="container">
        <div class="row">
            <div class="col-md-3" v-for="pizz in pizza">
                <div class="card">
                    <img v-bind:src="pizz.imgIrl" class="card-img-top" alt="imgcart">
                    <div class="card-body">
                        <h5 class="card-title">{{pizz.title}}</h5>
                        <p class="card-text">{{pizz.description}}</p>
                        <div class="mb-1">{{pizz.price}} Руб</div>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
      return {
          pizza: []
      }
    },
    mounted() {
        axios.get('api/pizza')
            .then(res => {
                console.log(res.data);
                this.pizza = res.data;
            })
    }
}
</script>

<style scoped>
    .col-md-3{
        margin-top: 30px;
    }
    .card-img-top{
        width: 100%;
    }
</style>
